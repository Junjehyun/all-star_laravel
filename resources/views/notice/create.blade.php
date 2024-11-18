@extends('layouts.common')
@section('title', '공지사항 작성')
@section('content')
    <h1 class="text-center text-2xl font-bold my-10">공지사항 작성</h1>
    <div class="flex justify-center">
        <form action="" method="POST" class="w-3/5 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="flex space-x-4 mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">카테고리</label>
                <select name="category" id="category" placeholder="카테고리를 선택해주세요"></select>
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
            </div>
        </form>
    </div>
@endsection
