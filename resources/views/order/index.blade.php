@extends('layouts.shop_common')
@section('title', 'Order List')
@section('content')
    <div class="container w-3/5 mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">ORDER LIST</h1>
        @if($orders->isEmpty())
            <p class="text-center text-gray-700 text-xl">Order history is missing.</p>
        @else
            <table class="table-auto w-full justify-center text-left border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border-b py-2 px-4">ORDER ID</th>
                        <th class="border-b py-2 px-4">ITEM NAME</th>
                        <th class="border-b py-2 px-4">QUANTITY</th>
                        <th class="border-b py-2 px-4">PRICE</th>
                        <th class="border-b py-2 px-4">STATUS</th>
                        <th class="border-b py-2 px-4">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="border-b py-2 px-4">{{ $order->id }}</td>
                            <td class="border-b py-2 px-4">{{ $order->item->name }}</td>
                            <td class="border-b py-2 px-4">{{ $order->quantity }}</td>
                            <td class="border-b py-2 px-4">￥{{ number_format($order->amount, 0) }}</td>
                            <td class="border-b py-2 px-4">{{ $order->status }}</td>
                            <td class="border-b py-2 px-4">{{ $order->created_at->format('Y-m-d H:i') }}</td>
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
