<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'postTitle', 'user_id', 'description', 'image', 'status',
    ];

    const ISCOMMENTABLE   = '1';
    const ISUNCOMMENTABLE  = '0';

    public static $is_commentable = [
        Self::ISCOMMENTABLE   => 'IsCommentable',
        Self::ISUNCOMMENTABLE => 'IsUnCommentable'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }
}
