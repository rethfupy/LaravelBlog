<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $is_existed = Category::where('title', $data['title'])
            ->where('id', '!=', $category->id)
            ->exists();

        if (!$is_existed) {
             $category->update($data);
            session()->flash('success', 'Category has been updated.');
            return redirect()->route('admin.category.index');
        } else {
            session()->flash('error', 'Category name already exists.');
            return redirect()->route('admin.category.edit', compact('category'));
        }
    }
}
