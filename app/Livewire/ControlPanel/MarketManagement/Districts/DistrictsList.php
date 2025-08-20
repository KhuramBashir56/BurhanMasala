<?php

namespace App\Livewire\ControlPanel\MarketManagement\Districts;

use App\Models\District;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Districts List')]
#[Layout('components.layouts.control-panel')]
class DistrictsList extends Component
{
    public $searchQuery = '';

    public function search()
    {
        $this->searchQuery = $this->searchQuery;
    }

    public function render()
    {
        return view('livewire.control-panel.market-management.districts.districts-list', [
            'districts' => District::when(function ($searchQuery) {
                $searchQuery->where('name', 'LIKE', '%' . $this->searchQuery . '%')->orWhereHas('province', function ($province) {
                    $province->where('name', 'LIKE', '%' . $this->searchQuery . '%');
                });
            })->with('province:id,name')->select('id', 'name', 'province_id')->orderBy('name')->get()
        ]);
    }
}
