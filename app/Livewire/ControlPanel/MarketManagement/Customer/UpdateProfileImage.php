<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use App\Models\Customer;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Update Customer Profile Image')]
#[Layout('components.layouts.control-panel')]
class UpdateProfileImage extends Component
{
    #[Locked]
    public $customer;

    public function mount(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function render()
    {
        $this->authorize('edit-customer-profile-image');
        return view('livewire.control-panel.market-management.customer.update-profile-image');
    }
}
