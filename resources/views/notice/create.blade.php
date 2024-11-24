@extends('layouts.common')
@section('title', '공지사항 작성')
@section('content')
    <h1 class="text-center text-2xl font-bold my-10">공지사항 작성</h1>
    <div class="flex justify-center">
        <form action="{{ route('notice.store') }}" method="POST" class="w-6/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="flex space-x-3 mb-4">
                <div class="flex-[7]">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">카테고리</label>
                    <select name="category" id="category"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="low">이용규약 관련</option>
                        <option value="common" selected>일반 공지사항</option>
                        <option value="high">중요 공지사항</option>
                        <option value="emergency">긴급 공지사항</option>
                    </select>
                </div>
            </div>
            <div class="flex space-x-4 mb-4">
                <div class="flex-[3]">
                    <label for="author" class="block text-gray-700 text-sm font-bold mb-2">작성자</label>
                    <input type="text" id="author" name="author"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="작성자">
                </div>
                <div class="flex-[7]">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">제목</label>
                    <input type="text" id="title" name="title"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="제목">
                </div>
            </div>
            <div class="mb-6">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">내용</label>
                <textarea id="content" name="content"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="내용" rows="5"></textarea>
            </div>
            <div class="text-right mt-4">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    저장
                </button>
                <a href="/notice_index" class="bg-red-400 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    뒤로
                </a>
            </div>
        </form>
    </div>
@endsection
