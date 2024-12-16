@extends('layouts.shop_common')
@section('title', 'カート')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">カート</h1>
    @if ($carts->isEmpty())
        <p class="text-center text-xl text-gray-500 font-semibold mt-10">カートが空いてます。今すぐショッピングしましょう！</p>
    @else
    <table class="w-full border-collapse">
        <thead>
            <tr>
                <th class="border-b py-2">商品名</th>
                <th class="border-b py-2">価格</th>
                <th class="border-b py-2">数量</th>
                <th class="border-b py-2">総合</th>
                <th class="border-b py-2">アクション</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
            <tr class="text-center">
                <td class="flex justify-center items-center border-b py-2">
                    <img src="{{ $cart->item->image ? asset('storage/' . $cart->item->image) : '/images/default-image.png' }}" alt="{{ $cart->item->name }}" class="h-16 w-16 object-cover rounded-lg">{{ $cart->item->name }}
                </td>
                <td class="border-b py-2">₩{{ number_format($cart->item->price) }}</td>
                <td class="border-b py-2">
                    <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="inline">
                        @csrf
                        <input type="number" name="quantity" value="{{ $cart->quantity }}" class="w-16 text-center border">
                        <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded ml-2">修正</button>
                    </form>
                </td>
                <td class="border-b py-2">₩{{ number_format($cart->item->price * $cart->quantity) }}</td>
                <td class="border-b py-2">
                    <form action="{{ route('cart.delete', $cart->id) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-6 text-right">
        <p class="text-xl font-bold">総計: {{ number_format($carts->sum(fn($cart) => $cart->item->price * $cart->quantity)) }} 円</p>
        <button class="outline outline-gray-200 rounded-xl px-3 py-2 mt-5">
            <a href="/item_index">戻る</a>
        </button>
    </div>
    @endif
</div>
@endsection
