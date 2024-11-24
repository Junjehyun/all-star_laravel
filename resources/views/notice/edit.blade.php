@extends('layouts.common')
@section('title', '공지사항 관리')
@section('content')
    <h1 class="text-center text-2xl font-bold my-10">공지사항 관리</h1>
    <div class="flex justify-center">
        <form action="{{ route('notice.update', $notice->id) }}" method="POST" class="w-1/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <!-- カテゴリー -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">카테고리</label>
                <select name="category" id="category"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="low" {{ $notice->category == 'low' ? 'selected' : '' }}>이용규약관련</option>
                    <option value="common" {{ $notice->category == 'common' ? 'selected' : '' }}>일반 공지사항</option>
                    <option value="high" {{ $notice->category == 'high' ? 'selected' : '' }}>중요 공지사항</option>
                    <option value="emergency" {{ $notice->category == 'emergency' ? 'selected' : '' }}>긴급 공지사항</option>
                </select>
            </div>

            <!-- タイトル -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">제목</label>
                <input type="text" name="title" value="{{ $notice->title }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- 内容 -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">작성 내용</label>
                <textarea name="content" rows="10"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $notice->content }}</textarea>
            </div>

            <!-- 保存ボタン -->
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
