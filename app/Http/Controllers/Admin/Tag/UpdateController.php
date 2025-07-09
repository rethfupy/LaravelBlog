<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $is_existed = Tag::where('title', $data['title'])
            ->where('id', '!=', $tag->id)
            ->exists();

        if (!$is_existed) {
             $tag->update($data);
            session()->flash('success', 'Tag has been updated.');
            return redirect()->route('admin.tag.index');
        } else {
            session()->flash('error', 'Tag name already exists.');
            return redirect()->route('admin.tag.edit', compact('tag'));
        }
    }
}
