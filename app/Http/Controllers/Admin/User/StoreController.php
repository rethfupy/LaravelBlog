<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $data['email']], $data);

        if ($user->wasRecentlyCreated) {
            Mail::to($data['email'])->send(new PasswordMail($password));
            event(new Registered($user));
            session()->flash('success', 'User has been created.');
        } else {
            session()->flash('error', 'The user with this email already exists.');
        }

        return redirect()->route('admin.user.index');
    }
}
