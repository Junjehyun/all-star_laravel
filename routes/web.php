<?php

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
 * NoticeController
 *
 * 공지사항 관련 라우트
 */

// 공지사항 메인 페이지
Route::get('/notice_index', [NoticeController::class, 'noticeIndex']);

// 공지사항 작성 페이지
Route::get('/notice_create', [NoticeController::class, 'noticeCreate']);

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

/**
 * ItemController
 *
 * 상품 관련 라우트
 */
