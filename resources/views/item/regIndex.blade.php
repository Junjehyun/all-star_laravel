@extends('layouts.shop_common')
@section('title', '商品登録')
@section('content')
<div class="container w-1/2 mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">新規商品登録</h1>
    <form action="{{ route('item.reg') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <!-- 카테고리 -->
        <div>
            <label for="category" class="block text-gray-700 font-semibold">カテゴリー</label>
            <select name="category" id="category" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="" selected>カテゴリーを選んでください</option>
                <option value="nike">NIKE</option>
                <option value="adidas">ADIDAS</option>
                <option value="newBalance">NEW BALANCE</option>
                <option value="others">Others</option>
                <option value="sale">Sale Items</option>
            </select>
        </div>
        <!-- 상품명 -->
        <div>
            <label for="name" class="block text-gray-700 font-semibold">商品名</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Please enter a product name">
        </div>
        <!-- 가격, 사이즈 -->
        <div class="flex justify-between space-x-3">
            <div class="w-1/2">
                <label for="price" class="block text-gray-700 font-semibold">価格</label>
                <input type="number" name="price" id="price" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="円 0">
            </div>
            <!-- 사이즈 버튼화 -->
            <div class="w-1/2">
                <label for="size" class="block text-gray-700 font-semibold">サイズ</label>
                <div class="flex flex-wrap gap-2">
                    {{-- @for ($i = 220; $i <= 290; $i += 5)
                        <button type="button"
                                class="sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                data-value="{{ $i }}">
                            {{ $i }}mm
                        </button>
                    @endfor --}}
                    <!-- S 사이즈 버튼 -->
                    <button type="button"
                            class="sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            data-value="S">
                        S
                    </button>
                    <!-- M 사이즈 버튼 -->
                    <button type="button"
                            class="sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            data-value="M">
                        M
                    </button>
                    <!-- L 사이즈 버튼 -->
                    <button type="button"
                            class="sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            data-value="L">
                        L
                    </button>
                    <!-- XL 사이즈 버튼 -->
                    <button type="button"
                            class="sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            data-value="XL">
                        XL
                    </button>
                </div>
                <input type="hidden" name="size" id="selectedSize" required>
                <small class="text-gray-500">登録するサイズを選んでください</small>
            </div>
        </div>
        <!-- 설명 -->
        <div>
            <label for="description" class="block text-gray-700 font-semibold">商品詳細</label>
            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Please explain the product"></textarea>
        </div>
        <!-- 이미지 업로드 -->
        <div>
            <label for="image" class="block text-gray-700 font-semibold">画像アップロード</label>
            <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <!-- 저장 버튼 -->
        <div class="text-center mt-5 space-x-2">
            <button type="submit" class="px-2 py-1 underline underline-offset-4">登録</button>
            <a href="{{ route('kanri.dashboard') }}" class="px-2 py-1 underline underline-offset-4">戻る</a>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.sizeBtn');
        const selectedSizeInput = document.getElementById('selectedSize');
        let selectedSize = [];

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const value = button.dataset.value;

                if (selectedSize.includes(value)) {
                    // 이미 선택된 사이즈 -> 해제
                    selectedSize = selectedSize.filter(size => size !== value);
                    button.classList.remove('bg-blue-500', 'text-white');
                } else {
                    // 새로운 사이즈 선택
                    selectedSize.push(value);
                    button.classList.add('bg-blue-500', 'text-white');
                }

                // 숨겨진 입력 필드에 선택된 값 업데이트
                selectedSizeInput.value = JSON.stringify(selectedSize);
            });
        });
    });
</script>
@endsection
