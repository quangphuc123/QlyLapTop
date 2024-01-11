<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;
    protected $table = 'comment_post';

    protected $fillable = [
        'user_id',
        'ho_ten',
        'post_id',
        'noiDung'
    ];
}
