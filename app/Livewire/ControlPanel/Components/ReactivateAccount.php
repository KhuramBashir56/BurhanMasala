<?php

namespace App\Livewire\ControlPanel\Components;

use App\Models\User;
use App\Models\UserAccountStatus;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ReactivateAccount extends Component
{
    use AlertMessage, UserActivity;

    #[Locked]
    public $user = null;

    public string $description;

    public function mount(User $user)
    {
        if ($user->status === 'active') {
            return abort(404);
        }
        $this->user = $user;
    }

    public function reactivateAccount(): void
    {
        $this->authorize('reactivate-account');
        if (User::findOrFail($this->user->id)->status === 'active') {
            $this->alert('error', 'Account is already active, Please go back and check user profile.');
        } else {
            $this->validate([
                'description' => ['required', 'string', 'max:1000'],
            ]);
            try {
                DB::transaction(function () {
                    $this->user->status = 'active';
                    $this->user->update();
                    UserAccountStatus::create([
                        'user_id' => $this->user->id,
                        'type' => 'active',
                        'description' => $this->description,
                        'action_by' => Auth::user()->id,
                    ]);
                    $this->activity('App\Models\User', $this->user->id, 'update', 'Account reactivated successfully, description: ' . $this->description . '.');
                });
                $this->reset(['description']);
                $this->alert('success', 'Account reactivated successfully');
            } catch (\Throwable $th) {
                $this->alert('error', 'Something went wrong, please try again');
            }
        }
    }

    public function render()
    {
        $this->authorize('reactivate-account');
        return view('livewire.control-panel.components.reactivate-account');
    }
}
