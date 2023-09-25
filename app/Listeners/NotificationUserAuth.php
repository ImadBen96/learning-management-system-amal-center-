<?php

namespace App\Listeners;

use App\Models\admin\Admin;
use App\Notifications\SendAuthNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Notification;

class NotificationUserAuth
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        $admin = Admin::where('id' , '1')->get();
        Log::info('before sending the auth');
        Log::info(json_encode($event->user));
        Log::info('after sending the auth');
        Notification::send($admin , new SendAuthNotification($event->user));
    }
}
