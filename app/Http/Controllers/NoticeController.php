<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *
 * NoticeController
 * 공지사항 관련 컨트롤러
 */
class NoticeController extends Controller
{
    //
    public function noticeIndex() {
        return view('notice.index');
    }

    public function noticeCreate() {
        return view('notice.create');

    }
}
