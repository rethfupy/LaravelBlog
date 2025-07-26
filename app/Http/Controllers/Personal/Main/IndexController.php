<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\PostUserLike;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = [];
        $data['commentsCount'] = Comment::where('user_id', Auth::id())->count();
        $data['likesCount'] = PostUserLike::where('user_id', Auth::id())->count();

        return view('personal.main.index', compact('data'));
    }
}
