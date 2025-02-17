@extends('layouts.shop_common')
@section('title', '会員一覧')
@section('content')
<div class="container mx-auto mt-10">
    <h1 class="font-bold text-center text-2xl mb-6">ユーザー一覧</h1>
    <table class="min-w-full divide-y divide-gray-200 bg-white shadow rounded-lg">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    No.
                </th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ユーザ名
                </th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    メールアドレス
                </th>
                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    登録日
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $user->id }}</td>
                    <td class="px-6 py-4">
                        <span class="text-gray-900 font-medium">{{ $user->name }}</span>
                    </td>
                    <td class="px-6 py-4 text-center text-gray-700">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{ $user->created_at }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
