<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // جلب التصنيفات إذا كانت مطلوبة
        return view('about', compact('categories')); // تمرير التصنيفات إلى صفحة "about"
    }
}
