<?php

namespace App\Livewire\ControlPanel\MarketManagement;

use App\Models\City;
use App\Models\District;
use App\Models\Market;
use App\Models\Province;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditMarket extends Component
{
    use AlertMessage, UserActivity;

    #[Locked]
    public $market;

    public $provinces = [];

    public $districts = [];

    public $cities = [];

    public $name = '';

    public $province = '';

    public $district = '';

    public $city = '';

    public $description = '';

    public function mount(Market $market)
    {
        $this->market = $market;
        $this->name = $market->name;
        $this->province = $market->province_id;
        $this->district = $market->district_id;
        $this->city = $market->city_id;
        $this->description = $market->description;
        $this->provinces = Province::select('id', 'name')->orderBy('name')->get();
        $this->districts = District::where('province_id', $this->province)->select('id', 'name')->orderBy('name')->get();
        $this->cities = City::where('district_id', $this->district)->select('id', 'name')->orderBy('name')->get();
    }


    public function updatedProvince()
    {
        $this->districts = District::where('province_id', $this->province)->select('id', 'name')->orderBy('name')->get();
        $this->cities = [];
        $this->district = '';
        $this->city = '';
    }

    public function updatedDistrict()
    {
        $this->cities = City::where('district_id', $this->district)->select('id', 'name')->orderBy('name')->get();
    }

    public function updateMarket()
    {
        $this->authorize('edit-market-information');
        $this->validate([
            'name' => ['required', 'string', 'max:48', 'unique:markets,name,' . $this->market->id],
            'province' => ['required', 'integer', 'exists:provinces,id'],
            'district' => ['required', 'integer', 'exists:districts,id'],
            'city' => ['required', 'integer', 'exists:cities,id'],
            'description' => ['required', 'string', 'max:1500'],
        ]);
        try {
            DB::transaction(function () {
                $this->market->update([
                    'name' => $this->name,
                    'province_id' => $this->province,
                    'district_id' => $this->district,
                    'city_id' => $this->city,
                    'description' => $this->description,
                ]);
                $this->activity('App\Models\Market', $this->market->id, 'update', 'updated market information name: ' . $this->name . ' in province: ' . $this->province . ', district: ' . $this->district . ', city: ' . $this->city . ', description: ' . $this->description);
            });
        } catch (\Throwable $th) {
            return $this->alert('error', 'Something went wrong. Please try again.');
        }
        $this->alert('success', 'Market information updated successfully.');
        $this->redirectRoute('control-panel.market-management.markets-list', navigate: true);
    }

    #[Title('Edit Market Area')]
    #[Layout('components.layouts.control-panel')]
    public function render()
    {
        $this->authorize('edit-market-information');
        return view('livewire.control-panel.market-management.edit-market');
    }
}
