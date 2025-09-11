<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            $model->logActivity('created');
        });

        static::updated(function ($model) {
            $model->logActivity('updated');
        });

        static::deleted(function ($model) {
            $model->logActivity('deleted');
        });
    }

    protected function logActivity($event)
    {
        $userId = Auth::id();
        $desaId = Auth::check() ? Auth::user()->desa_id : null;

        Activity::create([
            'user_id' => $userId,
            'desa_id' => $desaId,
            'log_name' => $event,
            'description' => $this->getActivityDescription($event),
            'subject_type' => get_class($this),
            'subject_id' => $this->id,
            'properties' => $this->getActivityProperties($event),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    protected function getActivityDescription($event)
    {
        $modelName = class_basename($this);
        return ucfirst($event) . ' ' . $modelName;
    }

    protected function getActivityProperties($event)
    {
        $properties = [];
        
        if ($event === 'updated') {
            $properties['old'] = array_intersect_key($this->getOriginal(), $this->getDirty());
            $properties['attributes'] = $this->getDirty();
        } else {
            $properties['attributes'] = $this->getAttributes();
        }

        return $properties;
    }
}