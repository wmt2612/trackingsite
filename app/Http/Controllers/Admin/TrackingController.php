<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendMail;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClonedSiteRequest;
use App\Models\ClonedWebsite;
use App\Models\ClonedWebsiteStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class TrackingController extends Controller
{
    protected $site = '';
    protected $timeCache = 30;
    protected $numberRequest = 3;
    protected $timeRequest = 30;
    public function trackingClonedSite(ClonedSiteRequest $request)
    {
        $excute = RateLimiter::attempt(
            'get-site:'.$request->ip_address,
            $perTenMinutesRequest = $this->numberRequest,
            function () use ($request) {
                $this->site = Cache::remember('site:'.$request->ip_address, 60 * $this->timeCache, function () use ($request) {
                    return ClonedWebsite::whereSiteName($request->site_name)->whereIpAddress($request->ip_address)->first();
                });
            },
            $seconds = 60 * $this->timeRequest
        );
        if (!$excute) {
            return response()->json([
                'message' => 'Blocked by Webmaster Vietnam !',
                'status' => 'deactive'
            ]);
        } else {
            if ($this->site === null) {
                $clonedSite = ClonedWebsite::create([
                    'site_name' => $request->site_name,
                    'status' => 0,
                    'ip_address' => $request->ip_address
                ]);
                Event::dispatch(new SendMail([
                    'clonedSite' => $clonedSite,
                    'content' => setting('mail_content'),
                ]));
            }
            if($this->site !== '') {
                return response()->json([
                    'status' => $this->site->status === ClonedWebsiteStatus::Active ? 'active' : 'deactive',
                    'message' => $this->site->alert_message,
                ], 200);
            }
            return response()->json([
                'message' => 'Blocked by Webmaster Vietnam!',
                'status' => 'deactive'
            ], 200);
        }
    }
}
