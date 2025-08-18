<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerImage;

class ContactusController extends Controller
{
    public function conatctPage(Request $request)
    {
        
        $banner = Banner::with('images')->where('page', 'contact')->where('status', 1)->latest()->first();
        
        return view('Frontend.contact-us', compact('banner'));
    }
}