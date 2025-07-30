<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Comment;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)->whereNot('id', $post->id)->inRandomOrder()->take(3)->get();

        return view('posts.show', compact('post', 'date', 'relatedPosts'));
    }
}
