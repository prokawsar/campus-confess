<?php

namespace App\Listeners;

use App\Events\UserComment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostComment
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
     * @param  UserComment  $event
     * @return void
     */
    public function handle(UserComment $event)
    {
        //
    }
}
