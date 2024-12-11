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

        $validatedData = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('item_id', $validatedData['item_id'])->first();

        if($cart) {
            $cart->quantity += $validatedData['quantity'];
            $cart->save();
        } else {
            Cart::create($validatedData);
        }

        return redirect()->route('cart.index')->with('success', '상품이 장바구니에 추가되었습니다.');
    }

    // cart delete
    public function cartDelete($id) {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return redirect()->route('cart.index')->with('success', '장바구니에서 삭제되었습니다.');
    }

    public function cartUpdate(Request $request, $id) {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::findOrFail($id);
        $cart->quantity = $validatedData['quantity'];
        $cart->save();

        return redirect()->route('cart.index')->with('success', '장바구니 수량이 업데이트 되었습니다');
    }
}
