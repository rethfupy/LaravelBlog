<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::latest()->paginate(6);
        $excludedIds = $posts->pluck('id');
        $randomPosts = Post::whereNotIn('id', $excludedIds)->inRandomOrder()->take(4)->get();
        $likedPost = Post::withCount('likedUsers')->orderBy('liked_user_count', 'desc')->get()->take(4);

        return view('posts.index', compact('posts', 'randomPosts', 'likedPost'));
    }
}
