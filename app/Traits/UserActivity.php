<?php

namespace App\Traits;

use App\Models\UserActivity as ModelsUserActivity;
use Illuminate\Support\Facades\Auth;

trait UserActivity
{
    public function activity($model, $model_id, $type, $description)
    {
        ModelsUserActivity::create([
            'model' => $model,
            'model_id' => $model_id,
            'type' => $type,
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->header('User-Agent'),
            'user_id' => Auth::user()->id ?? null
        ]);
    }
}
