<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'status', 'total_price','product_ids']; // حقول نموذجية للطلب

    // علاقة One to Many مع CartItem
    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class, 'order_product')
    //                 ->withPivot('quantity') // يتضمن الحقل pivot (الكمية)
    //                 ->withTimestamps();
    // }
    public function products()
{
    return $this->belongsToMany(Product::class, 'order_product')
                ->withPivot('quantity', 'price') // يتضمن الحقول pivot (الكمية والسعر)
                ->withTimestamps();
}

}
