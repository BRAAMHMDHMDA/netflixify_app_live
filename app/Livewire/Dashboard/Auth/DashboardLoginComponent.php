<?php

namespace App\Livewire\Dashboard\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class  DashboardLoginComponent extends Component
{
    #[Validate('required|string|email')]
    public $email;

    #[Validate('required|min:5')]
    public $password;

    #[Validate('nullable')]
    public $remember;


    public function login()
    {
        $this->validate();
        $this->ensureIsNotRateLimited();

        if (!Auth::guard('admin')->attempt($this->only('email', 'password'), $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        session()->regenerate();

        return redirect()->intended(route('dashboard.home'));
    }

    protected function throttleKey(): string
    {
        return Str::lower($this->email) . '|' . request()->ip();
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => "Too many login attempts. Try again in {$seconds} seconds.",
        ]);
    }

    public function render(): \Illuminate\View\View
    {
        return view('dashboard.auth.dashboard-login-component');
    }
}
