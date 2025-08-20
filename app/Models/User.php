<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = ['name', 'nic', 'phone', 'email', 'password', 'avatar', 'terms'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'terms' => 'boolean',
        ];
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'user_id', 'id');
    }

    public function getOnlineAttribute(): bool
    {
        return DB::table('sessions')->where('user_id', $this->id)->where('last_activity', '>=', now()->subMinutes(5)->timestamp)->exists();
    }

    public function getLastSeenAttribute()
    {
        $lastActivity = DB::table('sessions')->where('user_id', $this->id)->orderByDesc('last_activity')->value('last_activity');
        return $lastActivity ? now()->createFromTimestamp($lastActivity)->diffForHumans() : null;
    }

    public function initials(): string
    {
        return Str::of($this->name)->explode(' ')->take(2)->map(fn($word) => Str::substr($word, 0, 1))->implode('');
    }

    public function markets(): BelongsToMany
    {
        return $this->belongsToMany(Market::class, 'user_has_markets', 'user_id', 'market_id');
    }
}
