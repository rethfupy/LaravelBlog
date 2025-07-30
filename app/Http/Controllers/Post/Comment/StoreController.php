<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\Post\Comment\StoreRequest;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['post_id'] = $post->id;

        Comment::create($data);

        return redirect()->route('post.show', $post->id);
    }
}
