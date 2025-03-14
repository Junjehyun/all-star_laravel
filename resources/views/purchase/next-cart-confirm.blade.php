@extends('layouts.shop_common')
@section('title', 'Cart Purchase Confirm')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">購入確定</h1>
    <h2 class="text-center text-gray-700 text-xl font-bold mb-6"><span class="text-sky-700">{{ $userName }}</span>様のご注文商品</h2>
    <div class="bg-white rounded-lg p-6 mx-auto max-w-3xl">
        <div class="space-y-6">
            @foreach ($carts as $cart)
                <div class="flex justify-between border-b py-2">
                    <span class="flex-1 text-left">{{ $cart->item->name }}</span>
                    <span class="w-24 text-right">{{ number_format($cart->item->price) }}円</span>
                    <span class="w-24 text-center">x {{ $cart->quantity }}</span>
                    <span class="2-24 text-center text-rose-500">{{ $cart->selected_size }}</span>
                    <span class="w-24 text-right">{{ number_format($cart->item->price * $cart->quantity) }}円</span>
                    <!-- 사이즈(selected_size) 배열로 전환 시키기 -->
                    <input type="hidden" name="selected_size[{{ $cart->item->id }}]" value="{{ $cart->selected_size }}">
                </div>
            @endforeach
        </div>

        <!-- 총합 계산 -->
        <div class="mt-6 text-right">
            <p class="text-xl font-bold mb-10">
                総計:{{ number_format($carts->sum(fn($cart) => $cart->item->price * $cart->quantity)) }}円
            </p>
        </div>

        <!-- 사용자 정보 확인 -->
        <h2 class="text-xl font-semibold mb-10 text-center">お客様のご注文情報</h2>
        <div class="container space-y-4">
            <div>
                <label for="customer_name" class="block text-gray-700 font-semibold text-xs mb-2">氏名</label>
                <p>{{ $validated['customer_name'] }}</p>
            </div>
            <div>
                <label for="customer_email" class="block text-gray-700 font-semibold text-xs mb-2">メールアドレス</label>
                <p>{{ $validated['customer_email'] }}</p>
            </div>
            <div>
                <label for="customer_phone" class="block text-gray-700 font-semibold text-xs mb-2">電話番号</label>
                <p>{{ $validated['customer_phone'] }}</p>
            </div>
            <div>
                <label for="zipcode" class="block text-gray-700 font-semibold text-xs mb-2">郵便番号</label>
                <p>{{ $validated['zipcode'] }}</p>
            </div>
            <div>
                <label for="city" class="block text-gray-700 font-semibold text-xs mb-2">都道府県</label>
                <p>{{ $validated['city'] }}</p>
            </div>
            <div>
                <label for="detail_address" class="block text-gray-700 font-semibold text-xs mb-2">詳細住所</label>
                <p>{{ $validated['detail_address'] }}</p>
            </div>
        </div>
        <div class="flex justify-end space-x-4 mt-10">
            <!-- 결제 버튼 -->
            <form action="{{ route('purchase.cartCheckout') }}" method="post" class="inline">
                @csrf
                    @foreach ($carts as $cart)
                        <input type="hidden" name="item_ids[]" value="{{ $cart->item->id }}">
                        <input type="hidden" name="quantities[]" value="{{ $cart->quantity }}">
                        <input type="hidden" name="selected_size[{{ $cart->item->id }}]" value="{{ $cart->selected_size }}">
                    @endforeach
                    <input type="hidden" name="customer_name" value="{{ $validated['customer_name'] }}">
                    <input type="hidden" name="customer_email" value="{{ $validated['customer_email'] }}">
                    <input type="hidden" name="customer_phone" value="{{ $validated['customer_phone'] }}">
                    <input type="hidden" name="zipcode" value="{{ $validated['zipcode'] }}">
                    <input type="hidden" name="city" value="{{ $validated['city'] }}">
                    <input type="hidden" name="detail_address" value="{{ $validated['detail_address'] }}">
                    <button type="submit" class="w-full outline outline-sky-200 px-2 py-1 text-sm rounded-xl hover:bg-sky-400 hover:text-white">
                        購入
                    </button>
            </form>
            <!-- 수정으로 돌아가기 버튼 -->
            <form action="{{ route('purchase.selected') }}" method="POST" class="inline">
                @csrf
                @foreach ($carts as $cart)
                    <input type="hidden" name="selected_item[]" value="{{ $cart->item->id }}">
                    <input type="hidden" name="quantities[]" value="{{ $cart->quantity }}">
                @endforeach
                <input type="hidden" name="customer_name" value="{{ $validated['customer_name'] }}">
                <input type="hidden" name="customer_email" value="{{ $validated['customer_email'] }}">
                <input type="hidden" name="customer_phone" value="{{ $validated['customer_phone'] }}">
                <input type="hidden" name="zipcode" value="{{ $validated['zipcode'] }}">
                <input type="hidden" name="city" value="{{ $validated['city'] }}">
                <input type="hidden" name="detail_address" value="{{ $validated['detail_address'] }}">
                <button type="submit" class="w-full outline outline-rose-200 px-2 py-1 text-sm rounded-xl hover:bg-rose-400 hover:text-white">
                    戻る
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
