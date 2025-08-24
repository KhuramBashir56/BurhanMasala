<?php

namespace App\Livewire\ControlPanel\Components;

use App\Models\User;
use App\Models\UserAccountStatus;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BlockAccount extends Component
{
    use AlertMessage, UserActivity;

    public $user = null;

    public $description;

    public function mount(User $user)
    {
        if ($user->status === 'inactive') {
            return abort(404);
        }
        return $this->user = $user;
    }

    public function blockAccount(): void
    {
        $this->authorize('block-account');
        if (User::findOrFail($this->user->id)->status === 'inactive') {
            $this->alert('error', 'Account is already blocked, Please go back and check user profile.');
        } else {
            $this->validate([
                'description' => ['required', 'string', 'max:1000'],
            ]);
            try {
                DB::transaction(function () {
                    $this->user->status = 'inactive';
                    $this->user->update();
                    UserAccountStatus::create([
                        'user_id' => $this->user->id,
                        'type' => 'block',
                        'description' => $this->description,
                        'action_by' => Auth::user()->id,
                    ]);
                    $this->activity('App\Models\User', $this->user->id, 'update', 'Account blocked successfully, reason: ' . $this->description . '.');
                });
                $this->reset(['description']);
                $this->alert('success', 'Account blocked successfully');
            } catch (\Throwable $th) {
                $this->alert('error', 'Something went wrong, please try again');
            }
        }
    }

    public function render()
    {
        return view('livewire.control-panel.components.block-account');
    }
}
