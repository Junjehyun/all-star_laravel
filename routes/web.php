<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\NoticeController;

/**
 * 처음 만들었을때 기본적으로 생성되는 라우트 -> localhost:8000 Welcome Page
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
 */
// item main page
Route::get('/item_index', [
    ItemController::class, 'itemIndex']
    )->name('item.index');

// 상품 등록 페이지
Route::get('/item_reg', [
    ItemController::class, 'itemReg'
])->name('item.reg');

/**
 * NoticeController
 *
 * 공지사항 관련 라우트
 */
Route::get('/notice_index', [
    NoticeController::class, 'noticeIndex']
    )->name('notice.index');

Route::get('/notice_create', [
    NoticeController::class, 'noticeCreate']
    )->name('notice.create');

Route::post('/notice_store', [
    NoticeController::class, 'noticeStore'
    ])->name('notice.store');

Route::get('/notice/{id}', [
    NoticeController::class, 'noticeShow'
    ])->name('notice.show');

Route::get('/notice_edit/{id}', [
    NoticeController::class, 'noticeEdit'
    ])->name('notice.edit');

Route::post('/notice_update/{id}', [
    NoticeController::class, 'noticeUpdate'
    ])->name('notice.update');

/**
 * CommentController
 *
 * 댓글 관련 라우트
 */
Route::post('/comment/store',
    [CommentController::class, 'store'
    ])->name('comment.store');

/**
 * RefundController
 *
 * 환불&교환 관련 라우트
 */

/**
 * QAController
 *
 * Q&A 관련 라우트
 */


