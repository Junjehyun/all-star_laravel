@extends('layouts.common')
@section('title', '공지사항')
@section('content')
<!-- 여기부터 작성 -->
<!-- 게시판도 전체적으로 디자인 다듬어야 241216 -->
<h1 class="text-center text-2xl font-bold my-10">お知らせ</h1>
<div class="flex justify-center">
    <form action="" method="GET" class="w-3/5 flex justify-end space-x-1">
        <input type="text" placeholder="検索" class="border border-gray-300 rounded-l px-3 py-1 w-48 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <button type="submit" class="outline outline-gray-200 px-3 py-1">検索</button>
    </form>
</div>
<div class="flex justify-center items-center mt-1">
    <table class="w-3/5 table-auto border-collapse border border-gray-100 text-left">
        <thead>
            <tr class="bg-zinc-50">
                <th class="text-sm px-4 py-2">No</th>
                <th class="text-sm px-4 py-2">オススメ!</th>
                <th class="text-sm px-4 py-2">分類</th>
                <th class="text-sm px-4 py-2">タイトル</th>
                <th class="text-sm px-4 py-2">作成者</th>
                <th class="text-sm px-4 py-2">作成日</th>
                <th class="text-sm px-4 py-2">照会</th>
                <th class="text-sm px-4 py-2">管理</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notices as $notice)
            <tr>
                <td class="px-4 py-2 text-sm">{{ $notice->id }}</td>
                <td class="px-4 py-2 text-sm">{{ $notice->like }}</td>
                <td class="px-4 py-2 text-sm">
                    @switch($notice->category)
                        @case('low')
                        利用規約関連
                        @break
                        @case('common')
                        一般的なお知らせ
                        @break
                        @case('high')
                        重要なお知らせ
                        @break
                        @case('emergency')
                        緊急なお知らせ
                        @break
                    @endswitch
                </td>
                <td class="px-4 py-2 text-sm">
                    <a href="{{ route('notice.show', $notice->id) }}" class="text-black-500 hover:underline">{{ $notice->title }}
                        @if($notice->comments_count > 0)
                            <span class="text-gray-500">({{ $notice->comments_count }})</span>
                        @endif
                    </a>
                </td>
                <td class="px-4 py-2 text-sm">{{ $notice->author }}</td>
                <td class="px-4 py-2 text-sm">{{ $notice->created_at->format('Y/m/d') }}</td>
                <td class="px-4 py-2 text-sm text-center">{{ $notice->view }}</td>
                <td class="px-5 py-2 text-sm">
                    <a href="{{ route('notice.edit', $notice->id) }}">
                        <button class="outline outline-gray-200 px-3 py-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#000000"><path d="m382-80-18.67-126.67q-17-6.33-34.83-16.66-17.83-10.34-32.17-21.67L178-192.33 79.33-365l106.34-78.67q-1.67-8.33-2-18.16-.34-9.84-.34-18.17 0-8.33.34-18.17.33-9.83 2-18.16L79.33-595 178-767.67 296.33-715q14.34-11.33 32.34-21.67 18-10.33 34.66-16L382-880h196l18.67 126.67q17 6.33 35.16 16.33 18.17 10 31.84 22L782-767.67 880.67-595l-106.34 77.33q1.67 9 2 18.84.34 9.83.34 18.83 0 9-.34 18.5Q776-452 774-443l106.33 78-98.66 172.67-118-52.67q-14.34 11.33-32 22-17.67 10.67-35 16.33L578-80H382Zm55.33-66.67h85l14-110q32.34-8 60.84-24.5T649-321l103.67 44.33 39.66-70.66L701-415q4.33-16 6.67-32.17Q710-463.33 710-480q0-16.67-2-32.83-2-16.17-7-32.17l91.33-67.67-39.66-70.66L649-638.67q-22.67-25-50.83-41.83-28.17-16.83-61.84-22.83l-13.66-110h-85l-14 110q-33 7.33-61.5 23.83T311-639l-103.67-44.33-39.66 70.66L259-545.33Q254.67-529 252.33-513 250-497 250-480q0 16.67 2.33 32.67 2.34 16 6.67 32.33l-91.33 67.67 39.66 70.66L311-321.33q23.33 23.66 51.83 40.16 28.5 16.5 60.84 24.5l13.66 110Zm43.34-200q55.33 0 94.33-39T614-480q0-55.33-39-94.33t-94.33-39q-55.67 0-94.5 39-38.84 39-38.84 94.33t38.84 94.33q38.83 39 94.5 39ZM480-480Z"/></svg>
                        </button>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-2 text-center">現在、登録されたお知らせがありません。</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="flex justify-end space-x-3 mt-4 w-3/5 mx-auto">
    <a href="notice_create" class="outline outline-gray-200 rounded px-3 py-2">作成</a>
    <a href="main_index" class="outline outline-gray-200 rounded px-3 py-2">戻る</a>
</div>
@endsection
