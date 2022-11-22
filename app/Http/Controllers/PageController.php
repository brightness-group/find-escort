<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index($slug)
    {
        $cmsPage = Page::whereSlug($slug)->firstOrFail();

        return view('pages.cms', compact('cmsPage'));
    }

    public function getContactUs(Request $request)
    {
        return view('pages.contact-us');
    }

    public function getDiscover(Request $request)
    {
        return view('pages.discover');
    }
}
