@extends('layouts.shop_common')
@section('title', 'Shop Index')
@section('content')
    <div class="flex justify-end mb-4 space-x-5">
        @auth
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('item.regIndex') }}" class="outline outline-gray-300 rounded-xl text-sm px-2">Item Regist</a>
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
                <input type="text" name="keyword" placeholder="Search Item!" class="px-3 py-2 border border-sky-100 rounded-md w-64" value="{{ old('keyword', $keyword ?? '') }}">
                <button type="submit" class="px-3 py-2 outline outline-sky-100 hover:bg-sky-200 hover:text-white rounded-xl">FIND</button>
            </form>
        </div>
    </div>
    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-3 gap-5">
        @forelse ($items as $item)
            <div class="border rounded-lg overflow-hidden">
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
                            <button  onclick="addToCart('{{ $item->id }}')" class="px-3 py-1 outline outline-amber-100 hover:bg-amber-200 hover:text-white rounded-xl">CART</button>
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

                            <div class="border rounded-lg overflow-hidden">
                                <div class="flex justify-center">
                                    <img src="${item.image ? `/storage/${item.image}` : 'images/default-image.png'}" alt="${item.name}" class="h-56 w-56 object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-md font-semibold">${item.name}</h3>
                                    <p class="text-gray-700 mt-1">${formattedPrice}円</p>
                                    <div class="mt-3 flex justify-between items-center">
                                        <a href="/item/detail/${item.id}" class="px-2 py-1 outline outline-lime-100 hover:bg-lime-200 hover:text-white rounded-xl">DETAIL</a>
                                        <div class="flex justify-between space-x-3">
                                            <div class="mt-1 mr-3" id="like-button-{{ $item->id }}" onclick="likeItem({{ $item->id }})">
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
        function addToCart(itemId) {
            $.ajax({
                url: '/cart/add',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    item_id: itemId
                },
                success: function(response) {
                    if (response.success) {
                        updateCartCount();
                        alert('The item has been added to your cart.');
                    } else {
                        alert('Failed to add. Please try again.');
                    }
                },
                error: function(xhr) {
                    alert('An error has occurred. Please try again.');
                }
            });
        }
    </script>
@endsection
