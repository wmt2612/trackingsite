<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClonedWebsite;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function clonedWebsites()
    {
        $clonedWebsites = ClonedWebsite::latest()->paginate(30);
        return view('admin.cloned_websites.index', compact('clonedWebsites'));
    }
}
