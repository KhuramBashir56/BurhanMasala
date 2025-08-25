<?php

namespace App\Livewire\ControlPanel\Components;

use App\Models\User;
use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileImage extends Component
{
    use WithFileUploads, AlertMessage, UserActivity;

    #[Locked]
    public $user = null;

    public string $avatar = '';

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function updateProfileImage(): void
    {
        $this->authorize('update-profile-image');
        $this->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:512'],
        ]);
        try {
            DB::transaction(function () {
                if ($this->user->avatar) {
                    Storage::disk('public')->delete($this->user->avatar);
                }
                $this->user->update([
                    'avatar' => $this->avatar ? $this->avatar->store('user/avatars', 'public') : null,
                ]);
                $this->activity('App\Models\User', $this->user->id, 'update', 'Profile image updated successfully.');
            });
            $this->alert('success', 'Profile image updated successfully.');
        } catch (\Throwable $th) {
            $this->alert('error', 'Something went wrong, please try again.');
        }
    }

    public function render()
    {
        $this->authorize('update-profile-image');
        return view('livewire.control-panel.components.update-profile-image');
    }
}
