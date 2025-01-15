<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     // 로그인 상태와 역할 확인
    //     // 일단 이 기능 안되서 보류 2025/01/15
    //     if (Auth::check()) {
    //         if (Auth::user()->role === 'admin') {
    //             return $next($request); // 관리자는 요청을 계속 처리
    //         }

    //         // 일반 사용자는 /dashboard로 리다이렉트
    //         return redirect('/item_index');
    //     }
    //     // 로그인하지 않은 사용자는 로그인 페이지로 리다이렉트
    //     return redirect('/login');
    // }
}
