<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        // تحقق من تسجيل الدخول
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You need to log in to add products to the cart.');
        }

        // الحصول على المنتج
        $product = Product::findOrFail($id);
        $userId = auth()->id();

        // الحصول على العربة أو إنشاء واحدة جديدة
        $cart = Cart::firstOrCreate(['user_id' => $userId]);

        // تحقق مما إذا كان المنتج موجودًا بالفعل في cart_items
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $id)
                            ->first();

        if ($cartItem) {
            // إذا كان المنتج موجودًا، زيادة الكمية
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            // إذا لم يكن موجودًا، إضافته كمنتج جديد
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $id,
                'quantity' => 1,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // عرض محتويات السلة
    public function index()
    {
        $userId = auth()->id();
        $cart = Cart::where('user_id', $userId)->first();

        // التحقق مما إذا كانت هناك عربة
        if (!$cart) {
            return view('cart', ['cartItems' => [], 'categories' => Category::all(), 'totalPrice' => 0]);
        }

        // جلب العناصر من cart_items مع المنتجات
        $cartItems = CartItem::where('cart_id', $cart->id)->with('product')->get();

        // حساب السعر الإجمالي
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $categories = Category::all();
        return view('cart', compact('cartItems', 'categories', 'totalPrice'));
    }

public function remove($id)
{
    $userId = auth()->id();
    $cart = Cart::where('user_id', $userId)->first();

    if ($cart) {
        $cartItem = CartItem::where('cart_id', $cart->id)
                                        ->where('product_id', $id)
                                        ->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
    }

    return redirect()->back()->with('error', 'Product not found in cart.');
}
// public function checkout()
// {
//     if (!Auth::check()) {
//         return redirect()->back()->with('error', 'You need to log in to checkout.');
//     }

//     $userId = auth()->id();
//     $cart = Cart::where('user_id', $userId)->first();

//     if (!$cart) {
//         return redirect()->back()->with('error', 'Your cart is empty.');
//     }

//     // الحصول على العناصر في السلة
//     $cartItems = CartItem::where('cart_id', $cart->id)->get();
//     if ($cartItems->isEmpty()) {
//         return redirect()->back()->with('error', 'Your cart is empty.');
//     }

//     // حساب السعر الإجمالي
//     $totalPrice = $cartItems->sum(function ($item) {
//         return $item->product->price * $item->quantity;
//     });

//     // إنشاء طلب جديد
//     $order = Order::create([
//         'user_id' => $userId,
//         'total_price' => $totalPrice,
//         'product_ids' => $cartItems->pluck('product_id')->implode(','),
//     ]);

//     // إضافة عناصر السلة إلى الطلب
//     foreach ($cartItems as $item) {
//         $order->cartItems()->create([
//             'product_id' => $item->product_id,
//             'quantity' => $item->quantity,
//             'cart_id' => $cart->id,
//         ]);

//         // يمكنك هنا تحديث علاقة عنصر السلة مع الطلب
//         $item->order_id = $order->id;
//         $item->save();
//     }

//     // يمكنك هنا مسح السلة بعد الإكمال
//     $cart->delete();

//     return redirect()->back()->with('success', 'Your order has been placed successfully!');
// }
public function processCheckout(Request $request)
{
    if (!Auth::check()) {
        return redirect()->back()->with('error', 'You need to log in to checkout.');
    }

    $userId = auth()->id();
    $cart = Cart::where('user_id', $userId)->first();

    if (!$cart) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    // الحصول على العناصر في السلة
    $cartItems = CartItem::where('cart_id', $cart->id)->get();
    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    // حساب السعر الإجمالي
    $totalPrice = $cartItems->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    // إنشاء طلب جديد
    $order = Order::create([
        'user_id' => $userId,
        'total_price' => $totalPrice,
        'product_ids' => $cartItems->pluck('product_id')->implode(','),
    ]);
    // إضافة العنوان إلى جدول العناوين
    // إضافة العنوان إلى جدول العناوين
    $order->address()->create([
        'user_id' => $userId,
        'governorate' => $request->governorate,
        'city' => $request->city,
        'street' => $request->street,
    ]);
    // إضافة عناصر السلة إلى الطلب باستخدام علاقة many-to-many
    foreach ($cartItems as $item) {
        $order->products()->attach($item->product_id, [
            'quantity' => $item->quantity,
            'price' => $item->product->price, // سعر المنتج عند الطلب
        ]);
    }

    // يمكنك هنا مسح السلة بعد الإكمال
    $cart->delete();

    return redirect()->back()->with('success', 'Your order has been placed successfully!');
}
public function showAddressForm()
{
    $categories = Category::all();
    if (!Auth::check()) {
        return redirect()->back()->with('error', 'You need to log in to proceed with the checkout.');
    }

    return view('address_form',compact('categories')); // تأكد أن `address_form` هو اسم الـ blade الخاص بالنموذج.
}

}

