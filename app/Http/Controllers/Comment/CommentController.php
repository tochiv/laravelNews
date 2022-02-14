<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

    /**
     * @param Request $request
     * @param int $post
     * @return RedirectResponse
     */
    public function comment(Request $request, int $post)
    {
        $post = Post::query()
            ->find($post);

        Comment::query()
            ->create([
                'text' => $request['text'],
                'publication_date' => now(),
                'user_id' => auth()->id(),
                'post_id' => $post->id
            ]);

        return to_route('comment', $post);
    }
}
