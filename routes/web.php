<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PurchaseController;

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
    // group 안에 있는 라우트는 모두 인증된 사용자만 접근 가능
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth'])->group(function () {

    /**
     * ItemController
     *
     * 상품 관련 라우트
     *
     */
    Route::get('/item_index', [ItemController::class, 'itemIndex'])->name('item.index');
    Route::get('/item_regIndex', [ItemController::class, 'itemRegIndex'])->name('item.regIndex');
    Route::post('/item_reg',action: [ItemController::class, 'itemReg'])->name('item.reg');
    Route::get('/item/detail/{id}',[ItemController::class, 'itemDetail'])->name('item.detail');
    Route::get('/item_nike', [ItemController::class, 'itemNike'])->name('item.nike');
    Route::get('/item_adidas', [ItemController::class, 'itemAdidas'])->name('item.adidas');
    Route::get('/item_newBalance', [ItemController::class, 'itemNewBalance'])->name('item.newBalance');
    Route::get('/item_others', [ItemController::class, 'itemOthers'])->name('item.others');
    Route::get('/item_sale', [ItemController::class, 'itemSale'])->name('item.sale');
    Route::get('/item/ajax_category/{category}', [ItemController::class, 'getItemsByAjaxCategory'])->name('item.ajax_category');
    Route::get('/item_search', [ItemController::class, 'itemSearch'])->name('item.search');
    Route::get('/item_edit/{id}', [ItemController::class, 'itemEdit'])->name('item.edit');
    Route::post('/item_update/{id}', [ItemController::class, 'itemUpdate'])->name('item.update');
    Route::post('/item_delete/{id}',[ItemController::class, 'itemDelete'])->name('item.delete');

    /**
     * PaymenController
     *
     * 결제 관련 라우트
     *
     */
    Route::get('/checkout/{id}', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('/payment', [PaymentController::class, 'processPayment'])->name('process.payment');

    /**
     * OrderController
     *
     * 주문 내역 관련 라우트트
     *
     */
    Route::get('/order_list', [OrderController::class, 'orderIndex'])->name('order.index');

    /**
     * PurchaseController
     *
     * 구매 관련 라우트
     *
     */
    Route::get('/purchase_index/{item_id}', [PurchaseController::class, 'purchase'])->name('purchase.index');
    Route::post('/purchase/confirm', [PurchaseController::class, 'confirm'])->name('purchase.confirm');
    Route::post('/purchase/checkout', [PurchaseController::class, 'checkout'])->name('purchase.checkout');
    Route::get('/purchase/thankyou', [PurchaseController::class, 'thankyou'])->name('purchase.thankyou');

    /**
     *  CartController
     *
     * 장바구니 관련 라우트
     *
     */
    Route::get('/cart_index', [CartController::class, 'cartIndex'])->name('cart.index');
    Route::post('/cart/add',[CartController::class, 'cartAdd'])->name('cart.add');
    Route::post('/cart/delete/{id}',[CartController::class, 'cartDelete'])->name('cart.delete');
    Route::post('/cart/update/{id}',[CartController::class, 'cartUpdate'])->name('cart.update');
    Route::get('/cart_count', [CartController::class, 'cartCount'])->name('cart.count');

});

/**
 * MainController
 *
 * localhost:8000/index
 * url '/index', MainPageController의 index 메소드를 실행
 *
 */
Route::get('/main_index', [MainController::class, 'mainIndex']);

// /**
//  * ItemController
//  *
//  * 상품 관련 라우트
//  *
//  */
// Route::get('/item_index', [ItemController::class, 'itemIndex'])->name('item.index');
// Route::get('/item_regIndex', [ItemController::class, 'itemRegIndex'])->name('item.regIndex');
// Route::post('/item_reg',action: [ItemController::class, 'itemReg'])->name('item.reg');
// Route::get('/item/detail/{id}',[ItemController::class, 'itemDetail'])->name('item.detail');
// Route::get('/item_nike', [ItemController::class, 'itemNike'])->name('item.nike');
// Route::get('/item_adidas', [ItemController::class, 'itemAdidas'])->name('item.adidas');
// Route::get('/item_newBalance', [ItemController::class, 'itemNewBalance'])->name('item.newBalance');
// Route::get('/item_others', [ItemController::class, 'itemOthers'])->name('item.others');
// Route::get('/item_sale', [ItemController::class, 'itemSale'])->name('item.sale');
// Route::get('/item/ajax_category/{category}', [ItemController::class, 'getItemsByAjaxCategory'])->name('item.ajax_category');
// Route::get('/item_search', [ItemController::class, 'itemSearch'])->name('item.search');
// Route::get('/item_edit/{id}', [ItemController::class, 'itemEdit'])->name('item.edit');
// Route::post('/item_update/{id}', [ItemController::class, 'itemUpdate'])->name('item.update');
// Route::post('/item_delete/{id}',[ItemController::class, 'itemDelete'])->name('item.delete');
// Route::get('/qna_index', [ItemController::class, 'qnaIndex'])->name('qna.index');

// /**
//  * PaymenController
//  *
//  * 결제 관련 라우트
//  *
//  */
// Route::get('/checkout/{id}', [PaymentController::class, 'checkout'])->name('checkout');
// Route::get('/payment', [PaymentController::class, 'processPayment'])->name('process.payment');

// /**
//  * OrderController
//  *
//  * 주문 내역 관련 라우트트
//  *
//  */
// Route::get('/order_list', [OrderController::class, 'orderIndex'])->name('order.index');

// /**
//  * PurchaseController
//  *
//  * 구매 관련 라우트
//  *
//  */
// Route::get('/purchase_index/{item_id}', [PurchaseController::class, 'purchase'])->name('purchase.index');
// Route::post('/purchase/confirm', [PurchaseController::class, 'confirm'])->name('purchase.confirm');
// Route::post('/purchase/checkout', [PurchaseController::class, 'checkout'])->name('purchase.checkout');
// Route::get('/purchase/thankyou', [PurchaseController::class, 'thankyou'])->name('purchase.thankyou');

// /**
//  *  CartController
//  *
//  * 장바구니 관련 라우트
//  *
//  */
// Route::get('/cart_index', [CartController::class, 'cartIndex'])->name('cart.index');
// Route::post('/cart/add',[CartController::class, 'cartAdd'])->name('cart.add');
// Route::post('/cart/delete/{id}',[CartController::class, 'cartDelete'])->name('cart.delete');
// Route::post('/cart/update/{id}',[CartController::class, 'cartUpdate'])->name('cart.update');
// Route::get('/cart_count', [CartController::class, 'cartCount'])->name('cart.count');

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


