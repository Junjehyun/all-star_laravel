@extends('layouts.shop_common')
@section('title', '購入確定')

@section('content')
    <div class="container w-3/5 mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">購入内容の確認</h1>
        <div class="bg-white rounded-lg p-8">
            <!-- 메인 레이아웃: 이미지 + 정보 컨테이너 -->
            <div class="flex gap-12 items-start">
                <!-- 제품 이미지 -->
                <div class="w-1/3 flex justify-center">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full rounded-lg shadow-md">
                </div>

                <!-- 제품 정보 및 사용자 정보 -->
                <div class="w-2/3 space-y-6">
                    <!-- 제품 정보 -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-semibold mb-4">商品情報</h2>
                        <p class="mb-2">商品名: <strong>{{ $item->name }}</strong></p>
                        <p class="mb-2">価格: <strong>{{ number_format($item->price) }} 円</strong></p>
                        <p class="mb-2">サイズ: <strong>{{ $validated['size'] }}</strong></p>
                        <p>数量: <strong>{{ $validated['quantity'] }}</strong></p>
                    </div>

                    <!-- 사용자 입력 정보 -->
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h2 class="text-xl font-semibold mb-4">注文者情報</h2>
                        <p class="mb-2">お名前: <strong>{{ $validated['customer_name'] }}</strong></p>
                        <p class="mb-2">メールアドレス: <strong>{{ $validated['customer_email'] }}</strong></p>
                        <p class="mb-2">電話番号: <strong>{{ $validated['customer_phone'] }}</strong></p>
                        <p class="text-sm">住所: <strong>{{ $validated['zipcode'] }} {{ $validated['city'] }} {{ $validated['detail_address'] }}</strong></p>
                    </div>
                    <!-- 버튼 -->
                    <div class="flex justify-end space-x-4">
                        <!-- 구매 버튼 -->
                        <form action="{{ route('purchase.checkout') }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $validated['item_id'] }}">
                            <input type="hidden" name="size" value="{{ $validated['size'] }}">
                            <input type="hidden" name="quantity" value="{{ $validated['quantity'] }}">
                            <input type="hidden" name="customer_name" value="{{ $validated['customer_name'] }}">
                            <input type="hidden" name="customer_email" value="{{ $validated['customer_email'] }}">
                            <input type="hidden" name="customer_phone" value="{{ $validated['customer_phone'] }}">
                            <input type="hidden" name="zipcode" value="{{ $validated['zipcode'] }}">
                            <input type="hidden" name="city" value="{{ $validated['city'] }}">
                            <input type="hidden" name="detail_address" value="{{ $validated['detail_address'] }}">
                            <button type="submit" class="w-full outline outline-sky-200 px-2 py-1 text-sm rounded-xl hover:bg-sky-400 hover:text-white">
                                購入する
                            </button>
                        </form>
                        <!-- 수정으로 돌아가기 버튼 -->
                        <form action="{{ route('purchase.index', ['item_id' => $validated['item_id']]) }}" method="GET" class="inline">
                            <input type="hidden" name="customer_name" value="{{ $validated['customer_name'] }}">
                            <input type="hidden" name="customer_email" value="{{ $validated['customer_email'] }}">
                            <input type="hidden" name="customer_phone" value="{{ $validated['customer_phone'] }}">
                            <input type="hidden" name="zipcode" value="{{ $validated['zipcode'] }}">
                            <input type="hidden" name="city" value="{{ $validated['city'] }}">
                            <input type="hidden" name="detail_address" value="{{ $validated['detail_address'] }}">
                            <input type="hidden" name="size" value="{{ $validated['size'] }}">
                            <input type="hidden" name="quantity" value="{{ $validated['quantity'] }}">
                            <button type="submit" class="w-full outline outline-rose-200 px-2 py-1 text-sm rounded-xl hover:bg-rose-400 hover:text-white">
                                修正に戻る
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
