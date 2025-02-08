@extends('layouts.shop_common')
@section('title', 'Order List')
@section('content')
    <div class="container w-3/5 justify-center mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">ORDER LIST</h1>
        @if($orders->isEmpty())
            <p class="text-center text-gray-700 text-xl">Order history is missing.</p>
        @else
            <table class="table-auto w-full justify-center text-left border-collapse border border-gray-300">
                <thead>
                    <tr class="text-sm">
                        <th class="border-b py-2 px-4">TRACKING</th>
                        @if(Auth::user()->role == 'admin')  <!-- 관리자일 경우에만 user_id 추가 -->
                            <th class="border-b py-2 px-4">USER ID</th>
                        @endif
                        <th class="border-b py-2 px-4">ORDER ID</th>
                        <th class="border-b py-2 px-4">ITEM NAME</th>
                        <th class="border-b py-2 px-4">QUANTITY</th>
                        <th class="border-b py-2 px-4">PRICE</th>
                        <th class="border-b py-2 px-4">STATUS</th>
                        @if(Auth::user()->role == 'admin') <!-- 관리자일 경우에만 배송상태 추가 -->
                            <th class="border-b py-2 px-4">TRACK DELIVERY</th>
                        @endif
                        <th class="border-b py-2 px-4">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="text-sm">
                            <td class="border-b py-2 px-4 text-sky-600 underline underline-offset-2 text-sm"><a href="{{ route('order.tracking', ['id' => $order->id]) }}">DETAIL</a></td>
                            @if(Auth::user()->role == 'admin')  <!-- 관리자일 경우 user_id 표시 -->
                                <td class="border-b py-2 px-4 font-bold">{{ $order->customer_name }}</td>
                            @endif
                            <td class="border-b py-2 px-4">{{ $order->id }}</td>
                            <td class="border-b py-2 px-4">{{ $order->item->name }}</td>
                            <td class="border-b py-2 px-4">{{ $order->quantity }}</td>
                            <td class="border-b py-2 px-4">￥{{ number_format($order->amount, 0) }}</td>
                            <td class="border-b py-2 px-4 {{ $order->status == 'complete' ? 'text-green-500' : '' }}">{{ $order->status }}</td>
                            @if(Auth::user()->role == 'admin')
                            <th class="border-b py-2 px-4 text-rose-600">{{ $order->shipping_status }}</th>
                            @endif
                            <td class="border-b py-2 px-4">{{ $order->created_at->format('Y年m月d日 H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="flex justify-end mt-3">
            <a href="/item_index" class="outline outline-rose-100 py-1 px-2 rounded-xl">RETURN</a>
        </div>
    </div>
@endsection
