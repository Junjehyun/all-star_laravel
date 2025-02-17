
@extends('layouts.shop_common')
@section('title', '商品管理')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="font-bold text-center text-2xl mb-6">商品管理</h1>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 bg-white shadow rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        商品名
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        価格
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        アクション
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($items as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 flex items-center space-x-4">
                            <img src="{{ $item->image ? asset('storage/' . $item->image) : '/images/default-image.png' }}"
                                alt="{{ $item->name }}" class="h-16 w-16 object-cover rounded-lg">
                            <span class="text-gray-900 font-medium">{{ $item->name }}</span>
                        </td>
                        <td class="px-6 py-4 text-center text-gray-700">
                            {{ number_format($item->price) }}円
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-3">
                                <a href="{{ route('item.edit', $item->id) }}">
                                    <button class="outline outline-sky-100 px-1 py-1 rounded-xl">修正</button>
                                </a>
                                <form action="{{ route('item.delete', $item->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか?')">
                                    @csrf
                                    <button class="outline outline-rose-100 px-1 py-1 rounded-xl">削除</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
