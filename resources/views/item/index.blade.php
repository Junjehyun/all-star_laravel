@extends('layouts.common')
@section('title', 'Shop Index')
@section('content')
    <h1 class="text-center text-xl font-bold mb-6">쇼핑몰</h1>
    <a href="" class="flex justify-end">
        <button class="bg-blue-900 text-white py-1 px-1 rounded">상품등록</button>
    </a>
    <div class="flex flex-row items-center justify-center space-x-4 mt-5">
        <a href="#" class="text-center text-xl text-blue-500 hover:underline">상의</a>
        <a href="#" class="text-center text-xl text-blue-500 hover:underline">하의</a>
        <a href="#" class="text-center text-xl text-blue-500 hover:underline">아우터</a>
        <a href="#" class="text-center text-xl text-blue-500 hover:underline">신발</a>
        <a href="#" class="text-center text-xl text-blue-500 hover:underline">ETC</a>
        <a href="#" class="text-center text-xl text-red-500 font-semibold hover:underline">SALE</a>
    </div>
    <div class="mt-60">
        <h1 class="text-center text-xl font-bold mb-6">Best Seller</h1>
    </div>
@endsection
