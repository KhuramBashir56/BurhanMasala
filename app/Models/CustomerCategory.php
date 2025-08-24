<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerCategory extends Model
{
    public $timestamps = false;

    protected $table = 'customer_categories';

    protected $fillable = ['name', 'description'];

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class, 'category_id', 'id');
    }
}
