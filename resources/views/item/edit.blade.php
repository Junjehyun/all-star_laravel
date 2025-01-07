@extends('layouts.shop_common')
@section('title', '상품 편집')
@section('content')
    <div class="container w-1/2 mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">商品編集</h1>
        <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="category" class="block text-gray-700 font-semibold">カテゴリー</label>
                <select name="category" id="category" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="nike" {{ $item->category == 'nike' ? 'selected' : '' }}>NIKE</option>
                    <option value="adidas" {{ $item->category == 'adidas' ? 'selected' : '' }}>ADIDAS</option>
                    <option value="newBalance" {{ $item->category == 'newBalance' ? 'selected' : '' }}>NEW BALANCE</option>
                    <option value="others" {{ $item->category == 'others' ? 'selected' : '' }}>その他</option>
                    <option value="sale" {{ $item->category == 'sale' ? 'selected' : '' }}>割引商品</option>
                </select>
            </div>
            <div>
                <label for="name" class="block text-gray-700 font-semibold">商品名</label>
                <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="商品名を入力してください">
            </div>
            <!-- 가격, 사이즈 -->
            <div class="flex justify-between space-x-3">
                <div class="w-1/2">
                    <label for="price" class="block text-gray-700 font-semibold">価格</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $item->price) }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="円 0">
                </div>
                <div class="w-1/2">
                    <label for="size" class="block text-gray-700 font-semibold">サイズ</label>
                    <input type="text" name="size" id="size" value="{{ old('size', $item->size) }}" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="S, M, L, XL, XXL">
                </div>
            </div>
            <div>
                <label for="description" class="block text-gray-700 font-semibold">商品説明</label>
                <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="商品を説明してください">{{ old('description', $item->description) }}</textarea>
            </div>
            <div>
                <label for="image" class="block text-gray-700 font-semibold">画像アップロード</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @if ($item->image)
                    <p class="mt-2">現在の画像:</p>
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-48 h-48 object-cover mt-3 rounded border">
                @endif
            </div>
            <div class="text-center mt-5 space-x-2">
                <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded">保存</button>
                <a href="{{ route('item.index') }}" class="outline outline-rose-200 px-2 py-1 rounded">戻る</a>
            </div>
        </form>
    </div>
@endsection

