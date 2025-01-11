<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'size',
        'description',
        'image',
        'category'
    ];

    // size를 JSON으로 저장 및 읽기
    protected $casts = [
        'size' => 'array'
    ];

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

}
