<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.index', [
            'posts' => $posts
        ]);
    }

    public function approve(int $id)
    {
        $post = Post::query()
            ->find($id);

        $post->update([
            'approve' => 2
        ]);

        return to_route('admin');
    }

    public function disapprove(int $id)
    {
        $post = Post::query()
            ->find($id);

        $post->update([
            'approve' => 0
        ]);

        return to_route('admin');
    }

    public function destroy(int $id)
    {
        $post = Post::query()
            ->find($id);

        $post->delete();

        return to_route('home');
    }
}
