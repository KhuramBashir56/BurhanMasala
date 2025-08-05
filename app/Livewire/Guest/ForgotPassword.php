<?php

namespace App\Livewire\Guest;

use App\Mail\Guest\ForgotPasswordLink;
use App\Models\User;
use App\Traits\AlertMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Password')]
#[Layout('components.layouts.guest')]
class ForgotPassword extends Component
{
    use AlertMessage;

    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email'],
        ]);

        $user = User::where('email', $this->email)->first();
        $token = Password::createToken($user);
        Mail::to($this->email)->send(new ForgotPasswordLink($user, $token));
        $this->alert(type: 'success', message: __('A reset link has been sent to your email address.'));
    }

    public function render()
    {
        return view('livewire.guest.forgot-password');
    }
}
