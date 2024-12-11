@extends('layouts.common')
@section('title', '공지사항 작성')
@section('content')
    <h1 class="text-center text-2xl font-bold my-10">お知らせ新規作成</h1>
    <div class="flex justify-center">
        <form action="{{ route('notice.store') }}" method="POST" class="w-6/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="flex space-x-3 mb-4">
                <div class="flex-[7]">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">カテゴリー</label>
                    <select name="category" id="category"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="low">利用規約関連</option>
                        <option value="common" selected>一般的なお知らせ</option>
                        <option value="high">重要なお知らせ</option>
                        <option value="emergency">緊急なお知らせ</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-4 mb-4">
                <div class="flex-[3]">
                    <label for="author" class="block text-gray-700 text-sm font-bold mb-2">作成者</label>
                    <input type="text" id="author" name="author"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="作成者">
                </div>
                <div class="flex-[7]">
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
                        placeholder="内容" rows="5"></textarea>
            </div>
            <div class="text-right mt-4 space-x-1">
                <button type="submit"
                        class="outline outline-gray-200 font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline">
                    保存
                </button>
                <a href="/notice_index" class="outline outline-gray-200 font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline">
                    戻る
                </a>
            </div>
        </form>
    </div>
@endsection
