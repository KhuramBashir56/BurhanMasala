<?php

namespace App\Livewire\Guest;

use App\Mail\Guest\ForgotPasswordLink;
use App\Models\User;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Password')]
#[Layout('components.layouts.guest')]
class ForgotPassword extends Component
{
    use AlertMessage, UserActivity;

    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email', 'max:64', 'exists:users,email'],
        ]);

        $user = User::where('email', $this->email)->first();

        if ($user->status !== 'active') {
            $this->alert('warning', 'Your account is not active. Please contact the administrator for account activation at :email:' . config('app.email') . '.');
            return;
        }

        DB::transaction(function () use ($user) {
            $token = Password::createToken($user);
            Mail::to($this->email)->send(new ForgotPasswordLink($user, $token));
            $this->activity('Models/User', $user->id, 'create', 'Password reset token created and sent via email.');
        });
        $this->reset('email');
        $this->alert(type: 'success', message: __('A reset link has been sent to your email address.'));
    }

    public function render()
    {
        return view('livewire.guest.forgot-password');
    }
}
