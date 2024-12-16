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
        $items = Item::all();
        return view('item.index', compact('items'));

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

        //$items = Item::all();
        $items = Item::where('category', '상의')->get();

        return view('item.top', compact('items'));
    }

    public function itemBottom() {
        $items = Item::where('category', '하의')->get();
        return view('item.bottom', compact('items'));
    }

    public function itemShoes() {
        $items = Item::where('category', '신발')->get();
        return view('item.shoes', compact('items'));
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

    public function getItemsByAjaxCategory($category) {
        //$items = Item::where('category', $category)->get();
        if ($category === 'ALL') {
            // get all data
            $items = Item::all();
        } else {
            // selected data
            $items = Item::where('category', $category)->get();
        }
        return response()->json($items);
    }

    public function itemSearch(Request $request) {
        // 폼에서 전달된 검색 키워드 추출
        $keyword = $request->input('keyword');
        // Item 모델 기반으로 쿼리 시작
        $query = Item::query();
        // 키워드가 있으면 상품명 또는 설명에 해당 키워드가 포함된 항목 검색
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
                    //->orWhere('description', 'like', '%' . $keyword . '%');
        }
        // 조건에 맞는 상품들 가져오기
        $items = $query->get();
        // 검색 결과와 키워드를 뷰에 전달
        return view('item.index', compact('items', 'keyword'));
    }
}
