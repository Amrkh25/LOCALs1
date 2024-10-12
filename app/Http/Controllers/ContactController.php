<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact',compact('categories')); // تأكد من أن اسم عرض الـ Blade صحيح
    }
    public function store(Request $request)
    {
        $categories = Category::all();
        // تحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        Contact::create($request->all());

        return redirect()->back()->with([
            'success' => 'Your message has been sent successfully!',
            'categories' => $categories // تمرير التصنيفات مرة أخرى إلى العرض
        ]);
    }
    public function show()
{
    $categories = Category::all();
    $contacts = Contact::all();
    return view('show-contact', compact('categories', 'contacts'));
}

}
