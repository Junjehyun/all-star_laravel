@extends('layouts.shop_common')
@section('title', 'Edit Item')
@section('content')
    <div class="container w-1/2 mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">商品情報修正</h1>
        <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @php
                // 만약 $item->size 가 실제로 '["S","M"]' 같은 문자열이라면
                $decoded = is_array($item->size) ? $item->size : json_decode($item->size, true);
            @endphp
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
                    <button type="button"
                            @class([
                            "sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none",
                            "bg-blue-500 text-white" => in_array('S', (array) old('size', $decoded))
                            ])
                            data-value="S">
                        S
                    </button>
                    <!-- M 사이즈 버튼 -->
                    <button type="button"
                            @class([
                            "sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none",
                            "bg-blue-500 text-white" => in_array('M', (array) old('size', $decoded))
                            ])
                            data-value="M">
                        M
                    </button>
                    <!-- L 사이즈 버튼 -->
                    <button type="button"
                            @class([
                            "sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none",
                            "bg-blue-500 text-white" => in_array('L', (array) old('size', $decoded))
                            ])
                            data-value="L">
                        L
                    </button>
                    <!-- XL 사이즈 버튼 -->
                    <button type="button"
                            @class([
                            "sizeBtn px-3 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none",
                            "bg-blue-500 text-white" => in_array('XL', (array) old('size', $decoded))
                            ])
                            data-value="XL">
                        XL
                    </button>
                </div>
                {{-- <input type="text" name="size[]" id="selectedSize" value="{{ old('size', is_array($item->size) ? implode(',', $item->size) : $item->size) }}" required> --}}
                <div id="selectedSize"></div>
            </div>
            <div>
                <label for="stock" class="block text-gray-700 font-semibold">在庫状況</label>
                <div class="grid grid-cols-4 gap-4">
                    <div>
                        <label for="stock_s" class="block text-sm text-gray-600 mb-1">S</label>
                        <input type="number" name="stock_s" id="stock_s" value="{{ $item->stock_s }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0">
                    </div>
                    <div>
                        <label for="stock_m" class="block text-sm text-gray-600 mb-1">M</label>
                        <input type="number" name="stock_m" id="stock_m" value="{{ $item->stock_m }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0">
                    </div>
                    <div>
                        <label for="stock_l" class="block text-sm text-gray-600 mb-1">L</label>
                        <input type="number" name="stock_l" id="stock_l" value="{{ $item->stock_l }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0">
                    </div>
                    <div>
                        <label for="stock_xl" class="block text-sm text-gray-600 mb-1">XL</label>
                        <input type="number" name="stock_xl" id="stock_xl" value="{{ $item->stock_xl }}" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0">
                    </div>
                </div>
            </div>
            <div>
                <label for="description" class="block text-gray-700 font-semibold">商品詳細</label>
                <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="商品を説明してください">{{ old('description', $item->description) }}</textarea>
            </div>
            <div>
                <label for="image" class="block text-gray-700 font-semibold">画像アップロード</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @if ($item->image)
                    {{-- <p class="mt-2">current image</p> --}}
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-48 h-48 object-cover mt-3 rounded border">
                @endif
            </div>
            <div class="text-center mt-5 space-x-2">
                <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded">保存</button>
                <a href="{{ route('kanri.items') }}" class="outline outline-rose-200 px-2 py-1 rounded">戻る</a>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.sizeBtn');
            const selectedSizeDiv = document.getElementById('selectedSize');

            // 숨겨진 입력 필드 값이 있을 경우 배열로 처리
            //let selectedSize = selectedSizeInput.value ? selectedSizeInput.value.split(',') : [];

            // 기존 사이즈가 배열이라면 JSON으로 가져올 수 있음 (예: ["S","L"])
            let selectedSizes = @json($item->size ?? []);

            // 만약 DB에 "S,M"처럼 문자열이 들어있다면, 배열로 변환(필요시)
            if (typeof selectedSizes === 'string') {
                selectedSizes = selectedSizes.split(',');
            }

            // 페이지 로드 시, 기존 사이즈 각 값에 대해 hidden input 생성 & 버튼 색상 적용
            selectedSizes.forEach(value => {
                createHiddenInput(value);
                const btn = document.querySelector(`.sizeBtn[data-value="${value}"]`);
                if(btn) {
                    btn.classList.add('bg-blue-500', 'text-white');
                }
            });

            // 버튼 클릭 시 add/remove 로직
            buttons.forEach(btn => {
                btn.addEventListener('click', ()=> {
                    const value = btn.dataset.value;

                    if(selectedSizes.includes(value)) {
                        // 이미 선택 -> 해제
                        selectedSizes = selectedSizes.filter(v => v !== value);
                        removeHiddenInput(value);
                        btn.classList.remove('bg-blue-500', 'text-white');
                    } else {
                        // 새로 선택
                        selectedSizes.push(value);
                        createHiddenInput(value);
                        btn.classList.add('bg-blue-500', 'text-white');
                    }
                });
            });

            function createHiddenInput(val) {
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'size[]'; // 배열 전송
                hidden.value = val;
                selectedSizeDiv.appendChild(hidden);
            }

            function removeHiddenInput(val) {
                const input = selectedSizeDiv.querySelector(`input[value="${val}"]`);
                if(input) {
                    selectedSizeDiv.removeChild(input);
                }
            }
        });

        // buttons.forEach(button => {
        //         button.addEventListener('click', () => {
        //             const value = button.dataset.value;
        //             if (selectedSize.includes(value)) {
        //                 // 이미 선택된 사이즈 -> 해제
        //                 selectedSize = selectedSize.filter(size => size !== value);
        //                 button.classList.remove('bg-blue-500', 'text-white');
        //             } else {
        //                 // 새로운 사이즈 선택
        //                 selectedSize.push(value);
        //                 button.classList.add('bg-blue-500', 'text-white');
        //             }

        //             // 숨겨진 입력 필드에 선택된 값 배열 업데이트
        //             selectedSizeInput.value = selectedSize.join(',');
        //         });
        //     });
        // });
    </script>
@endsection

