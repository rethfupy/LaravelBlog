<?php

namespace App\Http\Controllers\Blog;

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
        $likedPost = Post::withCount('likedUser')->orderBy('liked_user_count', 'desc')->get()->take(4);

        return view('blog.index', compact('posts', 'randomPosts', 'likedPost'));
    }
}
