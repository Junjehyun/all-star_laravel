@extends('layouts.shop_common')
@section('title', '상품 등록')
@section('content')
<div class="container w-1/2 mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">商品登録</h1>
    <form action="{{ route('item.reg') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <!-- 카테고리 -->
        <div>
            <label for="category" class="block text-gray-700 font-semibold">カテゴリー</label>
            <select name="category" id="category" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" selected>カテゴリーを選択してください</option>
                <option value="nike">NIKE</option>
                <option value="adidas">ADIDAS</option>
                <option value="newBalance">NEW BALANCE</option>
                <option value="others">その他</option>
                <option value="sale">割引商品</option>
            </select>
        </div>
        <!-- 상품명 -->
        <div>
            <label for="name" class="block text-gray-700 font-semibold">商品名</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="商品名を入力してください">
        </div>
        <!-- 가격, 사이즈 -->
        <div class="flex justify-between space-x-3">
            <div class="w-1/2">
                <label for="price" class="block text-gray-700 font-semibold">価格</label>
                <input type="number" name="price" id="price" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="円 0">
            </div>
            <div class="w-1/2">
                <label for="size" class="block text-gray-700 font-semibold">サイズ</label>
                <select type="text" name="size" id="size" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="" selected>サイズ</option>
                    @for ($i = 220; $i <= 290; $i += 5)
                        <option value="{{ $i }}">{{ $i }} mm</option>
                    @endfor
                </select>

            </div>
        </div>
        <!-- 설명 -->
        <div>
            <label for="description" class="block text-gray-700 font-semibold">商品説明</label>
            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="商品を説明してください"></textarea>
        </div>
        <!-- 이미지 업로드 -->
        <div>
            <label for="image" class="block text-gray-700 font-semibold">画像アップロード</label>
            <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <!-- 저장 버튼 -->
        <div class="text-center mt-5 space-x-2">
            <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded">登録</button>
            <a href="/item_index" class="outline outline-rose-200 px-2 py-1 rounded">戻る</a>
        </div>
    </form>
</div>
@endsection
