<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $comments = Comment::query()
            ->where('user_id', '=', $user->id)
            ->get();

        return view('profile.index', [
            'user' => $user,
            'comments' => $comments
        ]);
    }
}
