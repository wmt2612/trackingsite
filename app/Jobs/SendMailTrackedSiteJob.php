<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class SendMailTrackedSiteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $mailTo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $mailTo)
    {
        $this->data= $data;
        $this->mailTo = $mailTo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $receiveMails = $this->mailTo;
        Config::set('mail.mailers.smtp.username', setting('smtp_email'));
        Config::set('mail.mailers.smtp.password', setting('smtp_password'));
        Mail::send('mails.tracking', $this->data, function($message) use($receiveMails) {
            $message->to($receiveMails)
                    ->subject(setting('mail_to_subject') ?? 'Tracked Site: Detecting unauthorized theme clone website');
            $message->from(setting('smtp_email'),'Webmaster Tracking Site');
        });
    }
}
