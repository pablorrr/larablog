<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{/*ogolna charakterystyka
 events to jest technologia ktora umozliwia prowadzenie nalsuchu wylapywanie zdarzen
a nastepnie umozliwienie szybszej pracy w tle poprzez wprowadzanie rownleglych  kilku operacji w tym samym
czasie (hiperwatkowsc)

*/
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],//rejestracja detektrora -listenera https://dev.to/kingsconsult/laravel-8-events-and-listeners-with-practical-example-9m7
        LoginHistory::class => [ //klasa zdarzen
            StoreUserLoginHistory::class, //detektor
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
