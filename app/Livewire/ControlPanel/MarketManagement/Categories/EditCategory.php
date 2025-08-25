<?php

namespace App\Livewire\ControlPanel\MarketManagement\Categories;

use App\Models\CustomerCategory;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Customer Category')]
#[Layout('components.layouts.control-panel')]
class EditCategory extends Component
{
    use AlertMessage, UserActivity;

    #[Locked]
    public $category;

    public string $name = '';

    public string $description = '';

    public function mount(CustomerCategory $category): void
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function updateCustomerCategory(): void
    {
        $this->authorize('edit-customer-category');
        $this->validate([
            'name' => ['required', 'string', 'max:48', 'unique:customer_categories,name,' . $this->category->id],
            'description' => ['nullable', 'string', 'max:255'],
        ]);
        try {
            DB::transaction(function () {
                $this->category->update([
                    'name' => $this->name,
                    'description' => $this->description,
                ]);
                $this->activity('App\Models\CustomerCategory', $this->category->id, 'update', 'updated a customer category name: ' . $this->name . ', description: ' . $this->description);
            });
            $this->alert('success', 'Customer category updated successfully.');
            $this->redirectRoute('control-panel.market-management.customer-categories-list', navigate: true);
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        $this->authorize('edit-customer-category');
        return view('livewire.control-panel.market-management.categories.edit-category');
    }
}
