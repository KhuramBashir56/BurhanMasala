<?php

namespace App\Livewire\Guest;

use App\Models\User;
use App\Traits\UserActivity;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('Register')]
#[Layout('components.layouts.guest')]
class Register extends Component
{
    use UserActivity;

    public string $name = '';

    public string $phone = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $terms = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:48'],
            'phone' => ['required', 'digits:11', 'starts_with:03', 'unique:' . User::class . ',phone'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:64', 'unique:' . User::class . ',email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'terms' => ['accepted', 'boolean', 'required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        DB::transaction(function () use ($validated) {
            event(new Registered(($user = User::create($validated))));
            Auth::login($user);
            $user->assignRole(Role::where('id', 7)->firstOrFail()->name);
            $this->activity('Models/User', $user->id, 'create', 'User registered successfully.');
        });
        $this->reset(['name', 'phone', 'email', 'password', 'password_confirmation', 'terms']);
        $this->redirect(route('control-panel.dashboard', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.guest.register');
    }
}
