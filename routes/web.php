<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\NoticeController;

/**
 * 처음 만들었을때 기본적으로 생성되는 라우트 -> localhost:8000 Welcome Page
 *
 */
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/**
 * MainController
 *
 * localhost:8000/index
 * url '/index', MainPageController의 index 메소드를 실행
 *
 */
Route::get('/main_index', [MainController::class, 'mainIndex']);

/**
 * ItemController
 *
 * 상품 관련 라우트
 *
 */
Route::get('/item_index', [ItemController::class, 'itemIndex'])->name('item.index');
Route::get('/item_regIndex', [ItemController::class, 'itemRegIndex'])->name('item.regIndex');
Route::post('/item_reg',[ItemController::class, 'itemReg'])->name('item.reg');
Route::get('/item/detail/{id}',[ItemController::class, 'itemDetail'])->name('item.detail');
Route::get('/item_top',[ItemController::class,'itemTop'])->name('item.top');
Route::get('/item_bottom', [ItemController::class, 'itemBottom'])->name('item.bottom');
Route::get('/item_shoes', [ItemController::class, 'itemShoes'])->name('item.shoes');
Route::get('/item/ajax_category/{category}', [ItemController::class, 'getItemsByAjaxCategory'])->name('item.ajax_category');
Route::get('/item_search', [ItemController::class, 'itemSearch'])->name('item.search');
/**
 *  CartController
 *
 * 장바구니 관련 라우트
 */
Route::get('/cart_index', [CartController::class, 'cartIndex'])->name('cart.index');
Route::post('/cart/add',[CartController::class, 'cartAdd'])->name('cart.add');
Route::post('/cart/delete/{id}',[CartController::class, 'cartDelete'])->name('cart.delete');
Route::post('/cart/update/{id}',[CartController::class, 'cartUpdate'])->name('cart.update');



/**
 * NoticeController
 *
 * 공지사항 관련 라우트
 *
 */
Route::get('/notice_index', [NoticeController::class, 'noticeIndex'])->name('notice.index');
Route::get('/notice_create', [NoticeController::class, 'noticeCreate'])->name('notice.create');
Route::post('/notice_store', [NoticeController::class, 'noticeStore'])->name('notice.store');
Route::get('/notice/{id}', [NoticeController::class, 'noticeShow'])->name('notice.show');
Route::get('/notice_edit/{id}', [NoticeController::class, 'noticeEdit'])->name('notice.edit');
Route::post('/notice_update/{id}', [NoticeController::class, 'noticeUpdate'])->name('notice.update');
Route::post('/notice_delete/{id}',[NoticeController::class, 'noticeDelete'])->name('notice.delete');
Route::post('/notice/like/{id}', [NoticeController::class, 'noticeLike'])->name('notice.like');
/**
 * CommentController
 *
 * 댓글 관련 라우트
 *
 */
Route::post('/comment/store',[CommentController::class, 'commentStore'])->name('comment.store');
Route::post('/comment/delete/{id}', [CommentController::class, 'commentDelete'])->name('comment.delete');
Route::post('/comment/update/{id}', [CommentController::class, 'commentUpdate'])->name('comment.update');
Route::post('/comment/reply', [CommentController::class, 'commentReply'])->name('comment.reply');
Route::post('/reply/delete/{id}', [CommentController::class, 'deleteReply'])->name('delete.reply');
/**
 * RefundController
 *
 * 환불&교환 관련 라우트
 *
 */

/**
 * QAController
 *
 * Q&A 관련 라우트
 *
 */


