@extends('layouts.shop_common')
@section('title', '注文履歴')
@section('content')
    <div class="container w-3/5 mx-auto mt-10">
        <h1 class="text-center text-2xl font-bold mb-6">注文履歴</h1>
        @if($orders->isEmpty())
            <p class="text-center text-gray-700 text-xl">注文履歴がありません。</p>
            <div class="flex justify-center mt-10">
                <a href="{{  route('item.index') }}" class="outline outline-rose-200 hover:outline-rose-300 rounded-xl px-3 py-2">
                    ショッピングモールへ
                </a>
            </div>
        @else
            <table class="table-auto w-full justify-center text-left border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border-b py-2 px-4">注文ID</th>
                        <th class="border-b py-2 px-4">商品名</th>
                        <th class="border-b py-2 px-4">価格</th>
                        <th class="border-b py-2 px-4">ステータス</th>
                        <th class="border-b py-2 px-4">注文日時</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="border-b py-2 px-4">{{ $order->id }}</td>
                            <td class="border-b py-2 px-4">{{ $order->item->name }}</td>
                            <td class="border-b py-2 px-4">￥{{ number_format($order->amount, 0) }}</td>
                            <td class="border-b py-2 px-4">{{ $order->status }}</td>
                            <td class="border-b py-2 px-4">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="flex justify-end mt-3">
            <a href="/item_index" class="outline outline-rose-100 py-1 px-2 rounded-xl">戻る</a>
        </div>
    </div>
@endsection
