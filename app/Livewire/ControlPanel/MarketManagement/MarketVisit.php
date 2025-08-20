<?php

namespace App\Livewire\ControlPanel\MarketManagement;

use App\Models\Market;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class MarketVisit extends Component
{
    #[Title('Market Visit')]
    #[Layout('components.layouts.control-panel')]
    public function render()
    {
        return view('livewire.control-panel.market-management.market-visit',[
            'markets' => Market::all()
        ]);
    }
}
