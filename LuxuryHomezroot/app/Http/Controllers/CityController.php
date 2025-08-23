<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\City;
use App\Models\Property;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('Admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('Admin.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_name' => 'required|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
        ]);

        $city = new City();
        $city->city_name = $request->city_name;
        $city->slug = $request->slug;
        $city->punchline = $request->punchline;
        $city->short_content = $request->short_content;
        $city->status = $request->status;

        // Handle the main image upload
        if ($request->hasFile('main_image')) {
            $city->main_image = $this->uploadImage($request->file('main_image'));
        }
       

        $city->save();

        return redirect()->route('Admin.cities.index')->with('success', 'City added successfully!');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('Admin.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        
        $request->validate([
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512',
        ]);

        // Update Location details
        $city->city_name = $request->city_name;
        $city->slug = $request->slug;
        $city->punchline = $request->punchline;
        $city->short_content = $request->short_content;
        $city->status = $request->status;

        // Handle main image upload
        if ($request->hasFile('main_image')) {
            $city->main_image = $this->uploadImage($request->file('main_image'));
        }

        $city->save();

        return redirect()->route('Admin.cities.index')->with('success', 'City updated successfully!');
    }
    
    
    public function updateOrder(Request $request)
{
    $request->validate([
        'id' => 'required|exists:cities,id',
        'order_number' => 'required|integer|min:0',
    ]);

    $city = City::findOrFail($request->id);

    // Allow duplicate 0, but disallow duplicate non-zero numbers
    if ($request->order_number != 0) {
        $duplicate = City::where('order_number', $request->order_number)
                         ->where('id', '!=', $request->id)
                         ->exists();

        if ($duplicate) {
            return response()->json([
                'status' => 'error',
                'message' => 'This order number is already used. Please choose another.'
            ]);
        }
    }

    $city->order_number = $request->order_number;
    $city->save();

    return response()->json([
        'status' => 'success',
        'message' => 'Order updated successfully.'
    ]);
}


    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        
        // Automatically adjust auto-increment ID in MySQL (optional)
        DB::statement('ALTER TABLE cities AUTO_INCREMENT = ' . (City::max('id') + 1));

        return redirect()->route('Admin.cities.index')->with('success', 'City deleted successfully!');
    }


    private function uploadImage($image)
    {
        $filename = time() . '-' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('cities/' . date('Y') . '/' . date('m'), $filename, 'public');
        return $path;
    }

   
   
   public function locationPage()
{
    $cities = City::all(); 
    $testimonials = Testimonial::paginate(15);
    $banner = Banner::with('images')->where('page', 'location')->where('status', 1)->latest()->first();
    return view('Frontend.locations', compact('cities', 'banner','testimonials'));
}

public function showCityProperties($slug)
{
    $city = City::where('slug', $slug)->where('status', 1)->first();
    $cities = City::all();
    $banner = Banner::with('images')->where('page', 'property')->where('status', 1)->latest()->first();
    $testimonials = Testimonial::paginate(15);

    if (!$city) {
        abort(404, 'City not found.');
    }

    $properties = Property::where('property_city_wise', $city->slug) // Or $city->id if ID is used
                          ->where('status', 1)
                          ->paginate(15);

    return view('Frontend.properties.all', compact('city', 'properties','banner','testimonials', 'cities'));
}
   

}