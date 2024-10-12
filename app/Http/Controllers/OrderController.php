<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->get(); // جلب الطلبات مع المنتجات المرتبطة بها
        return view('show_orders', compact('orders')); // عرض الطلبات
    }
}
