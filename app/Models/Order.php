<?php

namespace App\Models;
use Illuminate\Support\Str;
use App\Mail\PaymentConfirmationMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShippingConfirmationMail;
class Order extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'item_id',
        'user_id',
        'status',
        'amount',
        'payment_type',
        'quantity',
        'purchased_size',
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

    protected static function booted() {
        static::updated(function ($order) {
            // shipping_status가 'pay-confirm'으로 된 경우 결제완료 이메일 발송
            if ($order->isDirty('shipping_status') && $order->shipping_status === 'pay_confirm') {
                // 결제완료 이메일 발송
                Mail::to($order->customer_email)->send(new PaymentConfirmationMail($order));
            }
        });
        static::updated(function ($order) {
            // 배송 완료 상태로 변경되었을 때
            if ($order->isDirty('shipping_status') && $order->shipping_status === 'delivery') {
                // 송장번호가 없는 경우 생성 (예: TRK + 랜덤 문자열)
                if (!$order->tracking_number) {
                    $order->tracking_number = 'TRK' . strtoupper(Str::random(10));
                    $order->save();
                }
                // 발송 완료 이메일 발송
                Mail::to($order->customer_email)->send(new ShippingConfirmationMail($order));
            }
        });
    }
}
