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
use Livewire\Attributes\Title;
use Livewire\Component;

class AddNewMarket extends Component
{
    use AlertMessage, UserActivity;

    public $provinces = [];

    public $districts = [];

    public $cities = [];

    public string $name = '';

    public string $province = '';

    public string $district = '';

    public string $city = '';

    public string $description = '';

    public function mount(): void
    {
        $this->provinces = Province::select('id', 'name')->orderBy('name')->get();
    }

    public function updatedProvince(): void
    {
        $this->districts = District::where('province_id', $this->province)->select('id', 'name')->orderBy('name')->get();
        $this->cities = [];
        $this->district = '';
        $this->city = '';
    }

    public function updatedDistrict(): void
    {
        $this->cities = City::where('district_id', $this->district)->select('id', 'name')->orderBy('name')->get();
    }

    public function addNewMarket(): void
    {
        $this->authorize('add-new-market');
        $this->validate([
            'name' => ['required', 'string', 'max:48', 'unique:markets,name'],
            'province' => ['required', 'integer', 'exists:provinces,id'],
            'district' => ['required', 'integer', 'exists:districts,id'],
            'city' => ['required', 'integer', 'exists:cities,id'],
            'description' => ['required', 'string', 'max:1500'],
        ]);
        try {
            DB::transaction(function () {
                $market = Market::create([
                    'name' => $this->name,
                    'province_id' => $this->province,
                    'district_id' => $this->district,
                    'city_id' => $this->city,
                    'description' => $this->description,
                ]);
                $this->activity('App\Models\Market', $market->id, 'create', 'created a new market name: ' . $this->name . ' in province: ' . $this->province . ', district: ' . $this->district . ', city: ' . $this->city . ', description: ' . $this->description);
            });
            $this->reset(['province', 'district', 'city', 'name', 'description']);
            $this->alert('success', 'Market added successfully.');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    #[Title('Add New Market Area')]
    #[Layout('components.layouts.control-panel')]
    public function render()
    {
        $this->authorize('add-new-market');
        return view('livewire.control-panel.market-management.add-new-market');
    }
}
