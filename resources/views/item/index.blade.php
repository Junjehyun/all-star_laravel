@extends('layouts.shop_common')
@section('title', 'Shop Index')
@section('content')
    <h1 class="text-center text-xl font-bold mb-5 mt-5">ショッピングモール</h1>
    <div class="flex justify-end mb-4">
        <a href="{{ route('item.regIndex') }}">商品登録</a>
    </div>
    <div class="flex flex-row items-center justify-center space-x-4 mt-5">
        <a href="/item_top" class="text-center text-xl py-1 px-1 outline outline-gray-200 rounded-xl">TOP</a>
        <a href="#" class="text-center text-xl py-1 px-1 outline outline-gray-200 rounded-xl">BOTTOM</a>
        <a href="#" class="text-center text-xl py-1 px-1 outline outline-gray-200 rounded-xl">SHOES</a>
        <a href="#" class="text-center text-xl py-1 px-1 outline outline-gray-200 rounded-xl">ETC</a>
        <a href="#" class="text-center text-xl text-red-500 font-semibold hover:underline">SALE</a>
    </div>
    <div class="mt-10">
        <h1 class="text-center text-xl font-bold mb-6 underline">Best Seller</h1>
        <h2 class="text-center mt-60">나중에 여기는 멋진 상품 슬라이드 표시함</h2>
    </div>
@endsection
