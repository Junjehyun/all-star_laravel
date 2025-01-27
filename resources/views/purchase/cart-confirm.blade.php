@extends('layouts.shop_common')
@section('title', 'Cart Purchase Confirm')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">CONFIRM PURCHASE</h1>
        <h2 class="text-center text-gray-700 text-xl font-bold mb-6"><span class="text-sky-700">{{ $userName }}</span> ORDER ITEMS</h2>
        <div class="bg-white rounded-lg p-6 mx-auto max-w-2xl">
            <form action="{{ route('purchase.next-cart-confirm') }}" method="post">
                @csrf
                <div class="space-y-6">
                    @foreach ($carts as $cart)
                        <div class="flex justify-between border-b py-2">
                            <span class="flex-1 text-left">{{ $cart->item->name }}</span>
                            <span class="w-24 text-right">{{ number_format($cart->item->price) }}円</span>
                            <span class="w-24 text-center">x {{ $cart->quantity }}</span>  <!-- 수량 -->
                            <span class="w-32 text-right">{{ number_format($cart->item->price * $cart->quantity) }}円</span> <!-- 총합 -->
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 text-right">
                <p class="text-xl font-bold mb-10">
                    TOTAL: ₩{{ number_format($carts->sum(fn($cart) => $cart->item->price * $cart->quantity)) }}
                </p>
                    <h2 class="text-xl font-semibold mb-10 text-center">ORDERER INFO</h2>
                    <div class="container space-y-4">
                        <div class="flex flex-row space-x-3">
                            <div class="flex-1">
                                <label for="customer_name" class="block text-gray-700 text-xs text-left font-semibold mb-2">NAME</label>
                                <input type="text" name="customer_name" id="customer_name" value="{{ session ('customer_name', $queryData['customer_name'] ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-xs" placeholder="ex) Suzuki Ichiro" required>
                            </div>
                            <div class="flex-1">
                                <label for="customer_email" class="block text-gray-700 text-xs text-left font-semibold mb-2">E-MAIL</label>
                                <input type="email" name="customer_email" id="customer_email" value="{{ session ('customer_email', $queryData['customer_email'] ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-xs" placeholder="ex) example@example.com" required>
                            </div>
                        </div>
                        <div>
                            <label for="customer_phone" class="block text-gray-700 text-xs text-left font-semibold mb-2">TELEPHONE</label>
                            <input type="tel" name="customer_phone" id="customer_phone" value="{{ session ('customer_phone', $queryData['customer_phone'] ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-xs" placeholder="ex)090-1234-5678" required>
                        </div>
                        <div>
                            <label for="zipcode" class="block text-gray-700 font-semibold text-xs mb-2">POST NO.</label>
                            <!-- 좀 더 세분화 해서 입력 받을 수 있도록 수정 -->
                            <div class="flex space-x-2">
                                <input type="text" name="zipcode" id="zipcode" value="{{ session ('zipcode', $queryData['zipcode'] ?? '' ) }}" class="w-4/5 border border-gray-300 rounded-lg px-3 py-2" placeholder="ex)Input without 1234567(-)" required>
                                <button type="button" id="zipcodeSearch" class="w-1/5 bg-blue-500 text-white py-2 rounded-lg">SEARCH</button>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="city" class="block text-gray-700 font-semibold text-xs mb-2">STATE/CITY</label>
                            <input type="text" name="city" id="city" value="{{ session ('city', $queryData['city'] ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="automatically reflected." readonly>
                        </div>
                        <div class="mt-4">
                            <label for="detail_address" class="block text-gray-700 font-semibold text-xs mb-2">DETAIL ADDRESS</label>
                            <textarea name="detail_address" id="detail_address" ls="3" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Please enter your address, building name, etc" required>{{ session('detail_address', $queryData['detail_address'] ?? '') }}</textarea>
                        </div>
                    </div>
                    @foreach ($carts as $cart)
                        <input type="hidden" name="item_ids[]" value="{{ $cart->item->id }}">
                        <input type="hidden" name="quantities[]" value="{{ $cart->quantity }}">
                    @endforeach
                    <button type="submit" class="outline outline-sky-200 rounded-xl px-3 py-2 mt-5 inline-block">NEXT</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.sizeBtn');
            const selectedSizeInput = document.getElementById('selectedSizePurchase');
            let selectedSize = [];

            // buttons.forEach(button => {
            //     button.addEventListener('click', () => {
            //         const value = button.dataset.value;

            //         if (selectedSize.includes(value)) {
            //             // 이미 선택된 사이즈 -> 해제
            //             selectedSize = selectedSize.filter(size => size !== value);
            //             button.classList.remove('bg-blue-500', 'text-white');
            //         } else {
            //             // 새로운 사이즈 선택
            //             selectedSize.push(value);
            //             button.classList.add('bg-blue-500', 'text-white');
            //         }

            //         // 숨겨진 입력 필드에 선택된 값 업데이트
            //         selectedSizeInput.value = JSON.stringify(selectedSize);
            //     });
            // });

            // 우편번호로 주소 검색
            document.getElementById('zipcodeSearch').addEventListener('click', async () => {
                const zipcode = document.getElementById('zipcode').value;
                const cityField = document.getElementById('city');

                if (!zipcode) {
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
        });
    </script>
@endsection
