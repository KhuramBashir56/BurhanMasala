<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    public $timestamps = false;

    protected $table = 'markets';

    protected $fillable = ['name', 'province_id', 'district_id', 'city_id', 'description'];

    protected $guarded = ['id', 'status'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
