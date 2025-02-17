@extends('layouts.shop_common')
@section('title', 'Order Completed')
@section('content')
    <div class="container w-1/2 mx-auto mt-10">
        <h1 class="text-3xl text-center font-bold text-green-500">ご注文ありがとうございます。</h1>
        <p class="text-lg mt-4 text-center">決済が完了しました。発送までしばらくお待ちください。</p><br>

        <div class="rounded-lg p-6 bg-white shadow-md">
            <h2 class="text-2xl font-semibold mt-4 text-center">ご注文詳細</h2>
            <div class="mt-6">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">注文ID</th>
                            <th class="py-2 px-4 border-b">商品名</th>
                            <th class="py-2 px-4 border-b">数量</th>
                            <th class="py-2 px-4 border-b">サイズ</th>
                            <th class="py-2 px-4 border-b">総計 (¥)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="mt-5">
                                <td class="py-2 px-4 border-b text-center">{{ $order->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->item->name }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $order->quantity }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $order->purchased_size }}</td>
                                <td class="py-2 px-4 border-b text-right">{{ number_format($order->amount) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="py-4 px-4 text-right font-bold">総計:</td>
                            <td class="py-2 px-4 text-right font-bold">¥{{ number_format($orders->sum('amount')) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-6">
                <h3 class="text-xl font-semibold mb-3">お客様のご注文情報</h3>
                <p><strong>氏名:</strong> {{ $orders[0]->customer_name }}</p>
                <p><strong>電話番号:</strong> {{ $orders[0]->customer_phone }}</p>
                <p><strong>メールアドレス:</strong> {{ $orders[0]->customer_email }}</p>
                <p><strong>発送住所:</strong> {{ $orders[0]->customer_address }}</p>
            </div>
            <p class="text-center mt-4 text-green-500">商品が発送され次第、お知らせします。</p>
            <div class="flex justify-end mt-6">
                <a href="{{ route('item.index') }}">
                    <button class="underline underline-offset-4 rounded-xl px-3 py-2 mt-4">
                        トップへ
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
