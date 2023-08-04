<?php

namespace App\Providers;

use App\Providers\LoginHistory;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;


/**
 * jest toklasa listenera
 */
class StoreUserLoginHistory
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
     * @param  \App\Providers\LoginHistory  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $userinfo = $event->user;
        //zapisanie do tabeli login history danych w momencie logoowania
        $saveHistory = DB::table('login_history')->insert(
            [
                'name' => $userinfo->name,
                'email' => $userinfo->email,
                'created_at' => $current_timestamp,
                'updated_at' => $current_timestamp
            ]
        );
        return $saveHistory;
    }
}
