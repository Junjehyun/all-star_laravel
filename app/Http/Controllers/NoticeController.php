<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
/**
 *
 * NoticeController
 * 공지사항 관련 컨트롤러
 */
class NoticeController extends Controller
{
    //
    public function noticeIndex() {

        $notices = Notice::withCount('comments')->get();

        return view('notice.index', compact('notices'));
    }

    public function noticeCreate() {
        return view('notice.create');

    }

    public function noticeStore(Request $request) {

        $validated = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'author' => 'required|max:10',
            'category' => 'required|in:low,common,high,emergency'
        ]);

        // data save
        Notice::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author' => $validated['author'],
            'category' => $validated['category']
        ]);

        return redirect()->route('notice.index')
            ->with('success', '공지사항이 등록되었습니다.');
    }

    public function noticeShow($id) {
        // ID로 공지사항 데이터 조회 & 댓글 테이블 조인
        // 부모댓글과 자식 댓글 가져오기
        $notice = Notice::with(['comments' => function ($query) {
            $query->whereNull('parent_id')->with('children');
        }])->findOrFail($id);

        // 조회수 increase
        $notice->increment('view');

        // 뷰 반환
        return view('notice.show', compact('notice'));
    }

    public function noticeEdit($id) {
        // ID로 공지사항 데이터 조회
        $notice = Notice::findOrFail($id);

        // 뷰 반환
        return view('notice.edit', compact('notice'));
    }

    public function noticeUpdate(Request $request, $id) {
        // 유효성 검사
        $validated = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required',
            'category' => 'required|in:low,common,high,emergency',
        ]);

        $notice = Notice::findOrFail($id);

        $notice->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
        ]);

        return redirect()->route('notice.index')->with('success', '공지사항이 수정되었습니다.');
    }

    public function noticeDelete($id) {
        try {
            // 게시글 조회
            $notice = Notice::findOrFail($id);

            // 게시글 삭제
            $notice->delete();

            // 성공 응답 반환
            return response()->json([
                'success' => true,
                'message' => '게시글이 삭제되었습니다',
            ]);
        } catch (\Exception $e) {
            // 실패 응답 반환
            return response()->json([
                'success' => false,
                'message' => '게시글 삭제에 실패했습니다',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * 공지사항 추천 기능
     *
     * @return void
     */
    public function noticeLike($id) {
        try {
            // 게시글 조회
            $notice = Notice::findOrFail($id);

            // 추천 수 증가
            $notice->increment('like');

            // 성공 응답
            return response()->json([
                'success' => true,
                'message' => '추천하셨습니다.',
                'likes' => $notice->like,
            ]);
        } catch (\Exception $e) {
            // 실패 응답
            return response()->json([
                'success' => false,
                'message' => '처리 중 오류가 발생했습니다',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
