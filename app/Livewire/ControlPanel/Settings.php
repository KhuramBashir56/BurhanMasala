<?php

namespace App\Livewire\ControlPanel;

use App\Traits\AlertMessage;
use App\Traits\UserActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Control Panel Settings')]
#[Layout('components.layouts.control-panel')]
class Settings extends Component
{
    use AlertMessage, UserActivity;

    public $sessions = [];

    public function mount()
    {
        $this->sessions = Auth::user()->sessions()->orderBy('last_activity', 'desc')->get()->map(function ($session) {
            $agent = new Agent();
            $agent->setUserAgent($session->user_agent);
            return (object) [
                'id' => $session->id,
                'user_agent' => $session->user_agent,
                'platform' => $agent->platform() ?? 'Unknown OS',
                'browser' => $agent->browser() ?? 'Unknown Browser',
                'device' => $agent->device(),
                'ip_address' => $session->ip_address,
                'last_activity' => $session->last_activity,
            ];
        });
    }

    public $current_password = '';

    public $password = '';

    public $password_confirmation = '';

    public function updatePassword()
    {
        $this->validate([
            'current_password' => ['required', 'string', 'min:8', 'max:64', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'max:64', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8', 'max:64'],
        ]);
        try {
            DB::transaction(function () {
                Auth::user()->update([
                    'password' => bcrypt($this->password),
                ]);
                $this->activity('User', Auth::user()->id, 'update', 'Password changed successfully.');
            });
            $this->reset(['current_password', 'password', 'password_confirmation']);
            return $this->alert('success', 'Password updated successfully. Please do not forget your new password. You will need it to log in next time.');
        } catch (\Throwable $th) {
            return $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function logoutSession($sessionId)
    {
        $user = Auth::user();
        try {
            DB::transaction(function () use ($sessionId, $user) {
                DB::table('sessions')->where('id', $sessionId)->where('user_id', $user->id)->delete();
                $this->activity('User', $user->id, 'delete', 'Logged out successfully from session ID: ' . $sessionId);
            });
            return redirect()->route('control-panel.settings')->with([
                'type' => 'success',
                'message' => 'Logged out successfully from this session.',
            ]);
        } catch (\Throwable $th) {
            return $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function logoutAllSession()
    {
        $user = Auth::user();
        try {
            DB::transaction(function () use ($user) {
                DB::table('sessions')->where('user_id', $user->id)->delete();
                $this->activity('User', $user->id, 'delete', 'Logged out successfully.');
            });
            Auth::logout();
            return redirect()->route('login')->with([
                'type' => 'success',
                'message' => 'Logged out successfully from all devices.',
            ]);
        } catch (\Throwable $th) {
            return $this->alert('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.control-panel.settings', [
            'sessions' => $this->sessions,
        ]);
    }
}
