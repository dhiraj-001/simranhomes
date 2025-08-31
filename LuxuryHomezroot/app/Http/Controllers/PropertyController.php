<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\BannerImage;
use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\Amenity;
use App\Models\Testimonial;
use App\Models\PropertyFloorPlan;
use App\Models\PropertyGallery;
use App\Models\Pfaq;
use App\Models\PropertyPrice;
use App\Models\PropertySubType;
use App\Models\PropertyLocationAdvantage;
use App\Models\Builder;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('Admin.properties.index', compact('properties'));
    }

    public function create()
    { 
        $subtypes = PropertySubType::where('status', 1)->orderBy('psubtype_name')->get();
        $amenities = DB::table('amenities')->get();
        $builders = Builder::where('status', 1)->get();
        $cities = DB::table('cities')->get();
        return view('Admin.properties.create', compact('amenities', 'subtypes',  'builders', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
            'amenities' => 'required|array',
            'amenities.*' => 'exists:amenities,id',
            'brochure' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',
            'floor_plans' => 'required|array',
            'floor_plans.*.name' => 'required|string|max:255',
            'floor_plans.*.size' => 'required|string|max:255',
            'floor_plans.*.image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',            
            'galleries' => 'required|array',
            'galleries.*.name' => 'required|string|max:255',
            'galleries.*.image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location_advantage' => 'required|array',
            'location_advantage.*.name' => 'required|string|max:255',
            'location_advantage.*.distance' => 'required|string|max:255',
            'location_advantage.*.type' => 'required|string|max:100',
            'builder_id' => 'required|exists:builders,id',
        ]);

        $property = new Property();
        $property->heading = $request->heading;
        $property->slug = Str::slug($request->heading);        
        $property->unit_size = $request->unit_size;
        $property->configuration = $request->configuration;
        $property->price = $request->price;
        $property->property_type = $request->property_type; 
        $property->property_sub_type = $request->property_sub_type; 
        $property->highlights_content = $request->highlights_content;
        $property->highlights_heading = $request->highlights_heading;
        $property->about_content = $request->about_content;
        $property->about_heading = $request->about_heading;
        $property->property_status = $request->property_status;
        $property->location = $request->location;
        $property->direction_link = $request->direction_link;
        $property->map = $request->map;
        $property->status = $request->has('status') ? 1 : 0;
        $property->meta_title = $request->meta_title;
        $property->meta_keywords = $request->meta_keywords;
        $property->meta_description = $request->meta_description;
        $property->builder_id = $request->builder_id;
        $property->schema_seo = $request->schema_seo;
        $property->is_trending_project = $request->has('is_trending_project') ? 1 : 0;
        $property->is_featured = $request->has('is_featured') ? 1 : 0;
        $property->property_city_wise = $request->property_city_wise; 

        if ($request->hasFile('main_image')) {
            $property->main_image = $this->uploadImage($request->file('main_image'));
        }
        if ($request->hasFile('banner_image')) {
            $property->banner_image = $this->uploadImage($request->file('banner_image'));
        }
        if ($request->hasFile('highlights_img')) {
            $property->highlights_img = $this->uploadImage($request->file('highlights_img'));
        }
        if ($request->hasFile('about_image')) {
            $property->about_image = $this->uploadImage($request->file('about_image'));
        }
        if ($request->hasFile('brochure')) {
            $property->brochure = $this->uploadImage($request->file('brochure'));
        }                

        $property->save();        
        $property->amenities()->sync($request->amenities);

        if ($request->has('floor_plans')) {
            foreach ($request->floor_plans as $index => $floorPlan) {
                $imagePath = null;
                if ($request->hasFile("floor_plans.{$index}.image")) {
                    $imagePath = $this->uploadImage($floorPlan['image']);
                }
                PropertyFloorPlan::create([
                    'property_id' => $property->id,
                    'name'        => $floorPlan['name'],
                    'size'        => $floorPlan['size'],
                    'type'        => $floorPlan['type'], 
                    'image'       => $imagePath,
                ]);
            }
        }

        if ($request->has('galleries')) {
            foreach ($request->galleries as $index => $gallery) {
                $imagePath = null;
                if ($request->hasFile("galleries.{$index}.image")) {
                    $imagePath = $this->uploadImage($gallery['image']);
                }
                PropertyGallery::create([
                    'property_id' => $property->id,
                    'name' => $gallery['name'],
                    'image' => $imagePath,
                ]);
            }
        }
        
        if ($request->has('location_advantage') && is_array($request->location_advantage)) {
            foreach ($request->location_advantage as $locationAdvantages) {
                if (!empty($locationAdvantages['name']) && !empty($locationAdvantages['distance'])) {
                    PropertyLocationAdvantage::create([
                        'property_id' => $property->id,
                        'name' => $locationAdvantages['name'],
                        'distance' => $locationAdvantages['distance'],
                        'type' => $locationAdvantages['type'] ?? null,
                    ]);
                }
            }
        }
        
        if ($request->has('pfaqs')) {
            foreach ($request->pfaqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    Pfaq::create([
                        'property_id' => $property->id,
                        'question' => $faq['question'],
                        'answer' => $faq['answer'],
                        'status' => 'active',
                    ]);
                }
            }
        }
    
        if ($request->has('prices')) {
            foreach ($request->prices as $price) {
                PropertyPrice::create([
                    'property_id' => $property->id,
                    'unit_type'   => $price['unit_type'],
                    'unit_size'   => $price['unit_size'],
                    'price'       => $price['price'],
                ]);
            }
        }

        return redirect()
            ->route('Admin.properties.index')
            ->with('success', 'Property added successfully!');
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id); 
        $subtypes = PropertySubType::where('status', 1)->orderBy('psubtype_name')->get();
        $amenities = Amenity::all();
        $builders = Builder::where('status', 1)->get(); 
        $cities = City::all(); 
        return view('Admin.properties.edit', compact('property', 'amenities', 'subtypes', 'builders', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);
        $request->validate([
            'heading' => 'required|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brochure' => 'nullable|mimes:jpeg,png,jpg,gif,svg,pdf|max:5120',    
            'amenities' => 'required|array',
            'amenities.*' => 'exists:amenities,id',
            'floor_plans' => 'nullable|array',
            'floor_plans.*.name' => 'required|string|max:255',
            'floor_plans.*.size' => 'required|string|max:255',
            'floor_plans.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',        
            'galleries' => 'nullable|array',
            'galleries.*.name' => 'required|string|max:255',
            'galleries.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location_advantage' => 'nullable|array',
            'location_advantage.*.name' => 'required|string|max:255',
            'location_advantage.*.distance' => 'required|string|max:255',
            'location_advantage.*.type' => 'required|string|max:100',
            'builder_id' => 'required|exists:builders,id',
        ]);

        $property->heading = $request->heading;
        $property->slug = Str::slug($request->heading);    
        $property->unit_size = $request->unit_size;
        $property->configuration = $request->configuration;
        $property->price = $request->price;
        $property->property_type = $request->property_type; 
        $property->property_sub_type = $request->property_sub_type; 
        $property->highlights_content = $request->highlights_content;
        $property->highlights_heading = $request->highlights_heading;
        $property->about_content = $request->about_content;
        $property->about_heading = $request->about_heading;
        $property->property_status = $request->property_status;
        $property->location = $request->location;
        $property->direction_link = $request->direction_link;
        $property->map = $request->map;
        $property->status = $request->has('status') ? 1 : 0;
        $property->meta_title = $request->meta_title;
        $property->meta_keywords = $request->meta_keywords;
        $property->meta_description = $request->meta_description;
        $property->builder_id = $request->builder_id;
        $property->schema_seo = $request->schema_seo; 
        $property->is_trending_project = $request->has('is_trending_project') ? 1 : 0;
        $property->is_featured = $request->has('is_featured') ? 1 : 0;
        $property->property_city_wise = $request->property_city_wise; 

        if ($request->hasFile('main_image')) {
            $property->main_image = $this->uploadImage($request->file('main_image'));
        }
        if ($request->hasFile('banner_image')) {
            $property->banner_image = $this->uploadImage($request->file('banner_image'));
        }
        if ($request->hasFile('highlights_img')) {
            $property->highlights_img = $this->uploadImage($request->file('highlights_img'));
        }   
        if ($request->hasFile('brochure')) {
            $property->brochure = $this->uploadImage($request->file('brochure'));
        }  
        if ($request->hasFile('about_image')) {
            $property->about_image = $this->uploadImage($request->file('about_image'));
        }
   
        $property->save();
        $property->amenities()->sync($request->amenities);

        $existingFloorPlans = PropertyFloorPlan::where('property_id', $property->id)->pluck('id')->toArray();
        $updatedFloorPlanIds = [];

        if ($request->has('floor_plans')) {
            foreach ($request->floor_plans as $floorPlan) {
                $existingPlan = PropertyFloorPlan::where('property_id', $property->id)
                    ->where('name', $floorPlan['name'])
                    ->first();

                if ($existingPlan) {
                    $existingPlan->update([
                        'name' => $floorPlan['name'],
                        'size' => $floorPlan['size'],
                        'type' => $floorPlan['type'] ?? null,
                        'image' => isset($floorPlan['image']) && $floorPlan['image'] instanceof \Illuminate\Http\UploadedFile
                            ? $this->uploadImage($floorPlan['image'])
                            : $existingPlan->image
                    ]);
                    $updatedFloorPlanIds[] = $existingPlan->id;
                } else {
                    if (!empty($floorPlan['name']) && !empty($floorPlan['size'])) { 
                        $imagePath = isset($floorPlan['image']) && $floorPlan['image'] instanceof \Illuminate\Http\UploadedFile
                            ? $this->uploadImage($floorPlan['image']) 
                            : null;
                        $newFloorPlan = PropertyFloorPlan::create([
                            'property_id' => $property->id,
                            'name' => $floorPlan['name'],
                            'size' => $floorPlan['size'],
                            'type' => $floorPlan['type'] ?? null,
                            'image' => $imagePath
                        ]);
                        $updatedFloorPlanIds[] = $newFloorPlan->id;
                    }
                }
            }
        }

        $existingLocationIds = PropertyLocationAdvantage::where('property_id', $property->id)->pluck('id')->toArray();
        $updatedLocationIds = [];

        if ($request->has('location_advantage')) {
            foreach ($request->location_advantage as $locationAdvantages) {
                if (isset($locationAdvantages['id'])) {
                    $existingLocation = PropertyLocationAdvantage::find($locationAdvantages['id']);
                    if ($existingLocation && $existingLocation->property_id == $property->id) {
                        $existingLocation->update([
                            'name' => $locationAdvantages['name'],
                            'distance' => $locationAdvantages['distance'],
                            'type' => $locationAdvantages['type'] ?? null,
                        ]);
                        $updatedLocationIds[] = $existingLocation->id;
                    }
                } else {
                    $newLocation = PropertyLocationAdvantage::create([
                        'property_id' => $property->id,
                        'name' => $locationAdvantages['name'],
                        'distance' => $locationAdvantages['distance'],
                        'type' => $locationAdvantages['type'] ?? null,
                    ]);
                    $updatedLocationIds[] = $newLocation->id;
                }
            }
        }

        PropertyLocationAdvantage::where('property_id', $property->id)
            ->whereNotIn('id', $updatedLocationIds)
            ->delete();

        if ($request->has('pfaqs')) {
            $faqIDs = [];
            foreach ($request->pfaqs as $faq) {
                if (isset($faq['id'])) {
                    $existingFaq = Pfaq::find($faq['id']);
                    if ($existingFaq) {
                        $existingFaq->question = $faq['question'];
                        $existingFaq->answer = $faq['answer'];
                        $existingFaq->save();
                        $faqIDs[] = $existingFaq->id;
                    }
                } else {
                    $newFaq = Pfaq::create([
                        'property_id' => $property->id,
                        'question' => $faq['question'],
                        'answer' => $faq['answer'],
                        'status' => 'active',
                    ]);
                    $faqIDs[] = $newFaq->id;
                }
            }
            Pfaq::where('property_id', $property->id)->whereNotIn('id', $faqIDs)->delete();
        }

        PropertyFloorPlan::where('property_id', $property->id)
            ->whereNotIn('id', $updatedFloorPlanIds)
            ->delete();

        $existingGalleries = PropertyGallery::where('property_id', $property->id)->pluck('id')->toArray();
        $updatedGalleryIds = [];

        if ($request->has('galleries')) {
            foreach ($request->galleries as $gallery) {
                $existingGallery = PropertyGallery::where('property_id', $property->id)
                    ->where('name', $gallery['name'])
                    ->first();

                if ($existingGallery) {
                    $existingGallery->update([
                        'name' => $gallery['name'],
                        'image' => isset($gallery['image']) && $gallery['image'] instanceof \Illuminate\Http\UploadedFile
                            ? $this->uploadImage($gallery['image'])
                            : $existingGallery->image
                    ]);
                    $updatedGalleryIds[] = $existingGallery->id;
                } else {
                    $imagePath = isset($gallery['image']) && $gallery['image'] instanceof \Illuminate\Http\UploadedFile
                        ? $this->uploadImage($gallery['image']) 
                        : null;
                    $newGallery = PropertyGallery::create([
                        'property_id' => $property->id,
                        'name' => $gallery['name'],
                        'image' => $imagePath
                    ]);
                    $updatedGalleryIds[] = $newGallery->id;
                }
            }
        }

        PropertyGallery::where('property_id', $property->id)
            ->whereNotIn('id', $updatedGalleryIds)
            ->delete();
        
        PropertyPrice::where('property_id', $property->id)->delete();

        if ($request->has('prices')) {
            foreach ($request->prices as $price) {
                PropertyPrice::create([
                    'property_id' => $property->id,
                    'unit_type'   => $price['unit_type'],
                    'unit_size'   => $price['unit_size'],
                    'price'       => $price['price'],
                ]);
            }
        }
   
        return redirect()->route('Admin.properties.index')->with('success', 'Property updated successfully!');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()
            ->route('Admin.properties.index')
            ->with('success', 'Property deleted successfully!');
    }

    private function uploadImage($image)
    {
        try {
            $filename = time() . '-' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('properties/' . date('Y') . '/' . date('m'), $filename, 'public');
            return $path;
        } catch (\Exception $e) {
            Log::error('Error uploading image: ' . $e->getMessage());
            return null;
        }
    }
    
    public function updateOrder(Request $request)
    {
        $sequences = $request->input('sequence');

        if (!is_array($sequences)) {
            return redirect()->back()->with('error', 'Invalid sequence data.');
        }

        if (count($sequences) !== count(array_unique($sequences))) {
            return redirect()->back()->with('error', 'Sequence numbers must be unique for each property.');
        }

        foreach ($sequences as $id => $sequence) {
            Property::where('id', $id)->update(['sequence' => intval($sequence)]);
        }

        return redirect()->route('Admin.properties.index')->with('success', 'Property order updated successfully!');
    }

    public function filterProperties($propertyType)
    {
        $properties = Property::where('property_type', $propertyType)
                              ->where('status', 1)
                              ->paginate(12);
        
        $testimonials = Testimonial::paginate(15);
        $banner = Banner::with('images')->where('page', 'property')->where('status', 1)->latest()->first();
        $cities = City::all();

        return view('Frontend.properties.all', compact('properties', 'testimonials', 'banner', 'cities', 'propertyType'));
    }

    //All Properties
    public function propertyPage(Request $request)
    {    
        $properties = Property::with('builder')
            ->orderBy('status', 'desc')
            ->orderBy('sequence', 'asc')
            ->paginate(15);
        
        $testimonials = Testimonial::paginate(15);
        $banner = Banner::with('images')->where('page', 'property')->where('status', 1)->latest()->first();
        
        $cities = City::all(); 

        return view('Frontend.properties.all', compact('properties', 'testimonials', 'banner', 'cities'));
    }

    //Property Detail
    public function property($slug)
    {
        $property = Property::where('slug', $slug)->firstOrFail();
        $testimonials = Testimonial::paginate(15);
        $pfaqs = $property->pfaqs;

        // --- FIX: Fetch trending properties ---
        $trendingProperties = Property::where('is_trending_project', 1)
                                      ->where('id', '!=', $property->id) // Exclude the current property
                                      ->latest()
                                      ->take(6) // Limit to 6
                                      ->get();

        // --- FIX: Pass trendingProperties to the view ---
        return view('Frontend.properties.view', [
            'property' => $property,
            'testimonials' => $testimonials,
            'pfaqs' => $pfaqs,
            'trendingProperties' => $trendingProperties,
        ]);
    }

    public function searchProperties(Request $request)
    {
        $banner = Banner::with('images')->where('page', 'property')->where('status', 1)->latest()->first();
        $testimonials = Testimonial::paginate(15);
        
        $cities = City::all(); 

        $city = $request->input('city');
        $developerName = $request->input('developer');

        $query = Property::with('builder');

        if ($city) {
            $query->where('property_city_wise', 'LIKE', '%' . $city . '%');
        }

        if ($developerName) {
            $query->whereHas('builder', function ($q) use ($developerName) {
                $q->where('name', 'LIKE', '%' . $developerName . '%');
            });
        }
        
        // --- FIX: Apply all filters from the form ---
        if ($request->filled('category')) {
            $query->where('property_sub_type', $request->category);
        }
        if ($request->filled('property-type')) {
            $query->where('property_status', $request['property-type']);
        }
        if ($request->filled('bedroom')) {
            $query->where('configuration', $request->bedroom);
        }
        if ($request->filled('budget')) {
            // This requires more complex logic based on your price data
            // For now, this is a placeholder. You'll need to adjust it.
            // Example:
            // $query->where('price', '<', 50000000);
        }

        $properties = $query->paginate(15);

        return view('Frontend.properties.all', compact('properties', 'banner', 'testimonials', 'cities'));
    }
}
