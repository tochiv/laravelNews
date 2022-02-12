<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        return view('admin.index', [
            'user' => $user
        ]);
    }

    public function approve(int $id)
    {
        $post = Post::find($id);

        $post->update([
            'approve' => 2
        ]);

        return redirect()->route('admin');
    }
}
