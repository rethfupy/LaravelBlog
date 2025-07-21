<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;

class StoreUserJob implements ShouldQueue
{
    use Queueable;

    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $password = Str::random(10);
        $this->data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $this->data['email']], $this->data);

        if ($user->wasRecentlyCreated) {
            Mail::to($this->data['email'])->send(new PasswordMail($password));
            event(new Registered($user));
            session()->flash('success', 'User has been created.');
        } else {
            session()->flash('error', 'The user with this email already exists.');
        }
    }
}
