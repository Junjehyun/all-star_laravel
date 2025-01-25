@extends('layouts.shop_common')
@section('title', 'Cart')
@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">CART</h1>
        @if ($carts->isEmpty())
            <p class="text-center text-xl text-gray-500 font-semibold mt-10">The cart is empty. Let's go shopping right now!</p>
        @else
        <form action="{{ route('purchase.selected') }}" method="POST" id="checkout-form">
            @csrf
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border-b py-2">SELECT</th>
                        <th class="border-b py-2">ITEM NAME</th>
                        <th class="border-b py-2">PRICE</th>
                        <th class="border-b py-2">QUANTITY</th>
                        <th class="border-b py-2">TOTAL PRICE</th>
                        <th class="border-b py-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr class="text-center">
                            <td class="border-b py-2">
                                <input type="checkbox" name="selected_item[]" value="{{ $cart->item_id }}" class="cart-checkbox">
                            </td>
                            <td class="flex justify-center items-center border-b py-2">
                                <img src="{{ $cart->item->image ? asset('storage/' . $cart->item->image) : '/images/default-image.png' }}" alt="{{ $cart->item->name }}" class="h-16 w-16 object-cover rounded-lg">{{ $cart->item->name }}
                            </td>
                            <td class="border-b py-2 item-price" data-price="{{ $cart->item->price }}">{{ number_format($cart->item->price) }}円</td>
                            <td class="border-b py-2">
                                <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="number" name="quantities[]" value="{{ $cart->quantity }}" class="w-16 text-center border item-quantity">
                                    <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded ml-2">EDIT</button>
                                </form>
                            </td>
                            <td class="border-b py-2">{{ number_format($cart->item->price * $cart->quantity) }}円</td>
                            <td class="border-b py-2">
                                <form action="{{ route('cart.delete', $cart->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="outline outline-gray-200 px-2 py-1 rounded">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-6 text-right">
                <p class="text-xl font-bold total-price">TOTAL: 0円</p>
                    <input type="hidden" name="selected_item[]" id="selected_item_ids"> <!-- 선택된 상품들의 ID를 저장할 필드 -->
                    <button type="submit" class="outline outline-gray-200 rounded-xl px-3 py-2 mt-5 inline-block">Proceed to Checkout</button>
                <a href="/item_index" class="outline outline-gray-200 rounded-xl px-3 py-2 mt-5 inline-block">RETURN</a>
            </div>
        </form>
        @endif
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('.cart-checkbox'); // 체크박스 요소
            const totalElement = document.querySelector('.total-price'); // total 금액 요소
            const selectedItemIdsInput = document.getElementById('selected_item_ids'); // 선택된 상품 ID를 저장할 input
            let totalPrice = 0;

            // 체크박스를 클릭할 때마다 총합을 갱신
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotal);
            });

            // 총합을 갱신하는 함수
            function updateTotal() {
                totalPrice = 0; // 총합 초기화

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const row = checkbox.closest('tr'); // 해당 체크박스의 행 찾기
                        const price = parseInt(row.querySelector('.item-price').dataset.price); // 상품 가격
                        const quantity = parseInt(row.querySelector('.item-quantity').value); // 상품 수량
                        totalPrice += price * quantity; // 총합 계산
                    }
                });

                // 총합을 표시
                totalElement.textContent = `TOTAL: ${totalPrice.toLocaleString()}円`;
            }

            // 폼 제출 시 선택된 상품 ID들을 저장
            const form = document.querySelector('form'); // 결제 폼
            form.addEventListener('submit', function(event) {
                const selectedIds = [];
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        selectedIds.push(checkbox.value); // 선택된 상품의 ID를 배열에 추가
                    }
                });
                // 선택된 상품 ID들을 `selected_item_ids`에 할당
                selectedItemIdsInput.value = selectedIds.join(','); // 배열을 문자열로 변환하여 저장
            });
        });
    </script>
@endsection
