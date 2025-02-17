@extends('layouts.shop_common')
@section('title', 'Order Tracking')
@section('content')
    <div class="container w-full justify-center mx-auto">
        <h1 class="text-center text-2xl font-bold mt-10">配送状況</h1>
        <p class="text-center mt-10">
            <span class="{{ $shipping_status == 'pay-confirm' ? 'font-bold text-green-500 text-2xl' : '' }}">
                @if($shipping_status == 'pay-confirm')
                    <i class="fa-solid fa-check"></i>
                @endif
                決済完了
            </span> &rarr;
            <span class="{{ $shipping_status == 'prepare' ? 'font-bold text-green-500 text-2xl' : '' }}">
                @if($shipping_status == 'prepare')
                    <i class="fa-solid fa-check"></i>
                @endif
                商品準備中
            </span> &rarr;
            <span class="{{ $shipping_status == 'delivery' ? 'font-bold text-green-500 text-2xl' : '' }}">
                @if($shipping_status == 'delivery')
                    <i class="fa-solid fa-check"></i>
                @endif
                配送中
            </span> &rarr;
            <span class="{{ $shipping_status == 'complete' ? 'font-bold text-green-500 text-2xl' : '' }}">
                @if($shipping_status == 'complete')
                    <i class="fa-solid fa-check"></i>
                @endif
                配送完了
            </span>
        </p>
    </div>
    <div class="w-[60%] flex justify-between items-stretch mt-20 mx-auto space-x-5">
        <div class="w-1/2 border rounded-xl py-5">
            <!-- 상품 정보 테이블 -->
            <h2 class="text-2xl font-semibold text-center mt-2 mb-10">注文詳細</h2>
            <table class="flex justify-center">
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">注文ID</td>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">商品名</td>
                        <td>{{ $order->item->name }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">数量</td>
                        <td>{{ $order->quantity }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">サイズ</td>
                        <td>{{ $order->purchased_size }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">決済方式</td>
                        <td>{{ $order->payment_type }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">総計</td>
                        <td>¥{{ number_format($order->amount) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-1/2 border rounded-xl py-5">
            <!-- 주문고객 정보 테이블 -->
            <h2 class="text-2xl font-semibold text-center mt-2 mb-10">お客様の情報</h2>
            <table class="flex justify-center">
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">氏名</td>
                        <td>{{ $order->customer_name }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">電話番号</td>
                        <td>{{ $order->customer_phone }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">メールアドレス</td>
                        <td>{{ $order->customer_email }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold text-left">発送住所</td>
                        <td>{{ $order->customer_address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="w-full flex justify-center mt-20 mx-auto">
        @auth
            @if(Auth::user()->role === 'admin')
                <form action="{{ route('update.shipping.status', $order->id) }}" method="POST">
                    @csrf
                    <label for="shipping_status">配送状況変更</label>
                    <select name="shipping_status" id="shipping_status">
                        <option value="pay-confirm" {{ $order->shipping_status == 'pay-confirm' ? 'selected' : '' }}>決済完了</option>
                        <option value="prepare" {{ $order->shipping_status == 'prepare' ? 'selected' : '' }}>商品準備中</option>
                        <option value="delivery" {{ $order->shipping_status == 'delivery' ? 'selected' : '' }}>配送中</option>
                        <option value="complete" {{ $order->shipping_status == 'complete' ? 'selected' : '' }}>配送完了</option>
                    </select>
                    <button type="submit" class="outline outline-gray-200 py-2 px-2 rounded-xl">変更</button>
                </form>
            @endif
        @endauth
    </div>
@endsection
