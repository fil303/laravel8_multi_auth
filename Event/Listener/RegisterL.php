<?php

namespace App\Listeners;

use App\Events\RegisterE;
use App\Jobs\TestJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterL
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
     * @param  RegisterE  $event
     * @return void
     */
    public function handle(RegisterE $event)
    {
       TestJob::dispatch()->delay(now()->addSeconds(5));
    }
}
