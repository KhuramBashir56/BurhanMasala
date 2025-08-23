<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Customers List')]
#[Layout('components.layouts.control-panel')]
class CustomersList extends Component
{
    public function render()
    {
        return view('livewire.control-panel.market-management.customer.customers-list');
    }
}
