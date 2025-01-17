<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

/**
 * 구매 관련 컨트롤러
 *
 */
class PurchaseController extends Controller
{
    // 구매 확인인 페이지
    public function purchase(Request $request, $item_id) {
        // 상품 정보 로드
        $item = Item::findOrFail($item_id);

        // URL 파라미터를 뷰에 전달
        $queryData = $request->query();

        if(isset($queryData['size'])) {
            $queryData['size'] = json_decode($queryData['size'], true);
        }

        return view('purchase.index', compact('item', 'queryData'));
    }

    // 구매 확정 페이지
    public function confirm(Request $request) {
        //dd($request->all());
        //data validation
        $validated = $request->validate([
            'item_id' => 'required|integer|exists:items,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'zipcode' => 'required|string|max:10',
            'city' => 'nullable|string|max:255',
            'detail_address' => 'required|string|max:500',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // 상품 정보 로드
        $item = Item::findOrFail($validated['item_id']);

        return view('purchase.confirm', compact('item', 'validated'));
    }

    public function checkout(Request $request) {
        // 상품 정보 로드
        $item = Item::findOrFail($request->item_id);
        // data validation
        $validated = $request->validate([
            'item_id' => 'required|integer|exists:items,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'zipcode' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'detail_address' => 'required|string|max:500',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // 주문 데이터 저장
        $order = Order::create([
            'item_id' => $validated['item_id'],
            'user_id' => null, // 로그인 없이 진행 중이므로 null 허용
            'status' => 'pending',
            'amount' => $item->price * $validated['quantity'],
            'payment_id' => null, // 결제 완료 후에 업데이트
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'customer_address' => "{$validated['zipcode']} {$validated['city']} {$validated['detail_address']}",
            'zipcode' => $validated['zipcode'], // 추가
            'city' => $validated['city'],       // 추가
            'detail_address' => $validated['detail_address'], // 추가
        ]);

        // 결제 성공 후 주문 상태 업데이트
        $order->update(['status' => 'complete']);

        // Stripe 설정
        Stripe::setApiKey(config('services.stripe.secret'));

        // Stripe Checkout 세션 생성
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    // 화폐단위 일본 엔
                    'currency' => 'jpy',
                    'product_data' => [
                        // 상품명
                        'name' => $item->name,
                    ],
                    // 일본 엔화 단위 그대로
                    'unit_amount' => intval($item->price), // 소수점 제거
                ],
                'quantity' => $validated['quantity'], // 구매 수량
            ]],
            'mode' => 'payment',
            // 결제 성공 url
            'success_url' => route('purchase.thankyou') . '?session_id={CHECKOUT_SESSION_ID}',
            // 결제 실패 url
            'cancel_url' => route('purchase.index', ['item_id' => $item->id]),
            'metadata' => [
                'item_id' => $item->id,
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'customer_address' => "{$validated['zipcode']} {$validated['city']} {$validated['detail_address']}",
                'size' => $validated['size'],
                'quantity' => $validated['quantity'],
            ]
        ]);

        // Stripe 결제 페이지로 리다이렉트
        return redirect($session->url);
    }

    public function thankyou() {
        // 최신 주문 정보 로드
        $order = Order::latest()->first();

        return view('purchase.thankyou', compact('order'));
    }
}
