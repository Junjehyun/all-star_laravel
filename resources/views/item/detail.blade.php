@extends('layouts.common')
@section('title', '상품 상세')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">{{ $item->name }}</h1>
    <div class="flex flex-col items-center">
        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('images/default-image.png') }}" alt="{{ $item->name }}" class="w-96 h-96 object-cover mb-6 border rounded-lg shadow-lg">
    </div>
    <div class="text-center space-y-4 mt-5">
        <p class="text-gray-700">가격: <span class="font-bold">₩{{ number_format($item->price) }}</span></p>
        <p class="text-gray-700">사이즈: <span class="font-bold">{{ $item->size }}</p>
        <p class="text-gray-700 text-lg">상품 설명</p>
        <p class="text-gray-600">{{ $item->description }}</p>
    </div>
    <div class="flex justify-center mt-8 space-x-3">
        <button class="px-6 py-2 outline outline-gray-200 rounded-xl">구매하기</button>
        <a href="{{ url()->previous() }}" class="px-6 py-2 outline outline-gray-200 rounded-xl">돌아가기</a>
    </div>
</div>
@endsection
