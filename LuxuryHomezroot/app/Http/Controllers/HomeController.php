<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\City;
use App\Models\Builder;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\HomeStatistic;
use App\Models\PropertySubType;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $testimonials = Testimonial::paginate(15);
        $blogs = Blog::paginate(3);
        $builders = Builder::all();
        $statistics = HomeStatistic::all();
        $subtypes = PropertySubType::orderBy('order_number')->get();
        $homeproperties = Property::where('status', 1)
                            ->orderBy('sequence') // ya jo bhi trending logic ho
                            ->take(10)
                            ->get();
        
        $cities = City::select('id', 'slug', 'main_image', 'city_name')->get();
        
        $availableStatuses = \App\Models\Property::where('status', 1)
        ->select('property_status')
        ->distinct()
        ->pluck('property_status');

        $propertiesByStatus = [];

        foreach ($availableStatuses as $status) {
            $propertiesByStatus[$status] = \App\Models\Property::where('property_status', $status)
                ->where('status', 1)
                ->take(1) // change to 3 if you want more
                ->get();
        }
        
        // Define the three property types manually with images
        $propertyTypes = collect([
            (object)[
                'slug' => 'residential',
                'name' => 'Residential',
                'main_image' => '/residential.jpg' // Add appropriate image path
            ],
            (object)[
                'slug' => 'commercial', 
                'name' => 'Commercial',
                'main_image' => '/commercial.jpeg' // Add appropriate image path
            ],
            (object)[
                'slug' => 'residential-plots',
                'name' => 'Residential Plots',
                'main_image' => '/residential-plots.jpg' // Add appropriate image path
            ]
        ]);

        $banner = Banner::with('images')->where('page', 'home')->where('status', 1)->latest()->first();

        
        return view('Frontend.index', compact('testimonials', 'blogs', 'builders', 'statistics', 'subtypes', 'homeproperties', 'availableStatuses', 'propertiesByStatus', 'banner','cities', 'propertyTypes'));
    }
    
    public function propertyBySubtype($subtype)
{
    $properties = Property::where('property_sub_type', $subtype)->where('status', 1)->paginate(12);
    $banner = Banner::with('images')->where('page', 'property')->where('status', 1)->latest()->first();
    $testimonials = Testimonial::paginate(15);

    return view('Frontend.properties.all', compact('properties', 'subtype','banner','testimonials'));
}

}