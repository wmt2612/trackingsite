<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClonedWebsite;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function clonedWebsites()
    {
        $clonedWebsites = ClonedWebsite::latest()->paginate(30);
        return view('admin.cloned_websites.index', compact('clonedWebsites'));
    }

    public function updateClonedWebsites($id)
    {
        $site = ClonedWebsite::findOrFail($id);
        $site->update([
            'status' => $site->status === 1 ? 0 : 1,
        ]);
        $message = 'Active site '.$site->site_name.' successfully !!';
        return back()->withSuccess($message);
    }

    public function updateAlertMessageSite(Request $request, $id)
    {
        $site = ClonedWebsite::findOrFail($id);
        $site->update([
            'alert_message' => $request->message
        ]);
        return response()->json([
            'message' => 'Send alert message successfully !'
        ], 200);
    }

    public function settings()
    {
        return view('admin.settings.index');
    }

    public function updateSettings(Request $request)
    {
        $keys = $request->only(['smtp_email', 'smtp_password', 'mail_to', 'mail_to_subject','mail_content']);
        foreach($keys as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        return back()->withSuccess('Update setting successfully !!');
    }

   
}
