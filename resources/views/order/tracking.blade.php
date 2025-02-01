@extends('layouts.shop_common')
@section('title', 'Order Tracking')
@section('content')
<div class="container w-3/5 justify-center mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">TRACKING DELIVERY</h1>
    <p class="text-center mt-20">
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
