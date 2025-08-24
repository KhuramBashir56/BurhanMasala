<?php

namespace App\Livewire\ControlPanel\MarketManagement\Categories;

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
        return view('livewire.control-panel.market-management.categories.categories-list', [
            'categories' => CustomerCategory::with([
                'customers:id,category_id'
            ])->select('id', 'name', 'description')->orderBy('name')->get()
        ]);
    }
}
