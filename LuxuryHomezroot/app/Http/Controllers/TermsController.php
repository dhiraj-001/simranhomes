<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerImage;

class TermsController extends Controller
{
    public function termsPage(Request $request)
    {
        
        $banner = Banner::with('images')->where('page', 'terms')->where('status', 1)->latest()->first();
        
        return view('Frontend.privacy-policy', compact('banner'));
    }
}