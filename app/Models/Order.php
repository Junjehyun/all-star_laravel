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
        'quantity',
        'payment_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'zipcode',
        'city',
        'detail_address',
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
