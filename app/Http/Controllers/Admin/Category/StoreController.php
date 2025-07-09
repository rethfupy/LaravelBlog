<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $category = Category::firstOrCreate($data);

        if ($category->wasRecentlyCreated) {
            session()->flash('success', 'Category has been created.');
        } else {
            session()->flash('error', 'The category with this name already exists.');
        }

        return redirect()->route('admin.category.index');
    }
}
