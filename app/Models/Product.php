<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'category_id','image_path'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cartItem()
    {
        return $this->hasOne(CartItem::class);
    }
    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class, 'order_product')
    //                 ->withPivot('quantity') // يتضمن الحقل pivot (الكمية)
    //                 ->withTimestamps();
    // }
    public function orders()
{
    return $this->belongsToMany(Order::class, 'order_product')
                ->withPivot('quantity', 'price') // يتضمن الحقول pivot (الكمية والسعر)
                ->withTimestamps();
}

}
