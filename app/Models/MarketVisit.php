<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketVisit extends Model
{
    const CREATED_AT = 'created_at';

    const UPDATED_AT = NULL;

    protected $table = 'market_visits';

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = ['shop_id', 'host_name', 'remarks', 'visiter_id'];

    protected $guarded = ['id'];
}
