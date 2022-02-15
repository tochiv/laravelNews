<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('editor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();

        $posts = Post::query()
            ->where('user_id', '=', $user['id'])
            ->where('approve', '=', 0)
            ->orderByDesc('publication_date')
            ->get();

        return view('editor.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('editor.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);

        Post::create([
            'title' => $request['title'],
            'text' => $request['text'],
            'publication_date' => now(),
            'user_id' => auth()->id(),
            'approve' => 0
        ]);

        return to_route('editor.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $post = Post::query()
            ->find($id);
        $user = Auth::user();

        return view('editor.form', [
            'post' => $post,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $post = Post::query()
            ->find($id);

        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'text' => $request->text
        ]);

        return to_route('editor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $post = Post::query()
            ->find($id);

        $post->delete();

        return to_route('editor.index');
    }

    public function approve(int $id)
    {
        $post = Post::query()
            ->find($id);

        $post->update([
            'approve' => 1
        ]);

        return to_route('editor.index');
    }
}
