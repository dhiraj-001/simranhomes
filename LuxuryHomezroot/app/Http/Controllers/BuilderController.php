<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\Builder;
use App\Models\City;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class builderController extends Controller
{
    public function index()
    {
        $builders = Builder::all();
        return view('Admin.builders.index', compact('builders'));
    }

    public function create()
    {
        $cities = DB::table('cities')->get();
        return view('Admin.builders.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cities' => 'required|array',
            'cities.*' => 'exists:cities,id',
            'years_of_experience' => 'nullable|integer|min:0',
            'total_projects' => 'nullable|integer|min:0',
            'total_cities' => 'nullable|integer|min:0',
            // Add other validation rules as necessary
        ]);

        $builder = new Builder();
        $builder->name = $request->name;
        $builder->slug = $request->slug;
        $builder->content = $request->content;
        $builder->status = $request->status;
        $builder->years_of_experience = $request->years_of_experience;
        $builder->total_projects = $request->total_projects;
        $builder->total_cities = $request->total_cities;
        
        // Handle the main image upload
        if ($request->hasFile('logo')) {
            $builder->logo = $this->uploadImage($request->file('logo'));
        }

        $builder->save();
        
        // Save cities (many-to-many relation)
        $builder->cities()->sync($request->cities);

        return redirect()->route('Admin.builders.index')->with('success', 'Builder added successfully!');
    }

    public function edit($id)
    {
        $builder = Builder::findOrFail($id);
        $cities = City::all();
        return view('Admin.builders.edit', compact('builder', 'cities'));
    }

    public function update(Request $request, $id)
    {
    $builder = Builder::findOrFail($id);
    
    

    $request->validate([
        'name' => 'required|string|max:255',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'cities' => 'required|array',
        'cities.*' => 'exists:cities,id',
        'years_of_experience' => 'nullable|integer|min:0',
        'total_projects' => 'nullable|integer|min:0',
        'total_cities' => 'nullable|integer|min:0',
    ]);

    $builder->name = $request->name;
    $builder->slug = $request->slug;
    $builder->content = $request->content;
    $builder->status = $request->has('status') ? 1 : 0;
    $builder->years_of_experience = $request->years_of_experience;
    $builder->total_projects = $request->total_projects;
    $builder->total_cities = $request->total_cities;

    if ($request->hasFile('logo')) {
        $builder->logo = $this->uploadImage($request->file('logo'));
    }

    $builder->save();

    $builder->cities()->sync($request->cities);
    

    return redirect()->route('Admin.builders.index')->with('success', 'Builder updated successfully!');
    }


    public function destroy($id)
    {
        $builder = Builder::findOrFail($id);
        $builder->delete();

        return redirect()->route('Admin.builders.index')->with('success', 'builders deleted successfully!');
    }

    private function uploadImage($image)
    {
        $filename = time() . '-' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('builders/' . date('Y') . '/' . date('m'), $filename, 'public');
        return $path;
    }
   

    public function show($id) {
        $builder = Builder::findOrFail($id);
        return view('Frontend.properties.all', compact('builder'));
    }
    
    
   public function showBuildersTab()
{
    $banner = Banner::with('images')->where('page', 'developers')->where('status', 1)->latest()->first();   
    $testimonials = Testimonial::paginate(15);
    
    // This query for cities is correct, no changes needed here.
    $cities = City::whereHas('builders')->orderByRaw('CASE WHEN order_number = 0 THEN 1 ELSE 0 END')->orderBy('order_number')->orderBy('city_name')->get();

    // --- THIS IS THE CORRECTED QUERY ---
    // Use the Builder model and eager-load the 'cities' relationship
    $builders = Builder::with('cities')->get()->groupBy(function($builder) {
        // Group builders by the name of their first associated city
        return optional($builder->cities->first())->city_name;
    });
        
    return view('Frontend.developers', compact('cities', 'builders', 'testimonials', 'banner'));
}


    public function developer($slug)
    {
        // Fetch the specific developer
        $builder = Builder::with('properties')->where('slug', $slug)->firstOrFail();
        $testimonials = Testimonial::paginate(15);
        
        return view('Frontend.developer-detail', [
            'builder' => $builder,
            'testimonials' => $testimonials,
        ]);
    }

}