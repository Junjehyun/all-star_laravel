<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
/**
 * 구매 관련 컨트롤러
 *
 */
class PurchaseController extends Controller
{
    // 구매하기 페이지
    public function purchase($item_id) {
        // 상품 정보 로드
        $item = Item::findOrFail($item_id);

        return view('purchase.index', compact('item'));
    }

    public function checkout(Request $request) {
    }
}
