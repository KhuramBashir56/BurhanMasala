<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use App\Models\Customer;
use App\Models\CustomerCategory;
use App\Models\Market;
use App\Models\User;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Add New Customer')]
#[Layout('components.layouts.control-panel')]
class AddNewCustomer extends Component
{
    use WithFileUploads, AlertMessage, UserActivity;

    public $name = '';

    public $nic = '';

    public $market = '';

    public $markets = [];

    public $category = '';

    public $categories = [];

    public $title = '';

    public $phone = '';

    public $whatsapp = '';

    public $near_by = '';

    public $street = '';

    public $address = '';

    public $email = '';

    public $password = '';

    public $password_confirmation = '';

    public $confirm_password = '';

    public $avatar = '';

    public $location_view = '';

    public function mount(): void
    {
        $this->markets = Market::where('status', 'active')->select('id', 'name')->orderBy('name')->get();
        $this->categories = CustomerCategory::select('id', 'name')->orderBy('name')->get();
    }

    public function addNewCustomer(): void
    {
        $this->authorize('add-new-customer');
        $this->validate([
            'name' => ['required', 'string', 'max:48'],
            'nic' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]{5}-[0-9]{7}-[0-9]{1}$/', 'unique:users,nic'],
            'category' => ['required', 'integer', 'exists:customer_categories,id'],
            'market' => ['required', 'integer', 'exists:markets,id'],
            'title' => ['nullable', 'string', 'max:48'],
            'phone' => ['required', 'string', 'max:11', 'regex:/^03[0-9]{9}$/', 'unique:users,phone'],
            'whatsapp' => ['nullable', 'string', 'max:11', 'regex:/^03[0-9]{9}$/', 'unique:users,whatsapp'],
            'near_by' => ['required', 'string', 'max:96'],
            'street' => ['required', 'string', 'max:96'],
            'address' => ['required', 'string', 'max:160'],
            'email' => ['nullable', 'email', 'max:64', 'unique:users,email'],
            'password' => ['nullable', 'string', 'min:8', 'max:64', 'confirmed'],
            'confirm_password' => ['nullable', 'string', 'min:8', 'max:64', 'same:password'],
            'avatar' => ['nullable', 'image', 'max:512'],
            'location_view' => ['nullable', 'image', 'max:512'],
        ]);
        try {
            $this->authorize('add-new-customer');
            DB::transaction(function () {
                $user = User::create([
                    'name' => $this->name,
                    'nic' => $this->nic ? $this->nic : null,
                    'phone' => $this->phone,
                    'whatsapp' => $this->whatsapp ? $this->whatsapp : null,
                    'email' => $this->email ? $this->email : null,
                    'password' => $this->password ? Hash::make($this->password) : null,
                    'avatar' => $this->avatar ? $this->avatar->store('user/avatars', 'public') : null,
                ]);
                $customer = Customer::create([
                    'user_id' => $user->id,
                    'category_id' => $this->category,
                    'market_id' => $this->market,
                    'title' => $this->title,
                    'near_by' => $this->near_by,
                    'street' => $this->street,
                    'address' => $this->address,
                    'location_view' => $this->location_view ? $this->location_view->store('customer/location-views', 'public') : null,
                ]);
                $this->activity('App\Models\Customer', $customer->id, 'create', 'Added new customer: ' . $user->name);
            });
            $this->reset(['name', 'nic', 'market', 'category', 'title', 'phone', 'whatsapp', 'near_by', 'street', 'address', 'email', 'password', 'password_confirmation', 'confirm_password', 'avatar', 'location_view']);
            $this->alert('success', 'Customer added successfully.');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong. Please try again. ' . $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.control-panel.market-management.customer.add-new-customer');
    }
}
