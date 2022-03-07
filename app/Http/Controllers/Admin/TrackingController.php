<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendMail;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClonedSiteRequest;
use App\Models\ClonedWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class TrackingController extends Controller
{
    public function trackingClonedSite(ClonedSiteRequest $request)
    {
        $site = ClonedWebsite::whereSiteName($request->site_name)->whereIpAddress($request->ip_address)->first();
        if($site === null) {
            $clonedSite = ClonedWebsite::create([
                'site_name' => $request->site_name,
                'status' => 0,
                'ip_address' => $request->ip_address
            ]);
            Event::dispatch(new SendMail([
                'clonedSite' => $clonedSite,
                'content' => setting('mail_content'),
            ]));
            return response()->json([
                'status' => 'deactive',
                'message' => 'Happy hacking !!',
            ], 201);
        }
        return response()->json([
            'status' => $site->status === 1 ? 'active' : 'deactive',
            'message' => $site->alert_message,
        ], 200);
    }
}
