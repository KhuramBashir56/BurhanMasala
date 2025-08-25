<?php

namespace App\Livewire\ControlPanel\MarketManagement\Cities;

use App\Models\City;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Districts List')]
#[Layout('components.layouts.control-panel')]
class CitiesList extends Component
{
    public string $searchQuery = '';

    public function search(): void
    {
        $this->searchQuery = $this->searchQuery;
    }

    public function render()
    {
        return view('livewire.control-panel.market-management.cities.cities-list', [
            'cities' => City::with([
                'district:id,name,province_id',
                'district.province:id,name'
            ])->when($this->searchQuery, function ($searchQuery) {
                $searchQuery->where(function ($city) {
                    $city->where('name', 'LIKE', '%' . $this->searchQuery . '%')->orWhereHas('district', function ($district) {
                        $district->where('name', 'LIKE', '%' . $this->searchQuery . '%')->orWhereHas('province', function ($province) {
                            $province->where('name', 'LIKE', '%' . $this->searchQuery . '%');
                        });
                    });
                });
            })->select('id', 'name', 'district_id')->orderBy('name')->get()
        ]);
    }
}
