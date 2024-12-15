<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;

class CartController extends Controller
{
    //
    /**
     * 장바구니 목록
     *
     */
    public function cartIndex() {

        $carts = Cart::with('item')->get(); // 관련된 Item 데이터를 함께 가져옴.
        return view('cart.index', compact('carts'));
    }

    public function cartAdd(Request $request) {
        try {
            // 요청에서 item_id를 가져옴
            $itemId = $request->input('item_id');

            // 아이템이 존재하는지 확인
            $item = Item::find($itemId);
            if (!$item) {
                return response()->json(['success' => false, 'message' => '商品がございません。'], 404);
            }

            // 이미 장바구니에 있는지 확인
            $cartItem = Cart::where('item_id', $itemId)->first();
            if ($cartItem) {
                // 기존 수량 증가
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                // 새로 추가
                Cart::create([
                    'item_id' => $itemId,
                    'quantity' => 1,
                ]);
            }

            return response()->json(['success' => true, 'message' => '商品がカートに追加されました。']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'カートに追加ができませんした。もう一度やり直してください。'], 500);
        }
    }

    // cart delete
    public function cartDelete($id) {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'カートから削除されました。');
    }

    public function cartUpdate(Request $request, $id) {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::findOrFail($id);
        $cart->quantity = $validatedData['quantity'];
        $cart->save();

        return redirect()->route('cart.index')->with('success', '数量がアップデートされました。');
    }
}
