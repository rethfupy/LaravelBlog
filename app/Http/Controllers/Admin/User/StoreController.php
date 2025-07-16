<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::firstOrCreate(['email' => $data['email']], $data);

        if ($user->wasRecentlyCreated) {
            session()->flash('success', 'User has been created.');
        } else {
            session()->flash('error', 'The user with this email already exists.');
        }

        return redirect()->route('admin.user.index');
    }
}
