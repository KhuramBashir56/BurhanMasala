<?php

namespace App\Livewire\ControlPanel\MarketManagement;

use App\Models\Market;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Role;

#[Title('Markets List')]
#[Layout('components.layouts.control-panel')]
class MarketsList extends Component
{
    use AlertMessage, UserActivity;

    public string $searchQuery = '';

    public function search(): void
    {
        $this->searchQuery = $this->searchQuery;
    }

    public function changeMarketStatus(Market $market): void
    {
        $this->authorize('change-market-status');
        try {
            DB::transaction(function () use ($market) {
                $market->status = $market->status === 'active' ? 'inactive' : 'active';
                $market->update();
                $this->activity('App\Models\Market', $market->id, 'update', 'Market status changed as ' . $market->status);
            });
            $this->alert('success', 'Market status changed successfully');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong, please try again');
        }
    }

    public function render()
    {
        $this->authorize('view-markets-list');
        return view('livewire.control-panel.market-management.markets-list', [
            'markets' => Market::with([
                'customers:id,market_id',
                'province:id,name',
                'district:id,name',
                'city:id,name'
            ])->when($this->searchQuery, function ($searchQuery) {
                $searchQuery->whereAny(['name', 'description'], 'LIKE', '%' . $this->searchQuery . '%');
            })->when(!Auth::user()->hasRole(Role::find(1)->name), function ($query) {
                $query->whereIn('id', Auth::user()->markets()->pluck('market_id')->toArray());
            })->select('id', 'name', 'province_id', 'district_id', 'city_id', 'description', 'status')->orderBy('name')->get()
        ]);
    }
}
