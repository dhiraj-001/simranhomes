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
        $property->status = $request->status;
        $property->meta_title = $request->meta_title;
        $property->meta_keywords = $request->meta_keywords;
        $property->meta_description = $request->meta_description;
        $property->builder_id = $request->builder_id;
        $property->schema_seo = $request->schema_seo;
        $property->is_trending_project = $request->has('is_trending_project') ? 1 : 0;
        $property->is_featured = $request->has('is_featured') ? 1 : 0;
        $property->property_city_wise = $request->property_city_wise; 

        

        // Handle the main image upload
        if ($request->hasFile('main_image')) {
            $property->main_image = $this->uploadImage($request->file('main_image'));
        }

        // Handle banner image upload
        if ($request->hasFile('banner_image')) {
            $property->banner_image = $this->uploadImage($request->file('banner_image'));
        }

        // Handle highlights_img img upload
        if ($request->hasFile('highlights_img')) {
            $property->highlights_img = $this->uploadImage($request->file('highlights_img'));
        }
        
        
        // Handle the about image upload
        if ($request->hasFile('about_image')) {
            $property->about_image = $this->uploadImage($request->file('about_image'));
        }

        
        
        // Handle site brochure upload
        if ($request->hasFile('brochure')) {
            $property->brochure = $this->uploadImage($request->file('brochure'));
        }                

        $property->save();        

        // Save amenities (many-to-many relation)
        $property->amenities()->sync($request->amenities);

        // Handle floor plans
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

        

        // Handle Gallery
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
        
        
        
       // Handle Location Advantage
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
        
        
    // Save FAQs if present
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
    $cities = City ::all(); 
    return view('Admin.properties.edit', compact('property', 'amenities', 'subtypes', 'builders', 'cities'));
}


    public function update(Request $request, $id)
{

// Find the existing property or fail if not found
    $property = Property::findOrFail($id);
    

// Validate the incoming request data
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

// Update the property details
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
    $property->status = $request->status;
    $property->meta_title = $request->meta_title;
    $property->meta_keywords = $request->meta_keywords;
    $property->meta_description = $request->meta_description;
    $property->builder_id = $request->builder_id;
    $property->schema_seo = $request->schema_seo; 
    $property->is_trending_project = $request->has('is_trending_project') ? 1 : 0;
    $property->is_featured = $request->has('is_featured') ? 1 : 0;
    $property->property_city_wise = $request->property_city_wise; 


    

    // Handle image uploads
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
   

// Save the updated property
    $property->save();
    

// Handle amenities update
    $property->amenities()->sync($request->amenities);

    

// Handle Floor Plans  
$existingFloorPlans = PropertyFloorPlan::where('property_id', $property->id)->pluck('id')->toArray();
$updatedFloorPlanIds = [];

if ($request->has('floor_plans')) {
    foreach ($request->floor_plans as $floorPlan) {
        $existingPlan = PropertyFloorPlan::where('property_id', $property->id)
            ->where('name', $floorPlan['name'])
            ->first();

        if ($existingPlan) {
            // Update existing floor plan
            $existingPlan->update([
                'name' => $floorPlan['name'],
                'size' => $floorPlan['size'],
                'type' => $floorPlan['type'] ?? null,
                'image' => isset($floorPlan['image']) && $floorPlan['image'] instanceof \Illuminate\Http\UploadedFile
                    ? $this->uploadImage($floorPlan['image'])  // Upload new image if given
                    : $existingPlan->image  // Keep old image
            ]);
            $updatedFloorPlanIds[] = $existingPlan->id;
        } else {
            //Ensure new floor plan gets added
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



// Handle Location Advantages
$existingLocationIds = PropertyLocationAdvantage::where('property_id', $property->id)->pluck('id')->toArray();
$updatedLocationIds = [];

if ($request->has('location_advantage')) {
    foreach ($request->location_advantage as $locationAdvantages) {
        if (isset($locationAdvantages['id'])) {
            // Update existing
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
            // Create new
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

// Delete any old records not in the updated list
PropertyLocationAdvantage::where('property_id', $property->id)
    ->whereNotIn('id', $updatedLocationIds)
    ->delete();

    
    
    


// FAQ Update Handling
    if ($request->has('pfaqs')) {
        $faqIDs = [];

        foreach ($request->pfaqs as $faq) {
            if (isset($faq['id'])) {
                // Update existing
                $existingFaq = Pfaq::find($faq['id']);
                if ($existingFaq) {
                    $existingFaq->question = $faq['question'];
                    $existingFaq->answer = $faq['answer'];
                    $existingFaq->save();
                    $faqIDs[] = $existingFaq->id;
                }
            } else {
                // Create new
                $newFaq = Pfaq::create([
                    'property_id' => $property->id,
                    'question' => $faq['question'],
                    'answer' => $faq['answer'],
                    'status' => 'active',
                ]);
                $faqIDs[] = $newFaq->id;
            }
        }

        // Delete removed FAQs
        Pfaq::where('property_id', $property->id)->whereNotIn('id', $faqIDs)->delete();
    }

// Delete old floor plans not in the updated list
PropertyFloorPlan::where('property_id', $property->id)
    ->whereNotIn('id', $updatedFloorPlanIds)
    ->delete();





// Handle Gallery   
    $existingGalleries = PropertyGallery::where('property_id', $property->id)->pluck('id')->toArray();
    $updatedGalleryIds = [];

    if ($request->has('galleries')) {
    foreach ($request->galleries as $gallery) {
        $existingGallery = PropertyGallery::where('property_id', $property->id)
            ->where('name', $gallery['name'])
            ->first();

        if ($existingGallery) {
            // If gallery exists, update name & keep old image if no new image is uploaded
            $existingGallery->update([
                'name' => $gallery['name'],
                'image' => isset($gallery['image']) && $gallery['image'] instanceof \Illuminate\Http\UploadedFile
                    ? $this->uploadImage($gallery['image'])
                    : $existingGallery->image // Keep old image if new one is not provided
            ]);
            $updatedGalleryIds[] = $existingGallery->id;
        } else {
            // Create new gallery entry
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


    // Delete gallery images not in the updated list
    PropertyGallery::where('property_id', $property->id)
        ->whereNotIn('id', $updatedGalleryIds)
        ->delete();
        
        
        
        
        
        
// First delete old records (or update if you add IDs)
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
   
   
        


    // Redirect back with success message
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
            return null; // Handle gracefully
        }
    }
    
    
    
  public function updateOrder(Request $request)
{
    $sequences = $request->input('sequence');

    if (!is_array($sequences)) {
        return redirect()->back()->with('error', 'Invalid sequence data.');
    }

    // Check if sequence values are unique
    if (count($sequences) !== count(array_unique($sequences))) {
        return redirect()->back()->with('error', 'Sequence numbers must be unique for each property.');
    }

    foreach ($sequences as $id => $sequence) {
        Property::where('id', $id)->update(['sequence' => intval($sequence)]);
    }

    return redirect()->route('Admin.properties.index')->with('success', 'Property order updated successfully!');
}







// Filter Properties by property_type
public function filterProperties($id)
{

    $newlaunchproperties = Property::where('property_type', 'new-launch')->get();
    $residentialproperties = Property::where('property_type', 'residential')->get();
    $commercialproperties = Property::where('property_type', 'commercial')->get();

    // Fetch properties by property_type and ensure they are active
    $properties = Property::where('property_type', $id)
                          ->where('status', 1)
                          ->get();

    // Return the filtered properties to the view
    return view('Frontend.properties.filter', compact('newlaunchproperties', 'residentialproperties', 'commercialproperties','properties', 'id'));
}




    //All Properties
    public function propertyPage(Request $request)
{    

    //$properties = Property::paginate(15);
    $properties = Property::with('builder')
    ->orderBy('status', 'desc')  // status = 1 (trending) will come first
    ->orderBy('sequence', 'asc') // low sequence = higher trending
    ->paginate(15);
    $testimonials = Testimonial::paginate(15);
    $banner = Banner::with('images')->where('page', 'property')->where('status', 1)->latest()->first();

    // Return the view with the properties and city filter
    return view('Frontend.properties.all', compact('properties', 'testimonials', 'banner'));
}





    //Property Detail
    public function property($slug)
{
    $properties = Property::paginate(4);
    $testimonials = Testimonial::paginate(15);
    // First, get the property
    $property = Property::where('slug', $slug)->firstOrFail();
    // Then access related FAQs (optional if you already eager load it)
    $pfaqs = $property->pfaqs;

    return view('Frontend.properties.view', [
        'property' => $property,
        'properties' => $properties,
        'testimonials' => $testimonials,
        'pfaqs' => $pfaqs,
    ]);
}





public function searchProperties(Request $request)
{
    $banner = Banner::with('images')->where('page', 'property')->where('status', 1)->latest()->first();
    $testimonials = Testimonial::paginate(15);

    $city = $request->input('city'); // This will be string like "gurgaon"
    $developerName = $request->input('developer');

    $properties = Property::with('builder')
        ->when($city, function ($q) use ($city) {
            $q->where('property_city_wise', 'LIKE', '%' . $city . '%');
        })
        ->when($developerName, function ($q) use ($developerName) {
            $q->whereHas('builder', function ($query) use ($developerName) {
                $query->where('name', 'LIKE', '%' . $developerName . '%');
            });
        })
        ->get();

    return view('Frontend.properties.all', compact('properties', 'banner', 'testimonials'));
}










}