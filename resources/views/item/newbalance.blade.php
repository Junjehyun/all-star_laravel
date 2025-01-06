@extends('layouts.shop_common')
@section('title', '상의')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6">SHOES(靴)</h1>
    <div class="flex justify-between items-center mb-4">
        <div>
            <label for="sort" class="text-gray-700">整列:</label>
            <select name="sort" id="sort" class="border border-gray-300 rounded px-3 py-1">
                <option value="popular">人気順</option>
                <option value="new">新商品順</option>
                <option value="price_low">低い価格順</option>
                <option value="price_high">高い価格順</option>
            </select>
        </div>
        <form action="" method="GET" class="flex items-center space-x-1">
            <input type="text" placeholder="検索" class="border border-gray-300 rounded-l px-3 py-1 w-64 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            <button type="submit" class="outline outline-gray-200 px-4 py-1">検索</button>
        </form>
    </div>
    <div class="grid grid-cols-4 gap-6">
        @forelse ($items as $item)
            <div class="border rounded-lg overflow-hidden shadow-md">
                <div class="flex justify-center">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'images/default-image.png' }}" alt="{{ $item->name }}" class="h-48 w-48 object-cover">
                </div><div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                    <p class="text-gray-700 mt-1">{{ number_format($item->price) }}円</p>
                    <div class="mt-3 flex justify-between items-center">
                        <a href="/item/detail/{{ $item->id }}" class="px-2 py-1 outline outline-gray-200 rounded-xl">詳細</a>
                        <div class="space-x-1">
                            <button onclick="addToCart({{ $item->id }})" class="px-3 py-1 outline outline-gray-200 rounded-xl">カート</button>
                            <button class="px-3 py-1 outline outline-gray-200 rounded-xl">購入</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center">
                <p class="text-gray-700">登録された商品がございません。</p>
            </div>
        @endforelse
    </div>
</div>
<script>
    function addToCart(itemId) {
        $.ajax({
            url: '/cart/add',
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {
                item_id: itemId,
            },
            success: function(response) {
                if (response.success) {
                    alert('商品がカートに追加されました。');
                } else {
                    alert ('カートに追加ができませんした。もう一度やり直してください。');
                }
            },
            error: function(xhr) {
                alert('エラーが発生しました。管理者にお問い合わせください。')
            }
        });
    }
</script>
@endsection
