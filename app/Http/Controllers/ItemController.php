<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // 카테고리 정의
        $categories = [
            'ALL' => 'ALL',
            'nike' => 'Nike',
            'adidas' => 'Adidas',
            'newbalance' => 'New Balance',
            'others' => 'Others',
            'sale' => 'SALE',  // SALE은 특별히 할인이 적용된 상품을 의미하는 카테고리
        ];

        // 각 카테고리별 상품 수 계산
        $categoryCounts = [];

        // 카테고리별 상품 개수 구하기
        foreach ($categories as $key => $displayName) {
            if ($key == 'ALL') {
                // 'ALL'은 모든 상품 수
                $categoryCounts[$key] = Item::count();
            } elseif ($key == 'sale') {
                // 'SALE' 카테고리는 SALE에 해당하는 상품만 카운트
                // 예시로 SALE 카테고리가 'sale'로 지정된 상품들만 카운트
                $categoryCounts[$key] = Item::where('category', 'sale')->count();
            } else {
                // 각 브랜드별 상품 개수를 구함.
                $categoryCounts[$key] = Item::where('category', $displayName)->count();
            }
        }
        $items = Item::latest()->get();
        return view('item.index', compact('items', 'categoryCounts'));

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

        $sizeData = json_decode($request->input('size'), true);

        $request->merge(['size' => $sizeData]);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'size' => 'required|array|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|in:nike,adidas,newBalance,others,sale',
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
    public function itemNike() {
        //$items = Item::all();
        $items = Item::where('category', 'nike')->get();
        return view('item.nike', compact('items'));
    }

    public function itemAdidas() {
        $items = Item::where('category', 'adidas')->get();
        return view('item.adidas', compact('items'));
    }

    public function itemNewBalance() {
        $items = Item::where('category', 'newBalance')->get();
        return view('item.newbalance', compact('items'));
    }

    public function itemOthers() {
    }

    public function itemSale() {
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
            //$items = Item::all();
            $items = Item::latest()->get();
        } else {
            // selected data
            $items = Item::where('category', $category)
                                ->orderBy('created_at', 'desc')
                                ->get();
        }
        return response()->json($items);
    }

    public function itemSearch(Request $request) {
        // 폼에서 전달된 검색 키워드 추출
        $keyword = $request->input('keyword');
        $selectedCategory = $request->input('category', 'ALL');  // 기본값은 'ALL'

        // Item 모델 기반으로 쿼리 시작
        $query = Item::query();

        // 키워드가 있으면 상품명 또는 설명에 해당 키워드가 포함된 항목 검색
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
                    //->orWhere('description', 'like', '%' . $keyword . '%');
        }

        // 카테고리 필터링
        if ($selectedCategory != 'ALL') {
            $query->where('category', $selectedCategory);
        }

        // 조건에 맞는 상품들 가져오기
        $items = $query->get();

        // 검색 결과가 없으면 빈 배열로 처리
        if ($items->isEmpty()) {
            $items = collect(); // 빈 컬렉션 반환
        }

        // 카테고리별 상품 수 계산 (카테고리 개수는 그대로 사용)
        $categories = [
            'ALL' => 'ALL',
            'nike' => 'Nike',
            'adidas' => 'Adidas',
            'newbalance' => 'New Balance',
            'others' => 'Others',
            'sale' => 'SALE',
        ];
        $categoryCounts = [];

        foreach ($categories as $key => $displayName) {
            if ($key == 'ALL') {
                $categoryCounts[$key] = Item::count();
            } elseif ($key == 'sale') {
                $categoryCounts[$key] = Item::where('category', 'sale')->count();
            } else {
                $categoryCounts[$key] = Item::where('category', $displayName)->count();
            }
        }
        // 검색 결과와 키워드를 뷰에 전달
        return view('item.index', compact('items', 'keyword','categoryCounts', 'selectedCategory'));
    }

    public function itemEdit($id) {
        try {
            $item = Item::findOrFail($id);
            return view('item.edit', compact('item'));
        } catch (\Exception $e) {
            return redirect()->route('item.index')->withErrors(['error' => '商品が見つかりませんでした。']);
        }
    }

    public function itemUpdate(Request $request, $id) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'size' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|in:nike,adidas,newBalance,others,sale',
        ]);

        try {
            $item = Item::findOrFail($id);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $item->image = $imagePath;
            }

            // item update
            $item->update([
                'name' => $validated['name'],
                'price' => $validated['price'],
                'size' => $validated['size'],
                'description' => $validated['description'],
                'category' => $validated['category'],
            ]);

            return redirect()->route('item.index')->with('success', '修正を完了しました。');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => '商品更新中にエラーが発生しました。']);
        }
    }

    public function itemDelete($id) {
        try {
            $item = Item::findOrFail($id);
            $item->delete();

            return redirect()->route('item.index')->with('success', '商品が削除されました。');
        } catch (\Exception $e) {
            return redirect()->route('item.index')->withErrors(['error' => '商品削除中にエラーが発生しました。']);
        }
    }

    public function qnaIndex() {
        return view('item.qna');
    }

    public function likeProduct($id) {
        try {
            // 아이템 조회
            $item = Item::findOrFail($id);

            // 좋아요 수 증가
            $item->increment('like');

            // 성공 응답
            return response()->json([
                'success' => true,
                'message' => 'I pressed Like for the item.',
                'like_count' => $item->like,
            ]);
        } catch (\Exception $e) {
            // 실패 응답
            return response()->json([
                'success' => false,
                'message' => 'An error occurred during processing.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function review(Request $request, $id) {

        // 현재 로그인한 유저 정보
        $user = Auth::user();

        // 아이템 조회
        $item = Item::findOrFail($id);

        $comment = Comment::latest()->get();

        // 리뷰 내용과 평점 유효성 검사
        $validated = $request->validate([
            'content' => 'required|string|max:255',  // 리뷰 내용
            'rating' => 'required|integer|between:1,5', // 평점 (1부터 5까지)
        ]);

        try {
            // 리뷰 데이터 저장
            $item->reviews()->create([
                'user_id' => $user->id,
                'content' => $validated['content'],
                'rating' => $validated['rating'],
            ]);

            // 성공 응답
            return redirect()->route('item.detail', ['id' => $item->id])->with('success', 'Review has been added successfully.');

        } catch (\Exception $e) {
            // 오류 발생 시 응답
            return back()->withErrors(['error' => 'Failed to submit the review. Please try again.']);
        }
    }

    public function storeReview(Request $request, $id) {
        // 유효성 검사
        $validated = $request->validate([
            'author' => 'required|string|max:20',
            'content' => 'required|string|max:200',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // 아이템을 찾고, 해당 아이템에 리뷰를 추가
        $item = Item::findOrFail($id);

        // 리뷰 저장
        $item->reviews()->create([
            'author' => $validated['author'],
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'item_id' => $item->id,
            'notice_id' => null,
        ]);

        // 성공적으로 리뷰가 저장되었다는 메시지와 함께 아이템 상세 페이지로 리디렉션
        return redirect()->route('item.detail', ['id' => $id])->with('success', 'Your review has been created.');
    }
}
