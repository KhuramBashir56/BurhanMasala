<?php

namespace App\Livewire\ControlPanel\MarketManagement\Cities;

use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add New City')]
#[Layout('components.layouts.control-panel')]
class AddNewCity extends Component
{
    use AlertMessage, UserActivity;

    public array $provinces = [];

    public string $province = '';

    public array $districts = [];

    public string $district = '';

    public string $name = '';

    public function mount(): void
    {
        $this->provinces = Province::select('id', 'name')->orderBy('name')->get();
    }

    public function updatedProvince(): void
    {
        $this->districts = District::where('province_id', $this->province)->select('id', 'name')->orderBy('name')->get();
    }

    public function addNewCity(): void
    {
        $this->authorize('add-new-city');
        $this->validate([
            'province' => ['required', 'integer', 'exists:provinces,id'],
            'district' => ['required', 'integer', 'exists:districts,id'],
            'name' => ['required', 'string', 'max:48', 'unique:cities,name'],
        ]);
        try {
            DB::transaction(function () {
                $city =  City::create([
                    'name' => $this->name,
                    'district_id' => $this->district
                ]);
                $this->activity('App\Models\City', $city->id, 'create', 'name: ' . $city->name . 'district id: ' . $city->district_id);
            });
            $this->reset(['province', 'district', 'name']);
            $this->alert('success', 'City created successfully.');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        $this->authorize('add-new-city');
        return view('livewire.control-panel.market-management.cities.add-new-city');
    }
}
