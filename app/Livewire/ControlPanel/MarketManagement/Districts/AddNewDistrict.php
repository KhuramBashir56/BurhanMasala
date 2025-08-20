<?php

namespace App\Livewire\ControlPanel\MarketManagement\Districts;

use App\Models\District;
use App\Models\Province;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add New District')]
#[Layout('components.layouts.control-panel')]
class AddNewDistrict extends Component
{
    use AlertMessage, UserActivity;

    public $provinces = [];
    
    public $province = '';

    public $name = '';

    public function mount()
    {
        $this->provinces = Province::select('id', 'name')->orderBy('name')->get();
    }

    public function addNewDistrict()
    {
        $this->authorize('add-district');
        $this->validate([
            'province' => ['required', 'integer', 'exists:provinces,id'],
            'name' => ['required', 'string', 'max:48', 'unique:districts,name'],
        ]);
        try {
            DB::transaction(function () {
                $district =  District::create([
                    'province_id' => $this->province,
                    'name' => $this->name
                ]);
                $this->activity('App\Models\District', $district->id, 'create', 'name: ' . $district->name . 'province id: ' . $district->province_id);
            });
        } catch (\Throwable $th) {
            return $this->alert('error', 'Something went wrong. Please try again.');
        }
        $this->reset(['province', 'name']);
        $this->alert('success', 'District created successfully.');
    }

    public function render()
    {
        $this->authorize('add-district');
        return view('livewire.control-panel.market-management.districts.add-new-district');
    }
}
