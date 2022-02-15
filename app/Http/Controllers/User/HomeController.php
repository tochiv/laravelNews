<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use function view;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::query()
            ->where('approve', '=', 2)
            ->orderByDesc('publication_date')
            ->paginate(4);

        $user = Auth::user();

        return view('user.home',[
            'posts' => $posts,
            'user' => $user
        ]);
    }
}
