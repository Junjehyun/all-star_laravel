@extends('layouts.shop_common')
@section('title', 'Cart Purchase Confirm')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">CONFIRM PURCHASE</h1>
        <h2 class="text-center text-gray-700 text-xl font-bold mb-6"><span class="text-sky-700">{{ $userName }}</span> ORDER LIST</h2>
        <div class="bg-white rounded-lg p-8">
            <!-- 선택된 상품들 표시 -->
            <div class="space-y-6">
                @foreach ($carts as $cart)
                    <div class="flex justify-between border-b py-2">
                        <span class="flex-1 text-left">{{ $cart->item->name }}</span>
                        <span class="w-24 text-right">{{ number_format($cart->item->price) }}円</span>
                        <span class="w-24 text-center">x {{ $cart->quantity }}</span>  <!-- 수량 -->
                        <span class="w-32 text-right">{{ number_format($cart->item->price * $cart->quantity) }}円</span> <!-- 총합 -->
                    </div>
                @endforeach
            </div>
            <!-- 총합 계산 -->
            <div class="mt-6 text-right">
                <p class="text-xl font-bold">
                    TOTAL: ₩{{ number_format($carts->sum(fn($cart) => $cart->item->price * $cart->quantity)) }}
                </p>  <!-- 총합 표시 -->

                <form action="{{ route('purchase.checkout') }}" method="POST" class="inline">
                    @csrf
                    @foreach ($carts as $cart)
                        <input type="hidden" name="item_ids[]" value="{{ $cart->item->id }}">
                        <input type="hidden" name="quantities[]" value="{{ $cart->quantity }}">
                    @endforeach
                    <button type="submit" class="outline outline-sky-200 rounded-xl px-3 py-2 mt-5 inline-block">BUY</button>
                </form>
            </div>
            {{-- <div class="mt-6 text-right">
                <p class="text-xl font-bold">TOTAL: ₩{{ number_format($items->sum(fn($item) => $item->price * $item->quantity)) }}</p>  <!-- 총합 표시 -->
                <form action="{{ route('purchase.checkout') }}" method="POST" class="inline">
                    @csrf
                    @foreach ($items as $item)
                        <input type="hidden" name="item_ids[]" value="{{ $item->id }}">
                        <input type="hidden" name="quantities[]" value="{{ $item->quantity }}">
                    @endforeach
                    <button type="submit" class="outline outline-sky-200 rounded-xl px-3 py-2 mt-5 inline-block">BUY</button>
                </form>
            </div> --}}
        </div>
    </div>
@endsection
