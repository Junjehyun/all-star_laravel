@extends('layouts.shop_common')
@section('title', '상품 상세')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">{{ $item->name }}</h1>
    <div class="flex flex-col items-center">
        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/default-image.png') }}" alt="{{ $item->name }}" class="w-96 h-96 object-cover mb-6 border rounded-lg shadow-lg">
    </div>
    <div class="text-center space-y-4 mt-5">
        <p class="text-gray-700">価格: <span class="font-bold">₩{{ number_format($item->price) }}</span></p>
        <p class="text-gray-700">サイズ: <span class="font-bold">{{ $item->size }}</p>
        <p class="text-gray-700 text-lg">商品詳細</p>
        <p class="text-gray-600">{{ $item->description }}</p>
    </div>
    <div class="flex justify-center mt-8 space-x-3">
        <button class="px-6 py-2 outline outline-gray-200 rounded-xl">購入する</button>
        <a href="{{ url()->previous() }}" class="px-6 py-2 outline outline-gray-200 rounded-xl">戻る</a>
    </div>
    <div class="bg-white shadow-xl py-5 px-5 mt-5">
        <h2 class="flex justify-center text-2xl">簡単レビュー</h2>
        <div class="flex items-center justify-center my-5 gap-3">
            <div class="flex gap-1 mt-6">
                <input type="checkbox" id="star1" name="rating" value="1" class="hidden peer">
                <label for="star1" class="cursor-pointer text-gray-300 hover:text-yellow-500 peer-checked:text-yellow-500 text-2xl">★</label>

                <input type="checkbox" id="star2" name="rating" value="2" class="hidden">
                <label for="star2" class="cursor-pointer text-gray-300 hover:text-yellow-500 peer-checked:text-yellow-500 text-2xl">★</label>

                <input type="checkbox" id="star3" name="rating" value="3" class="hidden">
                <label for="star3" class="cursor-pointer text-gray-300 hover:text-yellow-500 peer-checked:text-yellow-500 text-2xl">★</label>

                <input type="checkbox" id="star4" name="rating" value="4" class="hidden">
                <label for="star4" class="cursor-pointer text-gray-300 hover:text-yellow-500 peer-checked:text-yellow-500 text-2xl">★</label>

                <input type="checkbox" id="star5" name="rating" value="5" class="hidden">
                <label for="star5" class="cursor-pointer text-gray-300 hover:text-yellow-500 peer-checked:text-yellow-500 text-2xl">★</label>
            </div>
            <div class="flex flex-col">
                <label for="" class="py-2 px-2">作成者</label>
                <input type="text" placeholder="作成者" class="border border-gray-200 rounded-xl px-3 py-2 w-32">
            </div>
            <div class="flex flex-col">
                <label for="" class="py-2 px-2">レビュー</label>
                <input type="text" placeholder="レビューをお願いします。" class="border border-gray-200 rounded-xl px-3 py-2 w-96">
            </div>
            <div class="flex self-end">
                <button type="sutbmit" class="outline outline-gray-200 rounded-xl px-3 py-2">작성</button>
            </div>
        </div>
    </div>
</div>
@endsection
