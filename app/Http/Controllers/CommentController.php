<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function commentStore(Request $request) {

        $validated = $request->validate([
            'notice_id' => 'required|exists:notices,id',
            'author' => 'required|string|max:20',
            'content' => 'required|string|max:200',
        ]);

        Comment::create([
            'notice_id' => $validated['notice_id'],
            'author' => $validated['author'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('notice.show',['id' => $validated['notice_id']])
                        ->with('success', '댓글이 작성되었습니다');
    }

    public function commentDelete(Request $request, $id) {
        try {
            $comment = Comment::findOrFail($id); // 댓글 조회
            $comment->delete(); // 댓글 삭제

            return response()->json([
                'success' => true,
                'message' => '댓글이 삭제 되었습니다.'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => '댓글 삭제에 실패했습니다.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function commentUpdate(Request $request, $id) {

        $validated = $request->validate([
            //'author' => 'required|string|max:20',
            'content' => 'required|string|max:200'
        ]);

        try {
            $comment = Comment::findOrFail($id);
            //$comment->content = $validated['author'];
            $comment->content = $validated['content'];
            $comment->save();

            return response()->json([
                'success' => true,
                'message' => '댓글이 수정되었습니다.',
                //'author' => $comment->author,
                'content' => $comment->content,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => '댓글 수정에 실패했습니다',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function commentReply(Request $request) {
        // 요청 데이터 검증
        $validated = $request->validate([
            'parent_id' => 'required|exists:comments,id', // 부모 댓글 ID 유효성 검사
            'notice_id' => 'required|exists:notices,id', // 공지사항 게시글 ID 유효성 검사
            'content' => 'required|string|max:200', // 대댓글 내용
            'author' => 'required|string|max:20' // 작성자
        ]);

        try {
            // 대댓글 생성
            $comment = Comment::create([
                'parent_id' => $validated['parent_id'],
                'notice_id' => $validated['notice_id'],
                'author' => $validated['author'],
                'content' => $validated['content'],
            ]);

            return response()->json([
                'success' => true,
                'message' => '대댓글이 작성되었습니다.',
                'comment' => $comment,
            ]);
        } catch(\Exception $e) {
            // 실패 응답 반환
            return response()->json([
                'success' => false,
                'message' => '대댓글 작성에 실패했습니다',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * 대댓글 삭제
     * @return void
     *
     */
    public function deleteReply($id) {
        // 대댓글 조회
        try{
             // 대댓글 조회
            $reply = Comment::findOrFail($id);

            // 대댓글 삭제
            $reply->delete();

            // 성공 응답 반환
            return response()->json([
                'success' => true,
                'message' => '대댓글이 삭제되었습니다.',
            ]);
        } catch(\Exception $e) {
            // 실패 응답 반환
            return response()->json([
                'success' => false,
                'message' => '대댓글 삭제에 실패했습니다.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
