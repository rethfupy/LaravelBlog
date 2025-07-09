<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $tag = Tag::firstOrCreate($data);

        if ($tag->wasRecentlyCreated) {
            session()->flash('success', 'Tag has been created.');
        } else {
            session()->flash('error', 'The tag with this name already exists.');
        }

        return redirect()->route('admin.tag.index');
    }
}
