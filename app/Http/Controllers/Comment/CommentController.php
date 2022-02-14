<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;

class CommentController extends Controller
{
    public function index(int $post)
    {
        $post = Post::query()
        ->find($post);

        return view('comment.index', [
            'post' => $post
        ]);
    }
}
