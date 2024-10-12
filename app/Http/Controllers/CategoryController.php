<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index()
     {
        $categories = Category::all(); // استرجع جميع الفئات
        $recentProducts = Product::orderBy('created_at', 'desc')->take(5)->get();
        return view('welcome', compact('categories','recentProducts')); // تمرير المتغير إلى العرض
     }
     public function create()
     {
         return view('add_category'); // عرض النموذج
     }
     public function store(Request $request)
    {
        // تحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // حفظ الصورة في التخزين
        $originalName = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storeAs('images/', $originalName, 'public');
        // إنشاء قسم جديد
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->image_path = $imagePath; // تخزين مسار الصورة
        $category->save(); // حفظ القسم في قاعدة البيانات

        return redirect()->route('categories.create')->with('success', 'Category added successfully!'); // إعادة توجيه مع رسالة نجاح
    }
}

