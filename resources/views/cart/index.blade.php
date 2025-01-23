@extends('layouts.shop_common')
@section('title', 'Cart')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">CART</h1>
    @if ($carts->isEmpty())
        <p class="text-center text-xl text-gray-500 font-semibold mt-10">The cart is empty. Let's go shopping right now!</p>
    @else
    <table class="w-full border-collapse">
        <thead>
            <tr>
                <th class="border-b py-2">ITEM NAME</th>
                <th class="border-b py-2">PRICE</th>
                <th class="border-b py-2">QUANTITY</th>
                <th class="border-b py-2">TOTAL PRICE</th>
                <th class="border-b py-2">ACTION</th>
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
                            <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded ml-2">EDIT</button>
                        </form>
                    </td>
                    <td class="border-b py-2">₩{{ number_format($cart->item->price * $cart->quantity) }}</td>
                    <td class="border-b py-2">
                        <form action="{{ route('cart.delete', $cart->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-6 text-right">
        <p class="text-xl font-bold">TOTAL: {{ number_format($carts->sum(fn($cart) => $cart->item->price * $cart->quantity)) }} 円</p>
        <a href="/item_index" class="outline outline-gray-200 rounded-xl px-3 py-2 mt-5 inline-block">RETURN</a>
    </div>
    @endif
</div>
@endsection
