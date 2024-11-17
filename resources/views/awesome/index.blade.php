@extends('layouts.common')

@section('title', 'index page')

@section('content')
<div class="grid grid-cols-2 gap-10 px-24 mt-24">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full h-auto flex flex-col justify-between">
        <h1 class="text-center text-xl font-bold mb-6">Item</h1>
        <div class="flex flex-row items-center justify-center space-x-4 mt-5">
            <a href="#" class="text-center text-lg text-blue-500 hover:underline">상의</a>
            <a href="#" class="text-center text-lg text-blue-500 hover:underline">하의</a>
            <a href="#" class="text-center text-lg text-blue-500 hover:underline">아우터</a>
            <a href="#" class="text-center text-lg text-blue-500 hover:underline">신발</a>
            <a href="#" class="text-center text-lg text-blue-500 hover:underline">ETC</a>
            <a href="#" class="text-center text-lg text-red-500 font-semibold hover:underline">SALE</a>
        </div>
        <a href="">
            <h2 class="text-right text-sm mt-10">쇼핑몰로 이동</h2>
        </a>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
        <h1 class="text-center text-xl font-bold mb-6">공지사항</h1>
        <a href="">
            <h2 class="text-right text-sm mt-10">more</h2>
        </a>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
        <h1 class="text-center text-xl font-bold mb-6">환불&교환</h1>
        <a href="">
            <h2 class="text-right text-sm mt-10">more</h2>
        </a>
    </div>
    <div class="bg-white shadow-lg rounded-lg p-6 w-full h-64 flex flex-col justify-between">
        <h1 class="text-center text-xl font-bold mb-6">Q&A</h1>
        <a href="">
            <h2 class="text-right text-sm mt-10">more</h2>
        </a>
    </div>
</div>
@endsection
