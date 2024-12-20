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

    public function carts() {
        return $this->hasMany(Cart::class);
    }
}
