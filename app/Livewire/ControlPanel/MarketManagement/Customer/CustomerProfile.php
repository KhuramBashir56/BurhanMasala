<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Customer Profile')]
#[Layout('components.layouts.control-panel')]
class CustomerProfile extends Component
{
    public function render()
    {
        return view('livewire.control-panel.market-management.customer.customer-profile');
    }
}
