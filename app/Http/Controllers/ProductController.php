<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // public function index()
    // {
    //     // استرجاع جميع الفئات من قاعدة البيانات
    //     $products = Product::all();

    //     // تمرير البيانات إلى الـ view لعرضها
    //     return view('products', compact('products'));
    // }
    // public function products()
    //   {
    //     $products = Product::all(); // استرجع جميع الفئات
    //      return view('welcome', compact('categories')); // تمرير المتغير إلى العرض
    //   }
    public function index($catid = null)
    {
        $categories = Category::all();
        if ($catid) {
            // جلب المنتجات التي تتبع القسم المحدد
            $products = Product::where('category_id', $catid)->get();
        } else {
            // جلب جميع المنتجات
            $products = Product::all();
        }

        return view('products', compact('products','categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('add_product', compact('categories')); // عرض النموذج
    }
    public function store(Request $request)
    {
        // تحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // حفظ الصورة في التخزين
        $originalName = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('images/', $originalName, 'public');

        // إنشاء منتج جديد
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->image_path = $imagePath; // تخزين مسار الصورة
        $product->category_id = $request->input('category_id');
        $product->save(); // حفظ المنتج في قاعدة البيانات

        return redirect()->route('products.create')->with('success', 'Product added successfully!'); // إعادة توجيه مع رسالة نجاح
    }

}
