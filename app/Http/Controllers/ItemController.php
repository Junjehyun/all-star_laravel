<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *
 * ItemController
 * 상품 관련 컨트롤러
 */
class ItemController extends Controller
{
    //
    public function itemIndex() {
        return view('item.index');
    }

    public function itemReg() {
        return view('item.reg');
    }
}
