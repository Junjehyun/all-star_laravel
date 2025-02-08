@extends('layouts.shop_common')
@section('title', 'confirmation of purchase')
@section('content')
    <div class="container w-3/5 mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">CONFIRMATION OF PURCHASE</h1>
        <div class="bg-white shadow-lg rounded-lg p-8">
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                <!-- 제품 이미지 -->
                <div class="w-full md:w-1/2 flex justify-center">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-3/4 md:w-full rounded-lg">
                </div>
                <!-- 제품 정보 -->
                <div class="w-full md:w-1/2">
                    <h2 class="text-2xl font-semibold mb-4">{{ $item->name }}</h2>
                    <p class="text-lg text-gray-700 mb-4">PRICE: <strong class="text-xl text-blue-600">{{ number_format($item->price) }}円</strong></p>
                    <form action="{{ route('purchase.confirm') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                        <!-- 주문자 정보 -->
                        <h2 class="text-xl font-semibold mb-4">ORDERER INFO</h2>
                        <div class="space-y-4">
                            <div>
                                <label for="customer_name" class="block text-gray-700 font-semibold mb-2">NAME</label>
                                <input type="text" name="customer_name" id="customer_name" value="{{ $queryData['customer_name'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="ex) Suzuki Ichiro" required>
                            </div>
                            <div>
                                <label for="customer_email" class="block text-gray-700 font-semibold mb-2">E-MAIL</label>
                                <input type="email" name="customer_email" id="customer_email" value="{{ $queryData['customer_email'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="ex) example@example.com" required>
                            </div>
                            <div>
                                <label for="customer_phone" class="block text-gray-700 font-semibold mb-2">TELEPHONE</label>
                                <input type="tel" name="customer_phone" id="customer_phone" value="{{ $queryData['customer_phone'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="ex)090-1234-5678" required>
                            </div>
                            <div>
                                <label for="zipcode" class="block text-gray-700 font-semibold mb-2">POST NO.</label>
                                <!-- 좀 더 세분화 해서 입력 받을 수 있도록 수정 -->
                                <div class="flex space-x-2">
                                    <input type="text" name="zipcode" id="zipcode" value="{{ $queryData['zipcode'] ?? '' }}" class="w-4/5 border border-gray-300 rounded-lg px-3 py-2" placeholder="ex)Input without 1234567(-)" required>
                                    <button type="button" id="zipcodeSearch" class="w-1/5 bg-blue-500 text-white py-2 rounded-lg">SEARCH</button>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="city" class="block text-gray-700 font-semibold mb-2">STATE/CITY</label>
                                <input type="text" name="city" id="city" value="{{ $queryData['city'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="automatically reflected." readonly>
                            </div>
                            <div class="mt-4">
                                <label for="detail_address" class="block text-gray-700 font-semibold mb-2">DETAIL ADDRESS</label>
                                <textarea name="detail_address" id="detail_address" cols="3" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Please enter your address, building name, etc" required>{{ $queryData['detail_address'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <!-- 사이즈 선택 -->
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">SELECT SIZE</label>
                            <div class="flex flex-wrap gap-2">
                                <!-- 신규 사이즈 도입 -->
                                <button type="button"
                                        class="sizeBtn px-2 py-1 border border-gray-300 rounded-lg hover:bg-blue-500 hover:text-white
                                        {{ (isset($queryData['size']) && is_array($queryData['size']) && in_array('S', $queryData['size'])) ? 'bg-sky-500 text-white' : '' }}"
                                        data-value="S">
                                    S
                                </button>
                                <button type="button"
                                        class="sizeBtn px-2 py-1 border border-gray-300 rounded-lg hover:bg-blue-500 hover:text-white
                                        {{ (isset($queryData['size']) && is_array($queryData['size']) && in_array('M', $queryData['size'])) ? 'bg-sky-500 text-white' : '' }}"
                                        data-value="M">
                                    M
                                </button>
                                <button type="button"
                                        class="sizeBtn px-2 py-1 border border-gray-300 rounded-lg hover:bg-blue-500 hover:text-white
                                        {{ (isset($queryData['size']) && is_array($queryData['size']) && in_array('L', $queryData['size'])) ? 'bg-sky-500 text-white' : '' }}"
                                        data-value="L">
                                    L
                                </button>
                                <button type="button"
                                        class="sizeBtn px-2 py-1 border border-gray-300 rounded-lg hover:bg-blue-500 hover:text-white
                                        {{ (isset($queryData['size']) && is_array($queryData['size']) && in_array('XL', $queryData['size'])) ? 'bg-sky-500 text-white' : '' }}"
                                        data-value="XL">
                                    XL
                                </button>
                            </div>
                            <input type="hidden" name="size" id="selectedSizePurchase" value="{{ json_encode($queryData['size'] ?? []) }}">
                        </div>
                        <!-- 수량 선택과 버튼 배치 -->
                        <div class="w-3/5 mb-6">
                            <label for="quantity" class="block text-gray-700 font-semibold mb-2">QUANTITY SELECT</label>
                            <div class="flex items-center space-x-4">
                                <!-- 수량 입력 -->
                                <input type="number" name="quantity" id="quantity" value="{{ $queryData['quantity'] ?? '' }}"class="w-1/3 border border-gray-300 rounded-lg px-3 py-2 text-center" min="1" value="1">
                                    <button type="submit" class="w-1/3 outline outline-sky-200 py-1 rounded-lg">
                                        NEXT
                                    </button>
                                <!-- 돌아가기 버튼 -->
                                <a href="/item_index" class="w-1/3 text-center outline outline-rose-200 py-1 rounded-lg">
                                    RETURN
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

            let selectedSize = selectedSizeInput.value ? JSON.parse(selectedSizeInput.value) : [];

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

        // zipcode로 주소 검색
        document.getElementById('zipcodeSearch').addEventListener('click', async () => {
            const zipcode = document.getElementById('zipcode').value;
            const cityField = document.getElementById('city');

            if(!zipcode) {
                alert('Please enter your zip code.');
                return;
            }

            try {
                // 우편번호 API 호출
                const response = await fetch(`https://zipcloud.ibsnet.co.jp/api/search?zipcode=${zipcode}`);
                const data = await response.json();

                if (data.results) {
                    const result = data.results[0];
                    cityField.value = `${result.address1} ${result.address2} ${result.address3}`;
                } else {
                    alert('The address was not found.');
                }
            } catch (error) {
                alert('An error occurred while searching for an address.');
            }
        });
    </script>
@endsection
