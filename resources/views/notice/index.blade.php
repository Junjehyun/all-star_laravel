@extends('layouts.common')
@section('title', '공지사항')
@section('content')
<!-- 여기부터 작성 -->
<!-- 게시판도 전체적으로 디자인 다듬어야 241216 -->
<h1 class="text-center text-2xl font-bold my-10">お知らせ一覧</h1>
<div class="flex justify-center">
    {{-- <form action="" method="GET" class="w-3/5 flex justify-end space-x-1">
        <input type="text" placeholder="検索" class="border border-gray-300 rounded-l px-3 py-1 w-48 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <button type="submit" class="outline outline-gray-200 px-3 py-1">検索</button>
    </form> --}}
</div>
<div class="flex justify-center items-center mt-1">
    <table class="table-auto border-collapse w-1/2 text-sm text-center">
        <thead>
            <tr class="bg-zinc-50">
                <th class="text-sm px-4 py-2">No</th>
                <th class="text-sm px-4 py-2">分類</th>
                <th class="text-sm px-4 py-2">タイトル</th>
                <th class="text-sm px-4 py-2">作成者</th>
                <th class="text-sm px-4 py-2 text-center">管理</th>
                <th class="text-sm px-4 py-2 text-center w-[8%]">照会</th>
                <th class="text-sm px-4 py-2">作成日</th>
            </tr>
        </thead>
        <tbody>
            @forelse($notices as $notice)
            <tr class="hover:bg-zinc-50 transition ease-in-out">
                <td class="px-4 py-1">{{ $notice->id }}</td>
                <td class="px-4 py-1">
                    @switch($notice->category)
                        @case('low') <span class="text-green-600 font-semibold">低</span> @break
                        @case('common') <span class="text-blue-600 font-semibold">中</span> @break
                        @case('high') <span class="text-yellow-600 font-semibold">高</span> @break
                        @case('emergency') <span class="text-red-600 font-semibold">緊急</span> @break
                    @endswitch
                </td>
                <td class="px-4 py-1 text-left">
                    <a href="{{ route('notice.show', $notice->id) }}">
                        {{ $notice->title }}
                        @if($notice->comments_count > 0)
                            <span class="text-xs text-gray-500">({{ $notice->comments_count }})</span>
                        @endif
                    </a>
                </td>
                <td>{{ $notice->author }}</td>
                <td class="flex justify-center text-center space-x-3 py-2">
                    <a href="{{ route('notice.edit', ['id' => $notice->id]) }}"
                        class="outline outline-green-100 rounded-xl py-1 px-2">修正
                    </a>
                    <form id="deleteForm" action="{{ route('notice.delete', $notice->id) }}" method="POST">
                        @csrf
                        <button type="button" onclick="confirmDelete()" class="outline outline-rose-100 rounded-xl py-1 px-2">
                            削除
                        </button>
                    </form>
                </td>
                <td class="text-center text-xs w-[8%]">{{ $notice->view }}</td>
                <td class="text-xs">{{ $notice->created_at->format('y年m月d日') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">現在、登録されたお知らせがありません。</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="flex justify-end space-x-3 mt-4 w-1/2 mx-auto">
    <a href="notice_create" class="outline outline-sky-100 rounded-xl py-1 px-1 text-sm">新規作成</a>
    <a href="main_index" class="outline outline-gray-200 rounded-xl px-1 py-1 text-sm">メインへ</a>
</div>
<script>
    function confirmDelete() {
        if (confirm('本当に削除しますか?この操作は元に戻りません。')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endsection
