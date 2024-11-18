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
                <th class="border border-gray-300 text-sm px-4 py-2 w-5/12">제목</th>
                <th class="border border-gray-300 text-sm px-4 py-2 w-2/12">작성자</th>
                <th class="border border-gray-300 text-sm px-4 py-2 w-2/12">작성일</th>
            </tr>
        </thead>
        <tbody>
            {{-- @forelse($notices as $notice) --}}
            <tr>
                <td class="border border-gray-300 px-4 py-2"></td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="" class="text-blue-500 hover:underline">
                        {{-- {{ $notice->title }} --}}
                    </a>
                </td>
                <td class="border border-gray-300 px-4 py-2"></td>
                <td class="border border-gray-300 px-4 py-2"></td>
            </tr>
            {{-- @empty --}}
            <tr>
                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center">등록된 공지사항이 없습니다.</td>
            </tr>
            {{-- @endforelse --}}
        </tbody>
    </table>
</div>
<div class="flex justify-end mt-4 w-3/5 mx-auto">
    <a href="notice_create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">작성</a>
</div>
@endsection
