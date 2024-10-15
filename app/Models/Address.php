<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',     // إضافة user_id هنا
        'governorate',
        'city',
        'street',
    ];


    public function order()
{
    return $this->belongsTo(Order::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
}