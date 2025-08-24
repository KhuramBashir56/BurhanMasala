<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use App\Models\Customer;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Reactive Customer Account')]
#[Layout('components.layouts.control-panel')]
class ReactiveAccount extends Component
{
    public $customer;

    public function mount(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function render()
    {
        $this->authorize('reactivate-customer-account');
        return view('livewire.control-panel.market-management.customer.reactive-account');
    }
}
