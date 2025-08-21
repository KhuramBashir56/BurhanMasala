<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCategory extends Model
{
    public $timestamps = false;

    protected $table = 'customer_categories';

    protected $fillable = ['name', 'description'];
}
