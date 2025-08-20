<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    public $timestamps = false;

    protected $table = 'cities';

    protected $fillable = ['name', 'district_id'];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
