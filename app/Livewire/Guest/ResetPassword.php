<?php

namespace App\Livewire\Guest;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Reset Password')]
#[Layout('components.layouts.guest')]
class ResetPassword extends Component
{
    public function render()
    {
        return view('livewire.guest.reset-password');
    }
}
