@extends('layouts.common')
@section('title', 'Shop Index')
@section('content')
    <h1 class="text-center text-xl font-bold mb-6">쇼핑몰</h1>
    <div class="flex justify-end mb-4">
        <a href="{{ route('item.regIndex') }}">
            상품등록
        </a>
    </div>
    <div class="flex flex-row items-center justify-center space-x-4 mt-5">
        <a href="/item_top" class="text-center text-xl text-blue-500 hover:underline">상의</a>
        <a href="#" class="text-center text-xl text-blue-500 hover:underline">하의</a>
        <a href="#" class="text-center text-xl text-blue-500 hover:underline">신발</a>
        <a href="#" class="text-center text-xl text-blue-500 hover:underline">ETC</a>
        <a href="#" class="text-center text-xl text-red-500 font-semibold hover:underline">SALE</a>
    </div>
    <div class="mt-60">
        <h1 class="text-center text-xl font-bold mb-6">Best Seller</h1>
        <h2 class="text-center mt-60">나중에 여기는 멋진 상품 슬라이드 표시함</h2>
    </div>
@endsection
