@extends('layouts.common')
@section('title', '상의')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">상의</h1>
    <div class="flex justify-between items-center mb-4">
        <div>
            <label for="sort" class="text-gray-700">정렬:</label>
            <select name="sort" id="sort" class="border border-gray-300 rounded px-3 py-1">
                <option value="popular">인기순</option>
                <option value="new">신상품순</option>
                <option value="price_low">낮은 가격순</option>
                <option value="price_high">높은 가격순</option>
            </select>
        </div>
        <form action="" method="GET" class="flex items-center space-x-1">
            <input type="text" placeholder="검색" class="border border-gray-300 rounded-l px-3 py-1 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <button type="submit" class="outline outline-gray-200 px-4 py-1">검색</button>
        </form>
    </div>
    <div class="grid grid-cols-4 gap-6">
        @forelse ($items as $item)
            <div class="border rounded-lg overflow-hidden shadow-md">
                <div class="flex justify-center">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'images/default-image.png' }}" alt="{{ $item->name }}" class="h-48 w-48 object-cover">
                </div><div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                    <p class="text-gray-700 mt-1">{{ number_format($item->price) }}₩</p>
                    <div class="mt-3 flex justify-between items-center">
                        <a href="/item/detail/{{ $item->id }}" class="px-2 py-1 outline outline-gray-200 rounded-xl">상세보기</a>
                        <div class="space-x-1">
                            <button class="px-3 py-1 outline outline-gray-200 rounded-xl">장바구니</button>
                            <button class="px-3 py-1 outline outline-gray-200 rounded-xl">구매</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center">
                <p class="text-gray-700">등록된 상품이 없습니다.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
