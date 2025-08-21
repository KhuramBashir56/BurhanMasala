<?php

namespace App\Livewire\ControlPanel\MarketManagement\CustomerCategories;

use App\Models\CustomerCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Customer Categories List')]
#[Layout('components.layouts.control-panel')]
class CategoriesList extends Component
{
    public function render()
    {
        $this->authorize('view-customer-categories-list');
        return view('livewire.control-panel.market-management.customer-categories.categories-list', [
            'categories' => CustomerCategory::select('id', 'name', 'description')->orderBy('name')->get()
        ]);
    }
}
