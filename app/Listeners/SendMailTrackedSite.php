<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Jobs\SendMailTrackedSiteJob;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class SendMailTrackedSite
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
     * @param  \App\Events\SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        $data = $event->data;
        $mailTo = explode(',', setting('mail_to'));
        dispatch(new SendMailTrackedSiteJob($data, $mailTo));
    }
}
