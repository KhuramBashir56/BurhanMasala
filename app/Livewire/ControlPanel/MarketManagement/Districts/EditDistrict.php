<?php

namespace App\Livewire\ControlPanel\MarketManagement\Districts;

use App\Models\District;
use App\Models\Province;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit District')]
#[Layout('components.layouts.control-panel')]
class EditDistrict extends Component
{
    use AlertMessage, UserActivity;

    public $provinces = [];

    #[Locked]
    public $district;

    public $province = '';

    public $name = '';

    public function mount(District $district): void
    {
        $this->district = $district;
        $this->province = $district->province_id;
        $this->name = $district->name;
        $this->provinces = Province::select('id', 'name')->orderBy('name')->get();
    }

    public function updateDistrict(): void
    {
        $this->authorize('edit-district');
        $this->validate([
            'province' => ['required', 'integer', 'exists:provinces,id'],
            'name' => ['required', 'string', 'max:48', 'unique:districts,name,' . $this->district->id],
        ]);
        try {
            DB::transaction(function () {
                $this->district->update([
                    'province_id' => $this->province,
                    'name' => $this->name,
                ]);
                $this->activity('App\Models\District', $this->district->id, 'update', 'name: ' . $this->name . 'province id: ' . $this->province);
            });
            $this->reset(['district', 'province', 'name']);
            $this->alert('success', 'District updated successfully.');
            $this->redirectRoute('control-panel.market-management.districts-list', navigate: true);
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        $this->authorize('edit-district');
        return view('livewire.control-panel.market-management.districts.edit-district');
    }
}
