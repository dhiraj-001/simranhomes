<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerImage;

class PrivacyController extends Controller
{
    public function privacyPage(Request $request)
    {
        
        $banner = Banner::with('images')->where('page', 'privacy')->where('status', 1)->latest()->first();
        
        return view('Frontend.privacy-policy', compact('banner'));
    }
}