@extends('layouts.common')
@section('title', '공지사항 관리')
@section('content')
    <h1 class="text-center text-2xl font-bold my-10">お知らせの修正</h1>
    <div class="flex justify-center">
        <form action="{{ route('notice.update', $notice->id) }}" method="POST" class="w-1/3 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <!-- カテゴリー -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">カテゴリー</label>
                <select name="category" id="category"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="low" {{ $notice->category == 'low' ? 'selected' : '' }}>利用規約関連</option>
                    <option value="common" {{ $notice->category == 'common' ? 'selected' : '' }}>一般的なお知らせ</option>
                    <option value="high" {{ $notice->category == 'high' ? 'selected' : '' }}>重要なお知らせ</option>
                    <option value="emergency" {{ $notice->category == 'emergency' ? 'selected' : '' }}>緊急なお知らせ</option>
                </select>
            </div>

            <!-- タイトル -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
                <input type="text" name="title" value="{{ $notice->title }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <!-- 内容 -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">内容</label>
                <textarea name="content" rows="10"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $notice->content }}</textarea>
            </div>

            <!-- 保存ボタン -->
            <div class="flex justify-end text-right mt-4 space-x-3">
                <button type="submit" class="outline outline-gray-200 rounded-xl text-black font-bold py-0 px-2">
                    修正{{--<svg xmlns="http://www.w3.org/2000/svg" height="34px" viewBox="0 -960 960 960" width="34px" fill="#000000"><path d="m421-298 283-283-46-45-237 237-120-120-45 45 165 166Zm59 218q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z"/></svg> --}}
                </button>
                <button onclick="deleteNotice({{ $notice->id }})" class="outline outline-gray-200 rounded-xl text-black font-bold py-0 px-2">
                    削除{{--<svg xmlns="http://www.w3.org/2000/svg" height="34px" viewBox="0 -960 960 960" width="34px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg> --}}
                </button>
                <a href="/notice_index" class="outline outline-gray-200 rounded-xl text-black font-bold py-0 px-2">
                    戻る{{--<svg xmlns="http://www.w3.org/2000/svg" height="34px" viewBox="0 -960 960 960" width="34px" fill="#000000"><path d="m287-446.67 240 240L480-160 160-480l320-320 47 46.67-240 240h513v66.66H287Z"/></svg> --}}
                </a>
            </div>
        </form>
    </div>
    <script>
        // 삭제 ajax
        function deleteNotice(noticeId) {
            if (!confirm('投稿を削除しますか?')) return;

            $.ajax({
                url: `/notice_delete/${noticeId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = '/notice_index';
                    } else {
                        alert('削除に失敗しました。');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('エラーが発生しました。もう一度やり直してください。');
                }
            });
        }
    </script>
@endsection
