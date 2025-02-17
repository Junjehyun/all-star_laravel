<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class KanriController extends Controller
{
    //
    public function dashboard() {

        // 날짜별 총 매출 계산
        $salesData = Order::selectRaw('DATE(created_at) as date, SUM(amount) as total_sales')
                        ->where('status', 'complete')
                        ->groupBy('date')
                        ->orderBy('date')
                        ->get();
        // 날짜와 매출 데이터를 배열로 변환
        $dates = $salesData->pluck('date');
        $totalSales = $salesData->pluck('total_sales');

        return view('kanri.dashboard', compact('dates', 'totalSales'));
    }

    public function kanriItems() {
        $items = Item::latest()->get();
        return view('kanri.kanri_items', compact('items'));
    }

    public function kanriUsers() {
        $users = User::where('role', 'user')->get();
        return view('kanri.kanri_users', compact('users'));
    }
}
