<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices';
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'view',
        'category'
    ];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
