<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

/**
 *
 * ItemController
 * 상품 관련 컨트롤러
 */
class ItemController extends Controller
{
    //
    /**
     * 쇼핑몰 메인
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function itemIndex() {

        return view('item.index');

    }

    /**
     * 상품 등록 페이지
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function itemRegIndex() {
        return view('item.regIndex');
    }

    /**
     * 실제로 상품 등록 로직
     *
     */
    public function itemReg(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'size' => 'required|string|nullable',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|in:상의,하의,신발,ETC,SALE',
        ]);

        // 이미지 업로드 처리
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Item::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'size' => $validated['size'],
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'category' => $validated['category'],
        ]);

        return redirect()->route('item.index')->with('success', '상품이 등록되었습니다.');

    }

    /**
     * 상의 TOP
     *
     */
    public function itemTop() {

        $items = Item::all();

        return view('item.top', compact('items'));
    }

    /**
     * 상품 상세보기
     *
     */
    public function itemDetail($id) {
        try {
            // ID로 해당상품 조회
            $item = Item::findOrFail($id);

            return view('item.detail', compact('item'));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => '상품 정보를 가져오는데 실패했습니다.']);
        }
    }
}
