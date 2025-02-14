<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KanriController extends Controller
{
    //
    public function dashboard() {
        return view('kanri.dashboard');
    }
}
