<?php

namespace App\Livewire\ControlPanel;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
#[Layout('components.layouts.control-panel')]
class Dashboard extends Component
{
    public function render()
    {
        Auth::logout();
        return view('livewire.control-panel.dashboard');
    }
}

