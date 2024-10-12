<?php

namespace App\Http\Controllers;

use App\Models\Category; // تأكد من استيراد نموذج Category
use App\Models\Product; // إذا كنت بحاجة إلى استخدام نموذج Product
use App\Models\Order; // إذا كنت بحاجة إلى استخدام نموذج Order
use App\Models\User; // إذا كنت بحاجة إلى استخدام نموذج User
use App\Models\Contact; // إذا كنت بحاجة إلى استخدام نموذج contact
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // استرجاع جميع الأقسام
        $orders = Order::with('user')->withCount('products')->get();
        $productsCount = Product::count(); // عدد المنتجات
        $ordersCount = Order::count(); // عدد الأوردرات المنفذة
        $usersCount = User::count(); // عدد المستخدمين
        $totalProfit = Order::sum('total_price');
       // $lastOrders = Order::with(['user', 'cartItems.product'])->latest()->take(20)->get();

        // يمكن استرجاع الشكاوى من جدول contacts إذا كان لديك جدول بهذا الاسم
        $complaints = Contact::all(); // تأكد من وجود نموذج Contact واستيراده

        return view('dashboard', compact('categories', 'productsCount', 'ordersCount', 'usersCount',
         'complaints','totalProfit','orders'));
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_path' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Product added successfully.');
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('categories', 'public');

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Category added successfully.');
    }
}
