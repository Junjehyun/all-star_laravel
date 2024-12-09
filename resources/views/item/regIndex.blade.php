@extends('layouts.common')
@section('title', '상품 등록')
@section('content')
<div class="container w-1/2 mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">상품 등록</h1>
    <form action="{{ route('item.reg') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <!-- 카테고리 -->
        <div>
            <label for="category" class="block text-gray-700 font-semibold">카테고리</label>
            <select name="category" id="category" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" selected>카테고리를 선택해주세요.</option>
                <option value="상의">상의</option>
                <option value="하의">하의</option>
                <option value="신발">신발</option>
                <option value="ETC">ETC</option>
                <option value="SALE">SALE</option>
            </select>
        </div>
        <!-- 상품명 -->
        <div>
            <label for="name" class="block text-gray-700 font-semibold">상품명</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="상품명을 입력하세요">
        </div>
        <!-- 가격, 사이즈 -->
        <div class="flex justify-between space-x-3">
            <div class="w-1/2">
                <label for="price" class="block text-gray-700 font-semibold">가격</label>
                <input type="number" name="price" id="price" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="₩ 0">
            </div>
            <div class="w-1/2">
                <label for="size" class="block text-gray-700 font-semibold">사이즈</label>
                <input type="text" name="size" id="size" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="S, M, L, XL, XXL">
            </div>
        </div>
        <!-- 설명 -->
        <div>
            <label for="description" class="block text-gray-700 font-semibold">설명</label>
            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="상품 설명을 입력하세요"></textarea>
        </div>
        <!-- 이미지 업로드 -->
        <div>
            <label for="image" class="block text-gray-700 font-semibold">이미지 업로드</label>
            <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <!-- 저장 버튼 -->
        <div class="text-center mt-5 space-x-2">
            <button type="submit" class="outline outline-blue-200 px-6 py-2 rounded">저장</button>
            <a href="/item_index" class="outline outline-rose-200 px-6 py-2 rounded">취소</a>
        </div>
    </form>
</div>
@endsection
