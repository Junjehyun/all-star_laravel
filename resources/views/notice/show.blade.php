@extends('layouts.common')
@section('title', '공지사항 상세')
@section('content')
    <h1 class="text-center text-2xl font-bold my-10">お知らせの詳細</h1>
    <div class="flex justify-center">
        <div class="w-1/2 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">カテゴリー</label>
                <p class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
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
                </p>
            </div>
            <div class="flex flex-row space-x-3 mb-4">
                <div class="w-3/12">
                    <h2 class="text-gray-700 text-sm font-bold mb-2">作成者</h2>
                    <p class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        {{ $notice->author }}
                    </p>
                </div>
                <div class="w-full">
                    <label class="block text-gray-700 text-sm font-bold mb-2">タイトル</label>
                    <p class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight">
                        {{ $notice->title }}
                    </p>
                </div>
            </div>
            <div class="my-12">
                <h2 class="text-gray-700 text-sm font-bold mb-2">内容</h2>
                <span class="w-full py-2 px-3 text-gray-700 leading-tight">{{ $notice->content }}
                </span>
            </div>
            <div class="flex justify-center">
                <button onclick="likeNotice({{ $notice->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000000"><path d="M720-120H280v-520l280-280 50 50q7 7 11.5 19t4.5 23v14l-44 174h258q32 0 56 24t24 56v80q0 7-2 15t-4 15L794-168q-9 20-30 34t-44 14Zm-360-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406Zm-80-34v80H160v360h120v80H80v-520h200Z"/></svg>
                </button>
                <span id="like-count-{{ $notice->id }}" class="text-xl ml-2">
                    {{ $notice->like }}
                </span>
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-1/2 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @if($notice->comments->isEmpty())
                <p>コメントがありません！ 初コメントを作成しましょう</p>
            @else
            <ul>
                @foreach($notice->comments as $comment)
                    <li class="mb-6 border-b border-gray-500 pb-4">
                        <!-- 부모댓글 -->
                        <div class="flex justify-between items-center">
                            <div class="flex row-span-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>
                                <h4 class="text-lg font-semibold">{{ $comment->author }}</h4>
                            </div>
                            <span class="text-sm text-gray-500">{{ $comment->created_at->format('Y/m/d h:i') }}</span>
                        </div>
                        <form id="edit-form-{{ $comment->id }}" class="hidden mt-4">
                            <textarea id="edit-content-{{ $comment->id }}" cols="30" rows="10" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $comment->content }}</textarea>
                            <div class="flex justify-end mt-2">
                                <button type="button" onclick="saveCommentBtn({{ $comment->id }})" class="text-black text-sm font-bold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="#000000"><path d="m421-298 283-283-46-45-237 237-120-120-45 45 165 166Zm59 218q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z"/></svg>
                                </button>
                                <button type="button" onclick="cancelEditComment({{ $comment->id }})" class="text-black text-sm font-bold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000000"><path d="m251.33-204.67-46.66-46.66L433.33-480 204.67-708.67l46.66-46.66L480-526.67l228.67-228.66 46.66 46.66L526.67-480l228.66 228.67-46.66 46.66L480-433.33 251.33-204.67Z"/></svg>
                                </button>
                            </div>
                        </form>
                        <div class="flex justify-between mt-5">
                            <p id="comment-content-{{ $comment->id }}" class="mt-2 text-gray-700 text-lg">{{ $comment->content }}</p>
                            <div class="flex justify-end space-x-1">
                                <button onclick="updateCommentBtn({{ $comment->id }})" class="text-sm font-bold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                                </button>
                                <button onclick="deleteCommentBtn({{ $comment->id }})" class="text-sm font-bold py-1 px-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                </button>
                            </div>
                        </div>
                        <!-- 대댓글 -->
                        @if($comment->children->isNotEmpty())
                            <ul class="ml-4 border-1 border-gray-500 pl-4 mt-3">
                                @foreach($comment->children as $child)
                                    <li id="reply-{{ $child->id }}" class="py-5">
                                        <p class="flex justify-start text-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m600-200-56-57 143-143H300q-75 0-127.5-52.5T120-580q0-75 52.5-127.5T300-760h20v80h-20q-42 0-71 29t-29 71q0 42 29 71t71 29h387L544-624l56-56 240 240-240 240Z"/></svg><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z"/></svg>{{ $child->author }}: {{ $child->content }}
                                            <button onclick="deleteReply({{ $child->id }})" class="ml-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                            </button>
                                        </p>
                                        {{-- <small class="text-gray-700">{{ $child->created_at->format('Y/m/d H:i') }}</small> --}}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <!-- 대댓글 입력폼 -->
                        <div class="mt-5">
                            <button onclick="toggleReplyForm({{ $comment->id }})" class="outline outline-gray-200 rounded py-2 px-2 text-gray-700 text-sm">
                                返信
                            </button>
                            <form id="reply-form-{{ $comment->id }}" action="{{ route('comment.reply') }}" class="hidden mt-2" method="POST">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                <input type="hidden" name="notice_id" value="{{ $notice->id }}">
                                <input type="text" name="author" class="w-3/12 px-3 py-2 border rounded mb-2" placeholder="作成者">
                                <textarea name="content" rows="5" class="w-full px-3 py-2 border rounded" placeholder="返信を作成しましょう"></textarea>
                                <div class="flex justify-end">
                                    <button type="button" onclick="submitReply({{ $comment->id }})" class="text-black px-3 py-2 rounded mt-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="#000000"><path d="m421-298 283-283-46-45-237 237-120-120-45 45 165 166Zm59 218q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z"/></svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <!-- 댓글 작성 폼 -->
    <div class="flex justify-center">
        <form action="{{ route('comment.store') }}" method="POST" class="w-1/2 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" name="notice_id" value="{{ $notice->id }}">
            <div class="mb-4">
                <label for="author" class="block text-gray-700 text-sm font-bold mb-2">作成者</label>
                <input type="text" id="author" name="author" required placeholder="作成者" class="w-3/12 px-4 py-2 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-6">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">内容</label>
                <textarea name="content" id="content" rows="3" placeholder="内容" class="w-full px-4 py-2 border border-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="outline outline-gray-200 py-2 px-3 rounded">
                    登録{{-- <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px" fill="#000000"><path d="m421-298 283-283-46-45-237 237-120-120-45 45 165 166Zm59 218q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-156t86-127Q252-817 325-848.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82-31.5 155T763-197.5q-54 54.5-127 86T480-80Zm0-60q142 0 241-99.5T820-480q0-142-99-241t-241-99q-141 0-240.5 99T140-480q0 141 99.5 240.5T480-140Zm0-340Z"/></svg> --}}
                </button>
            </div>
        </form>
    </div>
    <div class="flex justify-center">
        <div class="flex justify-end w-1/2 mt-2">
            <a href="{{ route('notice.index') }}" class="outline outline-gray-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                戻る{{-- <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#000000"><path d="M240-240v-480h60v480h-60Zm447-3L453-477l234-234 43 43-191 191 191 191-43 43Z"/></svg> --}}
            </a>
        </div>
    </div>
    <script>
        function deleteCommentBtn(commentId) {
            if(!confirm('コメントを削除しますか?')) return;

            $.ajax({
                url: `/comment/delete/${commentId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        $(`#comment-${commentId}`).remove();
                        location.reload();
                        alert(response.message);
                    } else {
                        alert('コメント削除に失敗しました。');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJA Error:', error);
                    alert('エラーが発生しました。もう一度やり直してください。');
                }
            });
        }

        function updateCommentBtn(commentId) {
            // 수정버튼 클릭 시, 수정 폼 표시 및 기존 컨텐츠 숨기기
            $(`#comment-content-${commentId}`).addClass('hidden'); // 기존 내용 숨기기
            $(`#edit-form-${commentId}`).removeClass('hidden'); // 수정 폼 표기
            $(`#comment-content-${commentId}`).siblings('.flex').addClass('hidden');
        }

        function saveCommentBtn(commentId) {
            const updateContent = $(`#edit-content-${commentId}`).val(); // 수정된 내용 가져오기

            $.ajax({
                url: `/comment/update/${commentId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    content: updateContent
                },
                success: function(response) {
                    if (response.success) {
                        $(`#comment-content-${commentId}`).text(response.content).removeClass('hidden');
                        $(`#edit-form-${commentId}`).addClass('hidden');
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('コメント修正に失敗しました。');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('エラーが発生しました。もう一度やり直してください。');
                }
            });
        }

        function cancelEditComment(commentId) {
            // 수정 폼 숨기기
            $(`#edit-form-${commentId}`).addClass('hidden');
            // 수정, 삭제버튼 다시 표시
            $(`#comment-content-${commentId}`).siblings('.flex').removeClass('hidden');
            $(`#comment-content-${commentId}`).removeClass('hidden');
        }

        function toggleReplyForm(commentId) {
            $(`#reply-form-${commentId}`).toggle();
        }

        // 대댓글 Ajax
        function submitReply(commentId) {
            const form = $(`#reply-form-${commentId}`);
            const formData = {
                parent_id: form.find('input[name="parent_id"]').val(),
                notice_id: form.find('input[name="notice_id"]').val(),
                author: form.find('input[name="author"]').val(),
                content: form.find('textarea[name="content"]').val(),
                _token: '{{ csrf_token() }}',
            };

            console.log(JSON.stringify(formData));

            $.ajax({
                url: '{{ url('/comment/reply') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: formData,
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('作成に失敗しました。');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('エラーが発生しました。もう一度やり直してください。');
                }
            });
        }

        // 대댓글 삭제 ajax
        function deleteReply(replyId) {
            if (!confirm('返信を削除しますか?'));

            $.ajax({
                url: `/reply/delete/${replyId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // 대댓글 요소 삭제
                        $(`#reply-${replyId}`).remove();
                        alert(response.message);
                    } else {
                        alert('返信削除に失敗しました。');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('エラーが発生しました。もう一度やり直してください。');
                }
            });
        }

        function likeNotice(noticeId) {
            $.ajax({
                url: `/notice/like/${noticeId}`,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // 추천 수 업데이트
                        $(`#like-count-${noticeId}`).text(response.likes);
                        alert(response.message);
                        location.reload();
                    } else {
                        alert('オススメに失敗しました。');
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
