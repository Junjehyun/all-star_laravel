<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'item_id',
        'user_id',
        'status',
        'amount',
        'payment_id'
    ];

    // relationship with item
    public function item() {
        return $this->belongsTo(Item::class);
    }

    // realationship with user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
