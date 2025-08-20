<?php

namespace App\Livewire\Guest;

use App\Models\User;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Reset Password')]
#[Layout('components.layouts.guest')]
class ResetPassword extends Component
{
    use AlertMessage, UserActivity;

    #[Locked]
    public string $token = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:64', 'exists:users,email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status != Password::PasswordReset) {
            $this->addError('email', __($status));
            return;
        }

        $user = User::where('email', $this->email)->first();
        $this->activity('Models/User', $user->id, 'update', 'User has reset their password successfully.');
        $this->reset(['email', 'password', 'password_confirmation']);
        $this->alert('success', 'Your password has been reset successfully. Please log in with your new password.');
        $this->redirectRoute('login', navigate: true);
    }

    public function render()
    {
        return view('livewire.guest.reset-password');
    }
}
