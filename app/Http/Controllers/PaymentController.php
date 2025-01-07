<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class PaymentController extends Controller
{
    //
    public function checkout($id) {
        // 상품 정보 취득
        $item = Item::findOrFail($id);

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
                'quantity' => 1, // 구매 수량
            ]],
            'mode' => 'payment',
            // 결제 성공 url
            'success_url' => route('process.payment') . '?session_id={CHECKOUT_SESSION_ID}',
            // 결제 실패 url
            'cancel_url' => route('checkout', $item->id),
            'metadata' => [
                'item_id' => $item->id,
            ]
        ]);

        // Stripe 결제 페이지로 리다이렉트
        return redirect($session->url);
    }

    public function processPayment(Request $request) {
        try {
            // Stripe API 설정
            Stripe::setApiKey(config('services.stripe.secret'));

            // 세션 id로 Stripe 세션 정보 가져오기
            $sessionId = $request->query('session_id');
            $session = StripeSession::retrieve($sessionId);

            // 결제 성공 데이터 처리
            $itemId = $session->metadata->item_id ?? null; // Stripe에 전달한 metadata에서 가져오기
            $amount = $session->amount_total / 100; // Stripe에서 센트 단위로 반환된 금액
            $paymentId = $session->payment_intent;

            // 주문 저장
            Order::create([
                'item_id' => $itemId,
                'user_id' => null, // 로그인 기능 추가시 사용자 ID 저장
                'status' => 'completed',
                'amount' => $amount,
                'payment_id' => $paymentId,
            ]);
            // 성공 메세지와 함께 리다이렉트
            return redirect()->route('item.index')->with('success', 'ご購入いただき誠にありがとうございます。 発送までしばらくお待ちください。');
        } catch(\Exception $e) {
            // 에러 발생시 처리
            Log::error('Payment Error: ' . $e->getMessage());
            return redirect()->route('item.index')->withErrors(['error' => '購入処理中にエラーが発生しました。']);
        }
    }
}
