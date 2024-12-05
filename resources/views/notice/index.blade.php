@extends('layouts.common')
@section('title', '공지사항')
@section('content')
<!-- 여기부터 작성 -->
<h1 class="text-center text-2xl font-bold my-10">공지사항</h1>
<div class="flex justify-center items-center mt-10">
    <table class="table-auto border-collapse border border-gray-300 w-3/5 text-left">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 text-sm px-4 py-2 w-1/12">번호</th>
                <th class="border border-gray-300 text-sm px-4 py-2 w-2/12">분류</th>
                <th class="border border-gray-300 text-sm px-4 py-2 w-4/12">제목</th>
                <th class="border border-gray-300 text-sm px-4 py-2 w-1/12">작성자</th>
                <th class="border border-gray-300 text-sm px-4 py-2 w-1/12">작성일</th>
                <th class="border border-gray-300 text-sm px-4 py-2 w-1/12">조회</th>
                <th class="border border-gray-300 text-sm px-4 py-2 w-1/12">관리</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notices as $notice)
            <tr>
                <td class="border border-gray-300 px-4 py-2 text-sm">{{ $notice->id }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm">
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
                </td>
                <td class="border border-gray-300 px-4 py-2 text-sm">
                    <a href="{{ route('notice.show', $notice->id) }}" class="text-blue-500 hover:underline">{{ $notice->title }}
                    </a>
                </td>
                <td class="border border-gray-300 px-4 py-2 text-sm">{{ $notice->author }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm">{{ $notice->created_at->format('Y/m/d') }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm">{{ $notice->view }}</td>
                <td class="border border-gray-300 px-5 py-2 text-sm">
                    <a href="{{ route('notice.edit', $notice->id) }}">
                        <button class="bg-cyan-300 px-3 py-1 rounded">관리</button>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center">등록된 공지사항이 없습니다.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="flex justify-end space-x-2 mt-4 w-3/5 mx-auto">
    <a href="notice_create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">작성</a>
    <a href="main_index" class="bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-700">메인으로</a>
</div>
@endsection
