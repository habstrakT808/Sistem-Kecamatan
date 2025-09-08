<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Models\Activity;

class LogSuccessfulLogin
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // Pastikan user adalah instance dari User model
        if ($event->user instanceof User) {
            // Buat activity record secara manual tanpa menggunakan trait method
            Activity::create([
                'user_id' => $event->user->id,
                'log_name' => 'login',
                'description' => 'login ke sistem',
                'subject_type' => get_class($event->user),
                'subject_id' => $event->user->id,
                'properties' => [],
                'ip_address' => Request::ip(),
                'user_agent' => Request::userAgent(),
            ]);
        }
    }
}