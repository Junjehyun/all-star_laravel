@extends('layouts.common')
@section('title', 'お知らせ作成')
@section('content')
    <h1 class="text-center text-2xl font-bold my-10">お知らせ新規作成(後で管理者専用に設定する)</h1>
    <div class="flex justify-center">
        <form action="{{ route('notice.store') }}" method="POST" class="w-3/1 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <div class="flex-[7]">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">カテゴリー</label>
                    <select name="category" id="category"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="low">重要ではないお知らせ</option>
                        <option value="common" selected>普通のお知らせ</option>
                        <option value="high">重要なお知らせ</option>
                        <option value="emergency">緊急なお知らせ</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-4 mb-4">
                <div class="w-3/12">
                    <label for="author" class="block text-gray-700 text-sm font-bold mb-2">氏名</label>
                    <input type="text" id="author" name="author"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="氏名">
                </div>
                <div class="w-full">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
                    <input type="text" id="title" name="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="タイトル">
                </div>
            </div>
            <div class="mb-6">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">内容</label>
                <textarea id="content" name="content"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="内容" rows="15"></textarea>
            </div>
            <div class="text-right mt-4 space-x-1">
                <button type="submit"
                        class="outline outline-blue-200 font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline">
                    保存
                </button>
                <a href="/notice_index" class="outline outline-red-100 font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline">
                    戻る
                </a>
            </div>
        </form>
    </div>
@endsection
