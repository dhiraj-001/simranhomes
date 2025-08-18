<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::with('images')->get();
        return view('Admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('Admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|in:home,about,developers,contact,property,blogs,location,privacy,terms',
            'type' => 'required|in:video,image',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20000',
        ]);

        $banner = new Banner();
        $banner->page = $request->page;
        $banner->type = $request->type;
        $banner->heading = $request->heading;
        $banner->sub_heading = $request->sub_heading;
        $banner->description = $request->description;
        $banner->status = $request->has('status') ? 1 : 0;

        if ($request->hasFile('video')) {
            $banner->video = $this->uploadMedia($request->file('video'), 'video');
        }

        $banner->save();

        // Save images in banner_images table
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imagePath = $this->uploadMedia($image, 'image');
                BannerImage::create([
                    'banner_id' => $banner->id,
                    'image' => $imagePath,
                    'sort_order' => $index,
                ]);
            }
        }
        
        

        return redirect()->route('Admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit($id)
    {
        $banner = Banner::with('images')->findOrFail($id);
        return view('Admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'page' => 'required|in:home,about,developers,contact,property,blogs,location,privacy,terms',
            'type' => 'required|in:video,image',
            'video' => 'nullable|mimes:mp4,mov,avi|max:20000',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20000',
            'sorted_image_ids' => 'nullable|array',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->page = $request->page;
        $banner->type = $request->type;
        $banner->heading = $request->heading;
        $banner->sub_heading = $request->sub_heading;
        $banner->description = $request->description;
        $banner->status = $request->has('status') ? 1 : 0;
        

        if ($request->hasFile('video')) {
            if ($banner->video) {
                Storage::disk('public')->delete($banner->video);
            }
            $banner->video = $this->uploadMedia($request->file('video'), 'video');
        }

        $banner->save();

        // New Images Upload
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $image) {
            $imagePath = $this->uploadMedia($image, 'image');
            BannerImage::create([
                'banner_id' => $banner->id,
                'image' => $imagePath,
                'sort_order' => 999 // will fix after sorting
            ]);
        }
    }

    // Handle sorting (after upload or reordering)
    if ($request->has('sorted_image_ids')) {
        foreach ($request->sorted_image_ids as $index => $imgId) {
            BannerImage::where('id', $imgId)->where('banner_id', $banner->id)
                ->update(['sort_order' => $index]);
        }
    }

        return redirect()->route('Admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = Banner::with('images')->findOrFail($id);

        if ($banner->video) {
            Storage::disk('public')->delete($banner->video);
        }

        foreach ($banner->images as $img) {
            Storage::disk('public')->delete($img->image);
            $img->delete();
        }

        $banner->delete();

        return redirect()->route('Admin.banners.index')->with('success', 'Banner deleted successfully.');
    }

    private function uploadMedia($file, $type)
    {
        $folder = $type === 'video' ? 'banners/videos' : 'banners/images';
        $filename = time() . '-' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($folder, $filename, 'public');
    }

    // Frontend Use
    public function bannerForPage($page)
    {
        return Banner::with('images')
            ->where('page', $page)
            ->where('status', 1)
            ->latest()
            ->first();
    }
}
