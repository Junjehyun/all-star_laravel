<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * 장바구니 목록
     *
     */
    public function cartIndex() {

        // Auth 이전 코드드
        //$carts = Cart::with('item')->get(); // 관련된 Item 데이터를 함께 가져옴.

        // Auth 이후 코드
        $carts = Cart::with('item')->where('user_id', Auth::id())->get();
        return view('cart.index', compact('carts'));
    }

    /**
     * 장바구니 추가
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function cartAdd(Request $request) {
        try {
            // 요청에서 item_id를 가져옴
            $itemId = $request->input('item_id');
            // 사이즈 값 추가
            $size = $request->input('size');

            // 아이템이 존재하는지 확인
            $item = Item::find($itemId);
            if (!$item) {
                return response()->json(['success' => false, 'message' => 'We dont have any products.'], 404);
            }

            // 사이즈가 선택되지 않으면 오류 반환
            if (!$size) {
                return response()->json(['success' => false, 'message' => 'Please select a size'], 404);
            }

            // 이미 장바구니에 있는지 확인
            //$cartItem = Cart::where('item_id', $itemId)->first();
            $cartItem = Cart::where('user_id', Auth::id())->where('item_id', $itemId)->first();
            if ($cartItem) {
                // 기존 수량 증가
                $cartItem->quantity += 1;
                $cartItem->selected_size = $size;
                $cartItem->save();
            } else {
                // 새로 추가
                Cart::create([
                    'user_id' => Auth::id(), // 로그인한 사용자의 ID
                    'item_id' => $itemId,
                    'quantity' => 1,
                    'selected_size' => $size
                ]);
            }

            return response()->json(['success' => true, 'message' => 'The item has been added to your cart.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Could not add to cart. Please try again.'], 500);
        }
    }

    // cart delete
    public function cartDelete($id) {

        //$cart = Cart::findOrFail($id);
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $cart->delete();

        return redirect()->route('cart.index')->with('success', 'Removed from cart.');
    }

    public function cartUpdate(Request $request, $id) {

        $validatedData = $request->validate([
            //'quantity' => 'required|integer|min:1',
            'quantities.' . $id => 'required|integer|min:1',
        ]);

        //$cart = Cart::findOrFail($id);
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        //$cart->quantity = $validatedData['quantity'];
        $cart->quantity = $validatedData['quantities'][$id];
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'The quantity has been updated.');
    }

    public function cartCount() {
        //$count = Cart::sum('quantity');
        //$count = Cart::where('user_id', Auth::id())->sum('quantity');
        // 로그인한 사용자의 카트에서 수량 합산
        $count = Cart::where('user_id', Auth::id())->sum('quantity');

        return response()->json(['count' => $count]);
    }
}
