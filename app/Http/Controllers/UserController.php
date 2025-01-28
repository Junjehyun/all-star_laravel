<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function myPage() {

        $user = Auth::user();

        $userName = Auth::user()->name;

        return view('user.mypage', compact('user', 'userName'));
    }
}
