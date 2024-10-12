<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'product_id', 'quantity',
    'order_id'];

    // علاقة عنصر السلة بالسلة
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // علاقة عنصر السلة بالمنتج
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
