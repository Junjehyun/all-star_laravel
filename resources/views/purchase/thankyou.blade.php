@extends('layouts.shop_common')
@section('title', '注文完了')
@section('content')
    <div class="container w-1/2 mx-auto mt-10">
        <h1 class="text-2xl text-center font-bold text-green-500">ご注文ありがとうございました！</h1>
        <p class="text-lg mt-4 text-center">ご注文が正常に完了しました。</p></br>
        <div class="rounded-lg p-4">
            <h2 class="text-2xl font-semibold mt-2 text-center">注文詳細</h2>
            <div class="max-w-4xl mx-auto mt-6">
                <table class="table-auto w-full">
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">お名前</td>
                            <td class="px-4 py-2">{{ $order->customer_name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">注文ID</td>
                            <td class="px-4 py-2">{{ $order->id }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">商品名</td>
                            <td class="px-4 py-2">{{ $order->item->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">サイズ</td>
                            <td class="px-4 py-2">{{ $order->item->size }}mm</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">電話番号</td>
                            <td class="px-4 py-2">{{ $order->customer_phone }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">メールアドレス</td>
                            <td class="px-4 py-2">{{ $order->customer_email }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold text-left">配送先住所</td>
                            <td class="px-4 py-2">{{ $order->customer_address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div></br>
            <div class="text-center font-bold">
                <td class="px-4 py-2 text-center">合計金額</td>
                <td class="px-4 py-2">¥{{ number_format($order->amount) }}</td>
            </div></br>
            <p class="text-center">商品の発送が完了次第、お知らせいたします。</p>
            <div class="flex justify-end">
                <a href="{{ route('item.index') }}">
                    <button class="outline outline-green-100 rounded-xl px-3 py-2 mt-4">
                        トップへ
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
