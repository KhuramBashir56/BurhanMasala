<?php

namespace App\Livewire\ControlPanel\MarketManagement\Customer;

use App\Models\Customer;
use App\Models\CustomerCategory;
use App\Models\Market;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Title('Customers List')]
#[Layout('components.layouts.control-panel')]
class CustomersList extends Component
{
    use WithPagination;

    public string $searchQuery = '';

    public string $market = '';

    public string $category = '';

    public function search(): void
    {
        $this->searchQuery = $this->searchQuery;
    }

    public function resetFilters(): void
    {
        $this->reset(['searchQuery', 'market', 'category']);
    }

    public function render()
    {
        $this->authorize('view-customers-list');
        return view('livewire.control-panel.market-management.customer.customers-list', [
            'customers' => Customer::when(!Auth::user()->hasRole(Role::find(1)->name), function ($query) {
                $query->whereIn('market_id', Auth::user()->markets()->pluck('market_id')->toArray());
            })->where(function ($user) {
                $user->where('user_id', '!=', Auth::user()->id);
            })->with([
                'category:id,name',
                'market:id,province_id,district_id,city_id,name',
                'market.province:id,name',
                'market.district:id,name',
                'market.city:id,name',
                'visits:id,customer_id',
                'user:id,name,phone,status'
            ])->when($this->searchQuery, function ($searchQuery) {
                $searchQuery->where(function ($shopQuery) {
                    $shopQuery->whereAny(['title', 'street', 'address', 'near_by'], 'LIKE', '%' . $this->searchQuery . '%')->orWhereHas('user', function ($userQuery) {
                        $userQuery->whereAny(['name', 'phone', 'email', 'whatsapp', 'nic'], 'LIKE', '%' . $this->searchQuery . '%');
                    });
                });
            })->when($this->market, function ($marketQuery) {
                $marketQuery->where('market_id', $this->market);
            })->when($this->category, function ($categoryQuery) {
                $categoryQuery->where('category_id', $this->category);
            })->select('id', 'user_id', 'market_id', 'category_id', 'title', 'near_by', 'street', 'address')->paginate(100),
            'markets' => Market::when(!Auth::user()->hasRole(Role::find(1)->name), function ($query) {
                $query->whereIn('id', Auth::user()->markets()->pluck('market_id')->toArray());
            })->select('id', 'name')->orderBy('name')->get(),
            'categories' => CustomerCategory::select('id', 'name')->orderBy('name')->get()
        ]);
    }
}
