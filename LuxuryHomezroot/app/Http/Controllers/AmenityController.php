<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all();
        return view('Admin.amenities.index', compact('amenities'));
    }

    public function create()
    {
        return view('Admin.amenities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // Add other validation rules as necessary
        ]);

        $amenity = new Amenity();
        $amenity->title = $request->title;
        $amenity->status = $request->status;
        
        // Handle the main image upload
        if ($request->hasFile('image')) {
            $amenity->image = $this->uploadImage($request->file('image'));
        }

        $amenity->save();

        return redirect()->route('Admin.amenities.index')->with('success', 'Amenity added successfully!');
    }

    public function edit($id)
    {
        $amenity = Amenity::findOrFail($id);
        return view('Admin.amenities.edit', compact('amenity'));
    }

    public function update(Request $request, $id)
    {
        $amenity = Amenity::findOrFail($id);

        // Update amenity details
        $amenity->title = $request->title;
        $amenity->status = $request->status;

        // Handle main image upload
        if ($request->hasFile('image')) {
            $amenity->image = $this->uploadImage($request->file('image'));
        }
        

        $amenity->save();

        return redirect()->route('Admin.amenities.index')->with('success', 'amenity updated successfully!');
    }

    public function destroy($id)
    {
        $amenity = Amenity::findOrFail($id);
        $amenity->delete();

        return redirect()->route('Admin.amenities.index')->with('success', 'Amenities deleted successfully!');
    }

    private function uploadImage($image)
    {
        $filename = time() . '-' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('amenities/' . date('Y') . '/' . date('m'), $filename, 'public');
        return $path;
    }
    
   

}