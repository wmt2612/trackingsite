<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClonedSiteRequest;
use App\Models\ClonedWebsite;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function trackingClonedSite(ClonedSiteRequest $request)
    {
        ClonedWebsite::create([
            'site_name' => $request->site_name,
            'status' => 0,
        ]);
        return response()->json('Happy hacking', 200);
    }
}
