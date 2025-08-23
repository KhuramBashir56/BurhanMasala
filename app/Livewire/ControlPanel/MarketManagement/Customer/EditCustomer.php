<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Customer')]
#[Layout('components.layouts.control-panel')]
class EditCustomer extends Component
{
    public function render()
    {
        return view('livewire.control-panel.market-management.customer.edit-customer');
    }
}
