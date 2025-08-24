<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccountStatus extends Model
{
    const CREATED_AT = 'created_at';

    const UPDATED_AT = NULL;

    protected $table = 'user_account_status';

    protected $fillable = ['type', 'description', 'user_id', 'action_by'];
}
