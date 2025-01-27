@extends('layouts.shop_common')
@section('title', 'Order Completed')
@section('content')
    <div class="container w-1/2 mx-auto mt-10">
        <h1 class="text-2xl text-center font-bold text-green-500">Thank you for your order!</h1>
        <p class="text-lg mt-4 text-center">Your order has been successfully completed.</p></br>
        <div class="rounded-lg p-4">
            <h2 class="text-2xl font-semibold mt-2 text-center">ORDER DETAILS</h2>
            <div class="max-w-4xl mx-auto mt-6">
                <table class="table-auto w-full">
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">NAME</td>
                            <td class="px-4 py-2">{{ $order->customer_name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">ORDER ID</td>
                            <td class="px-4 py-2">{{ $order->id }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">ITEM</td>
                            <td class="px-4 py-2">{{ $order->item->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">QUANTITY</td>
                            <td class="px-4 py-2">{{ $order->quantity }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">SIZE</td>
                            <td class="px-4 py-2">{{ $order->item->size }}mm</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">TELEPHONE</td>
                            <td class="px-4 py-2">{{ $order->customer_phone }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">E-MAIL</td>
                            <td class="px-4 py-2">{{ $order->customer_email }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">ADDRESS</td>
                            <td class="px-4 py-2">{{ $order->customer_address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div></br>
            <div class="text-center font-bold">
                <td class="px-4 py-2 text-center">TOTAL AMOUNT: </td>
                <td class="px-4 py-2">¥{{ number_format($order->amount) }}</td>
            </div></br>
            <p class="text-center">We will let you know as soon as the product is shipped.</p>
            <div class="flex justify-end">
                <a href="{{ route('item.index') }}">
                    <button class="underline underline-offset-4 rounded-xl px-3 py-2 mt-4">
                        TOP
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
