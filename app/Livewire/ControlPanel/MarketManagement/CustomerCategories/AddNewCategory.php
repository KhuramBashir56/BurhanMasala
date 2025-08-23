<?php

namespace App\Livewire\ControlPanel\MarketManagement\CustomerCategories;

use App\Models\CustomerCategory;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add New Customer Category')]
#[Layout('components.layouts.control-panel')]
class AddNewCategory extends Component
{
    use AlertMessage, UserActivity;

    public $name = '';

    public $description = '';

    public function addNewCustomerCategory(): void
    {
        $this->authorize('add-new-customer-category');
        $this->validate([
            'name' => ['required', 'string', 'max:48', 'unique:customer_categories,name'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);
        try {
            DB::transaction(function () {
                $category = CustomerCategory::create([
                    'name' => $this->name,
                    'description' => $this->description,
                ]);
                $this->activity('App\Models\CustomerCategory', $category->id, 'create', 'created a new customer category name: ' . $this->name . ', description: ' . $this->description);
            });
            $this->reset(['name', 'description']);
            $this->alert('success', 'Customer category added successfully.');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong. Please try again.');
        }
    }
    public function render()
    {
        $this->authorize('add-new-customer-category');
        return view('livewire.control-panel.market-management.customer-categories.add-new-category');
    }
}
