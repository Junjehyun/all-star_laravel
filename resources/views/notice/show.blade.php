@extends('layouts.common')
@section('title', '공지사항 상세')
@section('content')
    <h1 class="text-center text-2xl font-bold my-10">공지사항 상세</h1>
    <div class="flex justify-center">
        <div class="w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">카테고리</label>
                <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                    @switch($notice->category)
                        @case('low')
                            이용규약 관련
                            @break
                        @case('common')
                            일반 공지사항
                            @break
                        @case('high')
                            중요 공지사항
                            @break
                        @case('emergency')
                            긴급 공지사항
                            @break
                    @endswitch
                </p>
            </div>
            <div class="flex flex-row space-x-3 mb-4">
                <div class="w-3/12">
                    <h2 class="text-gray-700 text-sm font-bold mb-2">작성자</h2>
                    <p class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        {{ $notice->author }}
                    </p>
                </div>
                <div class="w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2">제목</label>
                    <p class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        {{ $notice->title }}
                    </p>
                </div>
            </div>
            <div class="my-12">
                <h2 class="text-gray-700 text-sm font-bold mb-2">작성 내용</h2>
                <p class="w-full py-2 px-3 text-gray-700 leading-tight">
                    {{ $notice->content }}
                </p>
            </div>
            <div class="text-right">
                <a href="{{ route('notice.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    뒤로
                </a>
            </div>
        </div>
    </div>
@endsection
