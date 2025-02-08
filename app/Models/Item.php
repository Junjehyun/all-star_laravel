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
        'category',
        'stock_s',
        'stock_m',
        'stock_l',
        'stock_xl'
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

    public function reviews(){
        return $this->hasMany(Comment::class, 'item_id')->latest(); // 'notice_id'가 Comment 모델의 외래 키입니다.
    }

    // 평균 별점 계산
    public function averageRating() {

        // Rating의 평균을 계산
        $rating = $this->reviews()->avg('rating');
        return $rating ? $rating : null; // 평균 별점이 없으면 null 반환
    }


}
