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

        $item = Item::findOrFail($item_id);

        return view('purchase.index', compact('item'));
    }

    public function checkout(Request $request) {
    }
}
