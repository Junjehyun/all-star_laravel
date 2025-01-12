@extends('layouts.shop_common')
@section('title', '購入ページ')
@section('content')
    <div class="container w-3/5 mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">購入確認</h1>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                <!-- 제품 이미지 -->
                <div class="w-full md:w-1/2 flex justify-center">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-3/4 md:w-full rounded-lg shadow-md">
                </div>
                <!-- 제품 정보 -->
                <div class="w-full md:w-1/2">
                    <h2 class="text-2xl font-semibold mb-4">{{ $item->name }}</h2>
                    <p class="text-lg text-gray-700 mb-4">価格: <strong class="text-xl text-blue-600">{{ number_format($item->price) }} 円</strong></p>
                    <form action="" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <!-- 사이즈 선택 -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">サイズ選択:</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach (range(220, 290, 5) as $size)
                                    <button type="button" class="sizeBtn px-2 py-1 border border-gray-300 rounded-lg hover:bg-blue-500 hover:text-white" data-value="{{ $size }}">
                                        {{ $size }}mm
                                    </button>
                                @endforeach
                            </div>
                            <input type="hidden" name="size" id="selectedSizePurchase">
                        </div>
                        <!-- 수량 선택과 버튼 배치 -->
                        <div class="w-3/5 mb-6">
                            <label for="quantity" class="block text-gray-700 font-semibold mb-2">数量選択:</label>
                            <div class="flex items-center space-x-2">
                                <!-- 수량 입력 -->
                                <input type="number" name="quantity" id="quantity" class="w-1/3 border border-gray-300 rounded-lg px-3 py-2 text-center" min="1" value="1">
                                <!-- 구매 버튼 -->
                                <button type="submit" class="w-1/3 outline outline-sky-200 py-1 rounded-lg">
                                    購入する
                                </button>
                                <!-- 돌아가기 버튼 -->
                                <a href="/item_index" class="w-1/3 text-center outline outline-rose-200 py-1 rounded-lg">
                                    戻る
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.sizeBtn');
            const selectedSizeInput = document.getElementById('selectedSizePurchase');
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
