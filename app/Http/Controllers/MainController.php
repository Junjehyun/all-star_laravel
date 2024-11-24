<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    /**
     * localhost:8000/index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function mainIndex() {
        // 공지사항 미리보기 가져오기 5개로 제한
        $notices = Notice::orderBy('created_at', 'desc')->take(5)->get();

        return view('main.index', compact('notices'));
    }
}
