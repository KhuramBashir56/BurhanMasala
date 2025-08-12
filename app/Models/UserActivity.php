<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    const CREATED_AT = 'created_at';

    const UPDATED_AT = NULL;

    protected $table = 'activities';

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = ['user_id', 'model', 'model_id', 'type', 'description', 'ip_address', 'user_agent'];

    protected $guarded = ['id'];
}
