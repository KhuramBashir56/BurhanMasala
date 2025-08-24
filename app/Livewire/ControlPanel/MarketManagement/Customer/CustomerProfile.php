<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('Customer Profile')]
#[Layout('components.layouts.control-panel')]
class CustomerProfile extends Component
{
    public $customer = null;

    public function mount($customer)
    {
        $customer = Customer::find($customer);
        if (!Auth::user()->hasRole(Role::find(1)->name) && Auth::user()->markets()->where('id', $customer->market_id)->exists()) {
            return abort(403);
        }
        $this->customer = $customer;
    }

    public function render()
    {
        return view('livewire.control-panel.market-management.customer.customer-profile');
    }
}
