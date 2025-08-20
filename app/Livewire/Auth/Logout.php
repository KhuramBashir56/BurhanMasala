<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Logout extends Component
{
    public function __invoke()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect('/');
    }
}
