<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function orderIndex() {
        // 모든 주문 데이터를 최신순으로 가져오기
        $orders = Order::with('item')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();

        return view('order.index', compact('orders'));
    }
}
