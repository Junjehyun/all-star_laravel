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
        // $orders = Order::with('item')
        //         ->where('user_id', Auth::id())
        //         ->latest()
        //         ->get();

        // 관리자일 경우 모든 주문을 조회, 일반 사용자는 자신의 주문만 조회
        if (Auth::user()->role == 'admin') {
            // 관리자: 모든 주문 조회
            $orders = Order::with('item')
                    ->latest() // 최신 순으로 정렬
                    ->get();
        } else {
            // 일반 사용자: 자신의 주문만 조회
            $orders = Order::with('item')
                    ->where('user_id', Auth::id())
                    ->latest() // 최신 순으로 정렬
                    ->get();
        }

        return view('order.index', compact('orders'));
    }

    public function orderTracking($id) {

        $order = Order::findOrFail($id);

        // 고정된 배송 상태 예시
        $shipping_status = $order->shipping_status;
        // 배송 상태 데이터를 뷰로 전달
        return view('order.tracking', compact('shipping_status', 'order'));
    }

    public function updateShippingStatus($id, Request $request) {
        // 주문을 찾기
        $order = Order::findOrFail($id);

        // 배송 상태 유효성 검사
        $validated = $request->validate([
            'shipping_status' => 'required|in:pay-confirm,prepare,delivery,complete',
        ]);

        // 배송 상태 업데이트
        $order->shipping_status = $validated['shipping_status'];
        $order->save();

        // route경로의문
        return redirect()->route('order.tracking', ['id' => $order->id])->with('success', 'The shipping status has been updated.');
    }
}
