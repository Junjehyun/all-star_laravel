<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    use HasFactory;

    protected $fillable = ['notice_id', 'author', 'content'];

    public function notice() {
        return $this->belongsTo(Notice::class);
    }

}
