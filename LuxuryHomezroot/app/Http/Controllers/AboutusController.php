<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\AboutUs;
use App\Models\Founder;
use App\Models\VisionMissionStrength;
use App\Models\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function editAbout()
    {
        $about = AboutUs::first();
        return view('Admin.abouts.edit', compact('about'));
    }

    public function updateAbout(Request $request)
    {
        $about = AboutUs::first();

        if (!$about) {
            $about = new AboutUs();
        }

        $about->subtitle = $request->input('subtitle');
        $about->heading = $request->input('heading');
        $about->description = $request->input('description');
        $about->save();

        return back()->with('success', 'About Us updated successfully.');
    }

    public function editFounder()
    {
        $founder = Founder::first();
        return view('Admin.abouts.founder', compact('founder'));
    }

    public function updateFounder(Request $request)
    {
        $founder = Founder::first();
        
         $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        
        
        if ($request->hasFile('image')) {
           $founder->image = $this->uploadImage($request->file('image'));
        }

        $founder->fill($request->only(['title', 'subtitle', 'description', 'name', 'designation']))->save();

        return back()->with('success', 'Founder info updated.');
    }

    public function editVms()
    {
        $vms = VisionMissionStrength::first();
        return view('Admin.abouts.vms', compact('vms'));
    }

    public function updateVms(Request $request)
    {
        $vms = VisionMissionStrength::first();

        if (!$vms) {
            $vms = new VisionMissionStrength();
        }

        $vms->fill($request->only(['visionTitle', 'missionTitle', 'strengthTitle', 'visionDescription', 'missionDescription', 'strengthDescription']));

        $vms->save();

        return back()->with('success', 'VMS updated successfully.');
    }
    
    
    
    public function aboutPage()
{
    $about = AboutUs::first();
    $founder = Founder::first();
    $vms = VisionMissionStrength::first();
    $builders = Builder::all();
    $banner = Banner::with('images')->where('page', 'about')->where('status', 1)->latest()->first();

    return view('Frontend.about-us', compact('about', 'founder', 'vms', 'builders', 'banner'));
}


private function uploadImage($image)
    {
        $filename = time() . '-' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('amenities/' . date('Y') . '/' . date('m'), $filename, 'public');
        return $path;
    }




}