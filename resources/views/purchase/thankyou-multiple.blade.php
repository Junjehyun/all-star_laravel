@extends('layouts.shop_common')
@section('title', 'Order Completed')
@section('content')
    <div class="container w-1/2 mx-auto mt-10">
        <h1 class="text-3xl text-center font-bold text-green-500">Thank you for your order!</h1>
        <p class="text-lg mt-4 text-center">Your order has been successfully completed.</p><br>

        <div class="rounded-lg p-6 bg-white shadow-md">
            <h2 class="text-2xl font-semibold mt-4 text-center">ORDER DETAILS</h2>
            <div class="mt-6">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Order ID</th>
                            <th class="py-2 px-4 border-b">Item</th>
                            <th class="py-2 px-4 border-b">Quantity</th>
                            <th class="py-2 px-4 border-b">Size (mm)</th>
                            <th class="py-2 px-4 border-b">Amount (¥)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="py-2 px-4 border-b text-center">{{ $order->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->item->name }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $order->quantity }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $order->item->size }}</td>
                                <td class="py-2 px-4 border-b text-right">{{ number_format($order->amount) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="py-2 px-4 text-right font-bold">TOTAL AMOUNT:</td>
                            <td class="py-2 px-4 text-right font-bold">¥{{ number_format($orders->sum('amount')) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold">ORDERER INFO</h3>
                <p><strong>Name:</strong> {{ $orders[0]->customer_name }}</p>
                <p><strong>Telephone:</strong> {{ $orders[0]->customer_phone }}</p>
                <p><strong>E-mail:</strong> {{ $orders[0]->customer_email }}</p>
                <p><strong>Address:</strong> {{ $orders[0]->customer_address }}</p>
            </div>
            <p class="text-center mt-4">We will let you know as soon as the product is shipped.</p>
            <div class="flex justify-center mt-6">
                <a href="{{ route('item.index') }}">
                    <button class="underline underline-offset-4 rounded-xl px-3 py-2 mt-4">
                        TOP
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
