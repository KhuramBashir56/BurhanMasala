<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MarketVisit extends Model
{
    const CREATED_AT = 'created_at';

    const UPDATED_AT = NULL;

    protected $table = 'market_visits';

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = ['customer_id', 'host_name', 'remarks', 'visiter_id'];

    protected $guarded = ['id'];

    public function visiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'visiter_id', 'id');
    }
}
