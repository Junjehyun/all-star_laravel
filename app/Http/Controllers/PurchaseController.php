<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
            'user_id' => Auth::id(),
            'status' => 'pending',
            'quantity' => $validated['quantity'],
            'amount' => $item->price * $validated['quantity'],
            'payment_id' => Str::uuid(), // 결제 완료 후에 업데이트
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'customer_address' => "{$validated['zipcode']} {$validated['city']} {$validated['detail_address']}",
            'zipcode' => $validated['zipcode'], // 추가
            'city' => $validated['city'],       // 추가
            'detail_address' => $validated['detail_address'], // 추가

            // purchased_size추가
            'purchased_size' => $validated['size']
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

    public function purchaseSelected(Request $request) {

        // 선택된 상품들의 ID를 가져옴 (selected_item[]으로 전달된 값)
        //$selectedItemIds = $request->input('selected_item');
        $selectedItemIds = $request->input('selected_item', []);
        //dd($selectedItemIds);
        session([
            'item_ids' => $request->input('item_ids', []),
            'quantities' => $request->input('quantities', []),
            'customer_name' => $request->input('customer_name'),
            'customer_email' => $request->input('customer_email'),
            'customer_phone' => $request->input('customer_phone'),
            'zipcode' => $request->input('zipcode'),
            'city' => $request->input('city'),
            'detail_address' => $request->input('detail_address'),
        ]);

        // 세션에 저장된 item_ids와 quantities를 기반으로 카트 정보를 불러오기
        $itemIds = session('item_ids', []);
        $quantities = session('quantities', []);

        //dd($request->all());

        // 선택된 상품들의 정보를 가져오기
        //$items = Item::whereIn('id', $selectedItemIds)->get();
        $carts = Cart::with('item')  // 아이템도 함께 로드
                ->whereIn('item_id', $selectedItemIds)
                ->where('user_id', Auth::id())  // 현재 로그인한 사용자의 카트
                ->get();
        //dd($items);

        //상품 수량 매핑
        // foreach ($carts as $cart) {
        //     $cart->quantity = $quantities[array_search($cart->item->id, $itemIds)];
        // }
        foreach ($carts as $cart) {
            $index = array_search($cart->item->id, $itemIds);

            if ($index !== false) {
                $cart->quantity = $quantities[$index];
            }
        }

        // 로그인한 사용자의 이름 가져오기
        $userName = Auth::user()->name;
        // 결제 페이지로 넘어갈 데이터와 함께 뷰 반환
        return view('purchase.cart-confirm', compact('carts', 'userName', 'selectedItemIds', 'itemIds', 'quantities'));
    }

    public function nextCartConfirm(Request $request) {

        // 입력된 아이템들과 사용자 정보 가져오기
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'zipcode' => 'required|string|max:10',
            'city' => 'nullable|string|max:255',
            'detail_address' => 'required|string|max:500',
            'item_ids' => 'required|array',
            'quantities' => 'required|array',
        ]);

        // 선택된 상품들의 정보를 가져오기
        $carts = Cart::with('item')  // 아이템도 함께 로드
                ->whereIn('item_id', $validated['item_ids'])
                ->where('user_id', Auth::id())  // 현재 로그인한 사용자의 카트
                ->get();  // $queryData['item_ids']가 null일 경우 빈 배열을 사용


        // 최종 확인을 위한 데이터
        $userName = Auth::user()->name;

        return view('purchase.next-cart-confirm', compact('carts', 'userName', 'validated'));
    }

    public function cartCheckout(Request $request) {
        // DB검증
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'zipcode' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'detail_address' => 'required|string|max:500',
            'item_ids' => 'required|array',
            'item_ids.*' => 'integer|exists:items,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        // 상품 ID와 수량 배열
        $itemIds = $validated['item_ids'];
        $quantities = $validated['quantities'];

        // 사용자 정보
        $customerName = $validated['customer_name'];
        $customerEmail = $validated['customer_email'];
        $customerPhone = $validated['customer_phone'];
        $zipcode = $validated['zipcode'];
        $city = $validated['city'];
        $detailAddress = $validated['detail_address'];

        // 공통 group_id 생성
        $groupId = Str::uuid();

        // 트랜잭션 시작
        DB::beginTransaction();

        try {
            $lineItems = [];
            $metadata = [
                'user_id' => Auth::id(),
                'group_id' => $groupId, // 그룹 식별자 추가
                'customer_name' => $customerName,
                'customer_email' => $customerEmail,
                'customer_phone' => $customerPhone,
                'customer_address' => "{$zipcode} {$city} {$detailAddress}",
            ];

            foreach ($itemIds as $index => $itemId) {
                $item = Item::findOrFail($itemId);
                $quantity = $quantities[$index];
                $unitAmount = intval($item->price); // Stripe는 정수 단위 사용 (엔화)

                // 장바구니에서 사이즈 정보 가져오기
                $cart = Cart::where('item_id', $itemId)
                ->where('user_id', Auth::id())
                ->first();

                // Stripe 라인 아이템 구성
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => $item->name,
                        ],
                        'unit_amount' => $unitAmount,
                    ],
                    'quantity' => $quantity,
                ];

                // 주문 데이터 저장
                Order::create([
                    'item_id' => $item->id,
                    'user_id' => Auth::id(),
                    'status' => 'pending',
                    'quantity' => $quantity,
                    'amount' => $unitAmount * $quantity,
                    'payment_id' => $groupId, // 공통 그룹 식별자 할당
                    'customer_name' => $customerName,
                    'customer_email' => $customerEmail,
                    'customer_phone' => $customerPhone,
                    'customer_address' => "{$zipcode} {$city} {$detailAddress}",
                    'zipcode' => $zipcode,
                    'city' => $city,
                    'detail_address' => $detailAddress,
                    'purchased_size' => $cart->selected_size
                ]);
            }

            // Stripe 설정
            Stripe::setApiKey(config('services.stripe.secret'));

            // Stripe Checkout 세션 생성
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                //'success_url' => route('purchase.thankyouMultiple') . '?session_id={CHECKOUT_SESSION_ID}',
                // success_url에 group_id를 쿼리 파라미터로 포함
                'success_url' => route('purchase.thankyouMultiple') . '?group_id=' . $groupId,
                'cancel_url' => route('purchase.index'),
                'metadata' => $metadata,
            ]);

            // 트랜잭션 커밋
            DB::commit();

            // Stripe 결제 페이지로 리다이렉트
            return redirect($session->url);

        } catch (\Exception $e) {
            dd($e->getMessage());
            // 트랜잭션 롤백
            DB::rollBack();
            // 사용자에게 에러 메시지 반환
            return back()->withErrors(['error' => 'There was a problem during the payment process, please try again.']);
        }
    }

    public function thankyouMultiple(Request $request) {
        // group_id 가져오기
        $groupId = $request->query('group_id');

        if (!$groupId) {
            return redirect()->route('item.index')->withErrors(['error' => 'Invalid group ID.']);
        }

        try {
            // 해당 group_id의 모든 'pending' 주문 가져오기
            $orders = Order::with('item')
                        ->where('payment_id', $groupId)
                        ->where('status', 'pending')
                        ->get();

            if ($orders->isEmpty()) {
                return redirect()->route('item.index')->withErrors(['error' => 'No orders found for this group.']);
            }

            // 주문 상태를 'complete'로 업데이트
            // foreach ($orders as $order) {
            //     $order->update(['status' => 'complete']);
            // }

            // 주문 상태를 'complete'로 업데이트 하고 해당 카트에서 상품 삭제
            foreach ($orders as $order) {
                // 카트에서 해당 아이템 삭제
                Cart::where('item_id', $order->item_id)
                    ->where('user_id', Auth::id())
                    ->delete();

                // 주문 상태를 complete로 업데이트
                $order->update(['status' => 'complete']);
            }

            return view('purchase.thankyou-multiple', compact('orders'));

        } catch (\Exception $e) {
            //\Log::error('Thankyou Multiple Error: ' . $e->getMessage());
            return redirect()->route('item.index')->withErrors(['error' => 'There was a problem loading the Thankyou page.']);
        }

    }
}
