<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['title', 'user_id', 'market_id', 'customer_category_id', 'near_by', 'street', 'address', 'location_view'];
}
