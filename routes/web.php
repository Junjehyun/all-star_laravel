<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;


/**
 * 처음 만들었을때 기본적으로 생성되는 라우트 -> localhost:8000 Welcome Page
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Main Index
 * url '/index', MainPageController의 index 메소드를 실행
 *
 */
Route::get('/index', [MainPageController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
