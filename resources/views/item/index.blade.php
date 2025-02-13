@extends('layouts.shop_common')
@section('title', 'Shop Index')
@section('content')
    <div class="flex justify-end mt-4 space-x-5">
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('item.regIndex') }}" class="underline underline-offset-4 rounded-xl text-sm px-2">Item Regist</a>
            @endif
        @endauth
    </div>
    <div class="flex flex-row items-center justify-center space-x-2 mt-5">
            <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="ALL">・ ALL({{ $categoryCounts['ALL'] }})</a>
            <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="nike">・ Nike({{ $categoryCounts['nike'] }})</a>
            <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="adidas">・ Adidas({{ $categoryCounts['adidas'] }})</a>
            <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="newbalance">・ New Balance({{ $categoryCounts['newbalance'] }})</a>
            <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="others">・ Others({{ $categoryCounts['others'] }})</a>
            <a href="javascript:void(0)" class="text-center text-sm text-red-500 font-semibold category-btn" data-category="sale">・ SALE({{ $categoryCounts['sale'] }})</a>
        <div class="flex justify-items-end my-4">
            <form action="{{ route('item.search') }}" method="GET" class="flex items-center space-x-1 ml-52">
                <input type="text" name="keyword" placeholder="Search Item!" class="px-3 py-2 border border-gray-800 rounded-md w-64" value="{{ old('keyword', $keyword ?? '') }}">
                <button type="submit" class="px-3 py-2 underline underline-offset-2 hover:bg-gray-700 hover:text-white rounded-xl">FIND</button>
            </form>
        </div>
    </div>
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-3 gap-10">
        @forelse ($items as $item)
            <div class="overflow-hidden transition-transform hover:scale-105 hover:shadow-lg">
                <div class="flex justify-center">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'images/default-image.png' }}" alt="{{ $item->name }}" class="h-56 w-56 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-md font-semibold">{{ $item->name }}</h3>
                    <p class="text-gray-700 mt-1">{{ number_format($item->price) }}円</p>
                    <div class="mt-3 flex justify-between items-center">
                        <a href="/item/detail/{{ $item->id }}" class="px-2 py-1 outline outline-lime-100 hover:bg-lime-200 hover:text-white rounded-xl">DETAIL</a>
                        <div class="flex justify-between space-x-3">
                            <div class="mt-1 mr-3" id="like-button-{{ $item->id }}" onclick="likeItem({{ $item->id }})">
                                <i class="fa-sharp fa-solid fa-heart fa-beat" style="color: red;"></i>
                                {{ $item->like }}
                            </div>
                            {{-- <button onclick="addToCart('{{ $item->id }}')" class="px-3 py-1 outline outline-amber-100 hover:bg-amber-200 hover:text-white rounded-xl">CART</button> --}}
                            <button onclick="openModal('{{ $item->id }}')">CART</button>
                            <a href="{{ route('purchase.index', ['item_id' => $item->id]) }}">
                                <button class="px-3 py-1 outline outline-red-100 hover:bg-red-200 hover:text-white rounded-xl">BUY</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center text-xl mt-10">
                @if (!empty($keyword))
                    <p class="text-gray-700">There are no search results.</p>
                @else
                    <p class="text-gray-700">There are no registered items.</p>
                @endif
            </div>
        @endforelse
    </div>
    <div id="to-top">
        <div class="material-icons">arrow_upward</div>
    </div>
    <!-- size selecte modal -->
    <div id="sizeModal" class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-70">
        <div class="bg-white p-6 rounded-lg shadow-lg w-[20%]">
            <h2 class="text-xl font-semibold flex justify-center mb-4">SELECT SIZE</h2>
            <div class="flex justify-center space-x-3 mb-4">
                <button class="size-option px-4 py-2 border border-gray-300 rounded-md" data-size="S">S</button>
                <button class="size-option px-4 py-2 border border-gray-300 rounded-md" data-size="M">M</button>
                <button class="size-option px-4 py-2 border border-gray-300 rounded-md" data-size="L">L</button>
                <button class="size-option px-4 py-2 border border-gray-300 rounded-md" data-size="XL">XL</button>
            </div>
            <div class="flex justify-center space-x-3 mt-5">
                <button id="closeModal" class="px-4 py-2 bg-gray-200 rounded-md">CANCEL</button>
                <button id="confirmSize" class="px-4 py-2 bg-sky-500 text-white rounded-md">CONRIFM</button>
            </div>
        </div>
    </div>
    <script>
        const initialKeyword = "{{ $keyword ?? '' }}"; // 서버에서 키워드 전달

        $(document).ready(function () {
            $('.category-btn').on('click', function () {
                const category = $(this).data('category');
                console.log(category);
                $.ajax({
                    url: `/item/ajax_category/${category}`,
                    type: 'GET',
                    success: function (data) {
                        //console.log(data);
                        renderItems(data);
                    },
                    error: function () {
                        alert('An error has occurred. Please try again!');
                    }
                });
            });

            function renderItems(items) {
                const container = $('.grid');
                container.empty();

                if (Array.isArray(items) && items.length > 0) {
                    items.forEach(item => {
                        const formattedPrice = Number(item.price).toLocaleString();
                        const itemHtml = `

                            <div class="overflow-hidden transition-transform hover:scale-105 hover:shadow-lg">
                                <div class="flex justify-center">
                                    <img src="${item.image ? `/storage/${item.image}` : 'images/default-image.png'}" alt="${item.name}" class="h-56 w-56 object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-md font-semibold">${item.name}</h3>
                                    <p class="text-gray-700 mt-1">${formattedPrice}円</p>
                                    <div class="mt-3 flex justify-between items-center">
                                        <a href="/item/detail/${item.id}" class="px-2 py-1 outline outline-lime-100 hover:bg-lime-200 hover:text-white rounded-xl">DETAIL</a>
                                        <div class="flex justify-between space-x-3">
                                            <div class="mt-1 mr-3" id="like-button-${item.id}" onclick="likeItem(${item.id})">
                                                <i class="fa-sharp fa-solid fa-heart fa-beat" style="color: red;"></i>
                                                ${item.like}
                                            </div>
                                            <button onclick="addToCart(${item.id})" class="px-3 py-1 outline outline-amber-100 hover:bg-amber-200 hover:text-white rounded-xl">CART</button>
                                            <button class="px-3 py-1 outline outline-red-100 hover:bg-red-200 hover:text-white rounded-xl">BUY</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        `;
                        container.append(itemHtml);
                    });
                } else {
                    container.append('<div class="col-span-4 text-center text-xl mt-10"><p class="text-gray-700">There are no registered items.</p></div>');
                }
            }
        });
        let globalItemId = null;

        function openModal(itemId) {
            globalItemId = itemId;
            document.getElementById('sizeModal').style.display = 'flex';
        }

        // 상품을 카트에 추가
        function addToCart(itemId, size) {
            //const selectedSize = document.querySelector('.size-option.selected');
            //const size = selectedSize.dataset.size; // 선택된 사이즈 값 취득

            // cart 담을때 모달창 띄우기
            // if (!selectedSize) {
            //     document.getElementById('sizeModal').style.display = 'flex';
            //     //alert('Please select a size');
            //     return; // 사이즈 선택되지 않으면 추가 진행 안함
            // }
            if (!size) {
                document.getElementById('sizeModal').style.display = 'flex';
                return;
            }

            $.ajax({
                url: '/cart/add',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    item_id: itemId,
                    size: size // 사이즈 추가
                },
                success: function(response) {
                    if (response.success) {
                        updateCartCount();
                        alert('The item has been added to your cart.');
                        closeModal();
                    } else {
                        alert('Failed to add. Please try again.');
                    }
                },
                error: function(xhr) {
                    alert('An error has occurred. Please try again.');
                }
            });
        }

        // 사이즈 버튼 클릭 시 'selected' 클래스를 추가하여 선택된 사이즈 표시
        document.querySelectorAll('.size-option').forEach(button => {
            button.addEventListener('click', function() {
                // 이미 선택된 버튼을 클릭했을 경우 선택을 해제
                if (this.classList.contains('bg-sky-500')) {
                    this.classList.remove('bg-sky-500', 'text-white', 'selected'); // 선택 해제
                } else {
                    // 모든 버튼에서 'selected', 'bg-blue-500', 'text-white' 클래스를 제거
                    document.querySelectorAll('.size-option').forEach(btn => {
                        btn.classList.remove('bg-sky-500', 'text-white', 'selected');
                    });

                    // 현재 버튼에 'selected', 'bg-blue-500', 'text-white' 클래스를 추가
                    this.classList.add('bg-sky-500', 'text-white', 'selected');
                }
            });
        });

        // 모달을 닫는 함수
        function closeModal() {
            document.getElementById('sizeModal').style.display = 'none'; // 모달 숨기기
        }

        document.getElementById('closeModal').addEventListener('click', closeModal);

        document.getElementById('confirmSize').addEventListener('click', function () {
            console.log('CONFIRM 버튼 클릭 이벤트 호출됨.');
            // 선택된 사이즈 찾기
            const selectedSize = document.querySelector('.size-option.selected');
            console.log('선택된 사이즈 요소:', selectedSize);

            if (!selectedSize) {
                console.log('사이즈가 선택되지 않아, 함수 종료');
                return;
            }

            const size = selectedSize.dataset.size;
            console.log('선택된 사이즈:', size);
            console.log('itemId:', globalItemId);

            // addToCart함수 호출
            console.log('addToCart 호출 직전');
            addToCart(globalItemId, size); // size와 itemId를 전달하여 장바구니로 추가
            console.log('addToCart 호출 직후');

            closeModal();
            console.log('closeModal 호출 직후');
        });

        //const badgeEl = document.querySelector('.badge');
        const toTopEl = document.querySelector('#to-top');

        window.addEventListener('scroll', _.throttle(function () {
            console.log(window.scrollY);

            if (window,scrollY > 500) {
                // 버튼 보이기!
                gsap.to(toTopEl, 0.2, {
                    x: 0
                });
            } else {
                // 버튼 숨기기!
                gsap.to(toTopEl, 0.2, {
                    x: 100
                });
            }

        }, 300));

        // _.throttle(함수, 시간)
        toTopEl.addEventListener('click', function () {
            gsap.to(window, .7, {
                scrollTo: 0
            });
        });
    </script>
@endsection
