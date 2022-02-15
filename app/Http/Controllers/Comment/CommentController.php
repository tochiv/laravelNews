<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(int $post)
    {
        $post = Post::query()
        ->find($post);

        $comments = Comment::all();

        $postComments = $comments->where('post_id', '=', $post->id);

        return view('comment.index', [
            'post' => $post,
            'comments' => $postComments
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

    public function edit(int $id)
    {
        $comment = Comment::query()
            ->find($id);

        return view('comment.edit', $comment, [
            'comment' => $comment
        ]);
    }

    public function update(Request $request, int $id)
    {
        $comment = Comment::query()
            ->find($id);

        $comment->update([
                'text' => $request->text
            ]);

        return to_route('comment', $comment->post_id);
    }
}
