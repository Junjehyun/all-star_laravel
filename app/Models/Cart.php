<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'item_id',
        'quantity',
        'user_id',
        'selected_size'
    ];

    // item 모델과의 관계 설정
    public function item() {
        return $this->belongsTo(Item::class);
    }
}
