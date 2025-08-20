<?php

namespace App\Livewire\ControlPanel;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('My Profile')]
#[Layout('components.layouts.control-panel')]
class UserProfile extends Component
{
    public function render()
    {
        return view('livewire.control-panel.user-profile');
    }
}
