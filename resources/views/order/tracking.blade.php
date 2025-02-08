@extends('layouts.shop_common')
@section('title', 'Order Tracking')
@section('content')
{{-- <div class="container w-full justify-center mx-auto mt-10">
    <h1 class="text-left text-2xl font-bold">TRACKING DELIVERY</h1>
    <p class="text-center mt-5">
        <span class="{{ $shipping_status == 'pay-confirm' ? 'font-bold text-green-500 text-2xl' : '' }}">
            @if($shipping_status == 'pay-confirm')
                <i class="fa-solid fa-check"></i>
            @endif
            CHECK PAYMENT
        </span> &rarr;
        <span class="{{ $shipping_status == 'prepare' ? 'font-bold text-green-500 text-2xl' : '' }}">
            @if($shipping_status == 'prepare')
                <i class="fa-solid fa-check"></i>
            @endif
            PREPARING PRODUCT
        </span> &rarr;
        <span class="{{ $shipping_status == 'delivery' ? 'font-bold text-green-500 text-2xl' : '' }}">
            @if($shipping_status == 'delivery')
                <i class="fa-solid fa-check"></i>
            @endif
            SHIPPING
        </span> &rarr;
        <span class="{{ $shipping_status == 'complete' ? 'font-bold text-green-500 text-2xl' : '' }}">
            @if($shipping_status == 'complete')
                <i class="fa-solid fa-check"></i>
            @endif
            DELIVERY COMPLETE
        </span>
    </p>
    <!-- -->
    <div class="rounded-lg flex justify-between mt-20">
        <h2 class="text-2xl font-semibold mt-2 text-center mb-10">ORDER DETAILS</h2>
        <!-- 상품 정보 테이블 -->
        <div class="max-w-5xl mx-auto mt-6">
            <h3 class="text-xl font-semibold mb-4">Product Information</h3>
            <table class="table-auto w-[80%]">
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">ORDER ID</td>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">ITEM</td>
                        <td>{{ $order->item->name }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">QUANTITY</td>
                        <td>{{ $order->quantity }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">SIZE</td>
                        <td>{{ $order->item->size }}mm</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">PAYMENT TYPE</td>
                        <td>{{ $order->payment_type }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">TOTAL</td>
                        <td>¥{{ number_format($order->amount) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- 배송자 정보 테이블 -->
        <div class="max-w-3xl mx-auto mt-6">
            <h3 class="text-xl font-semibold mb-4">Customer Information</h3>
            <table class="table-auto w-3/5">
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">NAME</td>
                        <td>{{ $order->customer_name }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">TELEPHONE</td>
                        <td>{{ $order->customer_phone }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">E-MAIL</td>
                        <td>{{ $order->customer_email }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">ADDRESS</td>
                        <td>{{ $order->customer_address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-end">
        <a href="{{ route('item.index') }}">
            <button class="underline underline-offset-4 rounded-xl px-3 py-2 mt-4">
                TOP
            </button>
        </a>
    </div>
    <!-- -->
</div>
    @auth
        @if(Auth::user()->role === 'admin')
            <div class="container w-1/2 mx-auto mt-20">
                <form action="{{ route('update.shipping.status', $order->id) }}" method="POST">
                    @csrf
                    <label for="shipping_status">SELECT STATUS:</label>
                    <select name="shipping_status" id="shipping_status">
                        <option value="pay-confirm" {{ $order->shipping_status == 'pay-confirm' ? 'selected' : '' }}>PAID CONFIM</option>
                        <option value="prepare" {{ $order->shipping_status == 'prepare' ? 'selected' : '' }}>PREPARE ITEM</option>
                        <option value="delivery" {{ $order->shipping_status == 'delivery' ? 'selected' : '' }}>DELIVERY</option>
                        <option value="complete" {{ $order->shipping_status == 'complete' ? 'selected' : '' }}>COMPLETE</option>
                    </select>
                    <button type="submit" class="outline outline-gray-200 py-2 px-2 rounded-xl">SAVE</button>
                </form>
            </div>
        @endif
    @endauth --}}
    <div class="container w-full justify-center mx-auto">
        <h1 class="text-center text-2xl font-bold mt-10">TRACKING DELIVERY</h1>
        <p class="text-center mt-10">
            <span class="{{ $shipping_status == 'pay-confirm' ? 'font-bold text-green-500 text-2xl' : '' }}">
                @if($shipping_status == 'pay-confirm')
                    <i class="fa-solid fa-check"></i>
                @endif
                CHECK PAYMENT
            </span> &rarr;
            <span class="{{ $shipping_status == 'prepare' ? 'font-bold text-green-500 text-2xl' : '' }}">
                @if($shipping_status == 'prepare')
                    <i class="fa-solid fa-check"></i>
                @endif
                PREPARING PRODUCT
            </span> &rarr;
            <span class="{{ $shipping_status == 'delivery' ? 'font-bold text-green-500 text-2xl' : '' }}">
                @if($shipping_status == 'delivery')
                    <i class="fa-solid fa-check"></i>
                @endif
                SHIPPING
            </span> &rarr;
            <span class="{{ $shipping_status == 'complete' ? 'font-bold text-green-500 text-2xl' : '' }}">
                @if($shipping_status == 'complete')
                    <i class="fa-solid fa-check"></i>
                @endif
                DELIVERY COMPLETE
            </span>
        </p>
    </div>
    <div class="w-[60%] flex justify-between items-stretch mt-20 mx-auto space-x-5">
        <div class="w-1/2 border rounded-xl py-5">
            <!-- 상품 정보 테이블 -->
            <h2 class="text-2xl font-semibold text-center mt-2 mb-10">ORDER DETAILS</h2>
            <table class="flex justify-center">
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">ORDER ID</td>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">ITEM</td>
                        <td>{{ $order->item->name }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">QUANTITY</td>
                        <td>{{ $order->quantity }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">SIZE</td>
                        <td>{{ $order->purchased_size }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">PAYMENT TYPE</td>
                        <td>{{ $order->payment_type }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">TOTAL</td>
                        <td>¥{{ number_format($order->amount) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-1/2 border rounded-xl py-5">
            <!-- 주문고객 정보 테이블 -->
            <h2 class="text-2xl font-semibold text-center mt-2 mb-10">CUSTOMER INFO</h2>
            <table class="flex justify-center">
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">NAME</td>
                        <td>{{ $order->customer_name }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">TELEPHONE</td>
                        <td>{{ $order->customer_phone }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">E-MAIL</td>
                        <td>{{ $order->customer_email }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">ADDRESS</td>
                        <td>{{ $order->customer_address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @auth
        @if(Auth::user()->role === 'admin')
            <div class="container w-1/2 mx-auto mt-20">
                <form action="{{ route('update.shipping.status', $order->id) }}" method="POST">
                    @csrf
                    <label for="shipping_status">SELECT STATUS:</label>
                    <select name="shipping_status" id="shipping_status">
                        <option value="pay-confirm" {{ $order->shipping_status == 'pay-confirm' ? 'selected' : '' }}>PAID CONFIM</option>
                        <option value="prepare" {{ $order->shipping_status == 'prepare' ? 'selected' : '' }}>PREPARE ITEM</option>
                        <option value="delivery" {{ $order->shipping_status == 'delivery' ? 'selected' : '' }}>DELIVERY</option>
                        <option value="complete" {{ $order->shipping_status == 'complete' ? 'selected' : '' }}>COMPLETE</option>
                    </select>
                    <button type="submit" class="outline outline-gray-200 py-2 px-2 rounded-xl">SAVE</button>
                </form>
            </div>
        @endif
    @endauth
@endsection
