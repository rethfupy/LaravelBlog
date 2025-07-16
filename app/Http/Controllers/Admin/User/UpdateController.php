<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $is_existed = User::where('email', $data['email'])
            ->where('id', '!=', $user->id)
            ->exists();

        if (!$is_existed) {
            $user->update($data);
            session()->flash('success', 'User has been updated.');
            return redirect()->route('admin.user.index');
        } else {
            session()->flash('error', 'User email has been already taken.');
            return redirect()->route('admin.user.edit', compact('user'));
        }
    }
}
