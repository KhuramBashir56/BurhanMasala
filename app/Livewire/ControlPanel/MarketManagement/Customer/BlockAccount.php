<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use App\Models\Customer;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Block Customer Account')]
#[Layout('components.layouts.control-panel')]
class BlockAccount extends Component
{
    public $customer;

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function render()
    {
        $this->authorize('block-customer-account');
        return view('livewire.control-panel.market-management.customer.block-account');
    }
}
