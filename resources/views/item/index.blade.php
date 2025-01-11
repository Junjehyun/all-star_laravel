@extends('layouts.shop_common')
@section('title', 'Shop Index')
@section('content')
    <div class="flex justify-end mb-4 space-x-5">
        <a href="{{ route('item.regIndex') }}">商品登録</a>
        <a href="/main_index">MAIN</a>
    </div>
    <div class="flex flex-row items-center justify-center space-x-2 mt-5">
        <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="ALL">・ ALL</a>
        <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="nike">・ Nike</a>
        <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="adidas">・ Adidas</a>
        <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="newbalance">・ New Balance</a>
        <a href="javascript:void(0)" class="text-center text-sm py-1 px-1 rounded-xl category-btn" data-category="others">・ Others</a>
        <a href="javascript:void(0)" class="text-center text-sm text-red-500 font-semibold category-btn" data-category="sale">・ SALE</a>
        <div class="flex justify-items-end my-4">
            <form action="{{ route('item.search') }}" method="GET" class="flex items-center space-x-1 ml-52">
                <!-- focus 파란색깔 안없어짐 작업해야함 -->
                <input type="text" name="keyword" placeholder="商品検索" class="px-3 py-2 border border-sky-100 rounded-md w-64" value="{{ old('keyword', $keyword ?? '') }}">
                <button type="submit" class="px-3 py-2 outline outline-sky-100 hover:bg-sky-200 hover:text-white rounded-xl">検索</button>
            </form>
        </div>
    </div>
    <div class="flex flex-row items-center justify-center space-x-5 mt-5">
        <div class="grid grid-cols-3 gap-5">
        @forelse ($items as $item)
            <div class="border rounded-lg overflow-hidden">
                <div class="flex justify-center">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'images/default-image.png' }}" alt="{{ $item->name }}" class="h-48 w-48 object-cover">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                    <p class="text-gray-700 mt-1">{{ number_format($item->price) }}円</p>
                    <div class="mt-3 flex justify-between items-center">
                        <a href="/item/detail/{{ $item->id }}" class="px-2 py-1 outline outline-lime-100 hover:bg-lime-200 hover:text-white rounded-xl">詳細</a>
                        <div class="space-x-2">
                            <button  onclick="addToCart('{{ $item->id }}')" class="px-3 py-1 outline outline-amber-100 hover:bg-amber-200 hover:text-white rounded-xl">カート</button>
                            {{-- <a href="{{ route('checkout', $item->id) }}"> --}}
                            <a href="{{ route('purchase.index', ['item_id' => $item->id]) }}">
                                <button class="px-3 py-1 outline outline-red-100 hover:bg-red-200 hover:text-white rounded-xl">購入</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center text-xl mt-10">
                @if (!empty($keyword))
                    <p class="text-gray-700">検索結果がございません。</p>
                @else
                    <p class="text-gray-700">登録された商品がございません。</p>
                @endif
            </div>
        @endforelse
    </div>
    <script>
        $(document).ready(function () {
            $('.category-btn').on('click', function () {
                const category = $(this).data('category');
                console.log(category);
                $.ajax({
                    url: `/item/ajax_category/${category}`,
                    type: 'GET',
                    success: function (data) {
                        renderItems(data);
                    },
                    error: function () {
                        alert('エラーが発生しました。もう一度やり直してください!');
                    }
                });
            });
            function renderItems(items) {
                const container = $('.grid');
                container.empty();
                if (items.length > 0) {
                    items.forEach(item => {
                        const itemHtml = `
                            <div class="border rounded-lg overflow-hidden">
                                <div class="flex justify-center">
                                    <img src="${item.image ? `/storage/${item.image}` : 'images/default-image.png'}" alt="${item.name}" class="h-48 w-48 object-cover">
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold">${item.name}</h3>
                                    <p class="text-gray-700 mt-1">{{ number_format($item->price) }}円</p>
                                    <div class="mt-3 flex justify-between items-center">
                                        <a href="/item/detail/${item.id}" class="px-2 py-1 outline outline-lime-100 hover:bg-lime-200 hover:text-white rounded-xl">詳細</a>
                                        <div class="space-x-1">
                                            <button onclick="addToCart(${item.id})" class="px-3 py-1 outline outline-amber-100 hover:bg-amber-200 hover:text-white rounded-xl">カート</button>
                                            <button class="px-3 py-1 outline outline-red-100 hover:bg-red-200 hover:text-white rounded-xl">購入</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        container.append(itemHtml);
                    });
                } else {
                    container.append('<div class="col-span-4 text-center text-xl mt-10"><p class="text-gray-700">登録された商品がございません。</p></div>');
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
                        alert('商品がカートに追加されました。');
                    } else {
                        alert('追加に失敗しました。もう一度やり直してください。');
                    }
                },
                error: function(xhr) {
                    alert('エラーが発生しました。もう一度やり直してください。');
                }
            });
        }
    </script>
@endsection
