<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['title', 'user_id', 'market_id', 'category_id', 'near_by', 'street', 'address', 'location_view'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function market(): BelongsTo
    {
        return $this->belongsTo(Market::class, 'market_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CustomerCategory::class, 'category_id', 'id');
    }

    public function visit(): HasOne
    {
        return $this->hasOne(MarketVisit::class, 'customer_id', 'id')->whereDate('created_at', Carbon::today())->latestOfMany();
    }

    public function visits(): HasMany
    {
        return $this->hasMany(MarketVisit::class, 'customer_id', 'id');
    }
}
