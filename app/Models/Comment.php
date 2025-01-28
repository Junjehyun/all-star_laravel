<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'notice_id',
        'parent_id',
        'author',
        'content',
        'item_id',
        'rating'
    ];

    // 데이터 타입 캐스팅 (선택 사항)
    protected $casts = [
        'rating' => 'integer',
    ];

    public function notice() {
        return $this->belongsTo(Notice::class);
    }

    /**
     * 부모 댓글을 가져오는 관계
     *
     *
     */
    public function parent() {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    /**
     * 자식 댓글(대댓글)을 가져오는 관계
     *
     *
     */
    public function children() {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id'); // 아이템과의 관계 설정
    }
}
