<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

trait HasActivity
{
    /**
     * Boot the trait for a model.
     */
    public static function bootHasActivity()
    {
        static::created(function ($model) {
            $model->recordActivity('create', 'membuat data baru');
        });

        static::updated(function ($model) {
            $model->recordActivity('update', 'memperbarui data');
        });

        static::deleted(function ($model) {
            $model->recordActivity('delete', 'menghapus data');
        });
    }

    /**
     * Record activity for the model.
     *
     * @param string $logName
     * @param string $description
     * @param array $properties
     * @return \App\Models\Activity
     */
    public function recordActivity($logName, $description, $properties = [])
    {
        return $this->activities()->create([
            'user_id' => Auth::id() ?? $this->id,
            'log_name' => $logName,
            'description' => $description,
            'properties' => $properties,
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }

    /**
     * Record login activity.
     *
     * @return \App\Models\Activity
     */
    public function recordLoginActivity()
    {
        return $this->recordActivity('login', 'login ke sistem');
    }

    /**
     * Get all activities for the model.
     */
    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }

    /**
     * Get all activities performed by the user.
     */
    public function userActivities()
    {
        return $this->hasMany(Activity::class, 'user_id');
    }
}