<?php

namespace App\Livewire\ControlPanel\MarketManagement\Cities;

use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit City')]
#[Layout('components.layouts.control-panel')]
class EditCity extends Component
{
    use AlertMessage, UserActivity;

    #[Locked]
    public $city;

    public $provinces = [];

    public $province = '';

    public $districts = [];

    public $district = '';

    public $name = '';

    public function mount(City $city): void
    {
        $this->city = $city;
        $this->province = $city->district->province_id;
        $this->district = $city->district_id;
        $this->name = $city->name;
        $this->provinces = Province::select('id', 'name')->orderBy('name')->get();
        $this->updatedProvince();
    }

    public function updatedProvince(): void
    {
        $this->districts = District::where('province_id', $this->province)->select('id', 'name')->orderBy('name')->get();
    }

    public function updateCity(): void
    {
        $this->authorize('edit-city');
        $this->validate([
            'province' => ['required', 'exists:provinces,id'],
            'district' => ['required', 'exists:districts,id'],
            'name' => ['required', 'string', 'max:48', 'unique:cities,name,' . $this->city->id],
        ]);
        try {
            DB::transaction(function () {
                $this->city->update([
                    'district_id' => $this->district,
                    'name' => $this->name,
                ]);
                $this->activity('App\Models\City', $this->city->id, 'update', 'name: ' . $this->name . 'district id: ' . $this->district);
            });
            $this->alert('success', 'City updated successfully.');
            $this->redirectRoute('control-panel.market-management.cities-list', navigate: true);
        } catch (\Throwable $th) {
            $this->alert('error', 'Failed to update city. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.control-panel.market-management.cities.edit-city');
    }
}
