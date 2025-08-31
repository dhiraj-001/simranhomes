@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Property')
@section('content')
@push('styles')
<!-- Add any specific CSS you need here -->
@endpush
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Property</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('Admin.properties.index') }}">Property</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Property</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Property Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.properties.update', $property->id) }}" method="POST"
                                enctype="multipart/form-data" class="outer-repeater">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-form-label col-lg-2">Heading </label>
                                    <div class="col-lg-10">
                                        <input name="heading" type="text" class="form-control" id="heading"
                                            value="{{ $property->heading }}">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Slug </label>
                                    <div class="col-lg-10">
                                        <input name="slug" type="text" class="form-control" id="slug"
                                            value="{{ $property->slug }}" readonly>
                                    </div>
                                </div>
                                
                                 <div class="form-group row mb-4">
                                    <label for="property_city_wise" class="col-form-label col-lg-2">Property in
                                        City</label>
                                    <div class="col-lg-10">
                                        <select name="property_city_wise" class="form-select" required>
                                            <option value="">Choose City</option>
                                            @foreach($cities as $city)
                                            <option value="{{ $city->slug }}" @if($property->property_city_wise
                                                == $city->slug) selected @endif>
                                                {{ $city->city_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="unit_size" class="col-form-label col-lg-2">Unit Size </label>
                                    <div class="col-lg-10">
                                        <input name="unit_size" type="text" class="form-control" id="unit_size"
                                            value="{{ $property->unit_size }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="configuration" class="col-form-label col-lg-2">Configuration </label>
                                    <div class="col-lg-10">
                                        <input name="configuration" type="text" class="form-control" id="configuration"
                                            value="{{ $property->configuration }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="price" class="col-form-label col-lg-2">Price </label>
                                    <div class="col-lg-10">
                                        <input name="price" type="text" class="form-control" id="price"
                                            value="{{ $property->price }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="col-form-label" class="col-lg-2">Property Main Image</label>
                                    <div class="col-lg-1">
                                        @if($property->main_image)
                                        @php
                                        $imagePath = str_replace('/storage', '', $property->main_image);
                                        @endphp
                                        <img src="{{ asset('storage/app/public/' . $imagePath) }}" alt="Main Image"
                                            style="max-width: 100%;">
                                        @else
                                        <span>No image uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="main_image">Upload New Main Image</label>
                                        <label class="image-upload-guide">(Size: W: 339px / H: 213px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="col-form-label" class="col-lg-2">Banner Image </label>
                                    <div class="col-lg-1">
                                        @if($property->banner_image)
                                        @php
                                        $imagePath = str_replace('/storage', '', $property->banner_image);
                                        @endphp
                                        <img src="{{ asset('storage/app/public/' . $imagePath) }}" alt="Main Image"
                                            style="max-width: 100%;">
                                        @else
                                        <span>No image uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="banner_image">Upload New Banner Image </label>
                                        <label class="image-upload-guide">(Size: W: 1280px / H: 651px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row mb-4">
                                    <label for="property_type" class="col-form-label col-lg-2">Property Type</label>
                                    <div class="col-lg-10">
                                        <select name="property_type" class="form-select" required>
                                            <option value="">Choose Type</option>
                                            <option value="residential"
                                                {{ $property->property_type == 'residential' ? 'selected' : '' }}>
                                                Residential</option>
                                            <option value="commercial"
                                                {{ $property->property_type == 'commercial' ? 'selected' : '' }}>
                                                Commercial</option>
                                            <option value="new-launch"
                                                {{ $property->property_type == 'Residential plots' ? 'selected' : '' }}>Residential plots
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="form-group row mb-4">
                                <label for="property_sub_type" class="col-form-label col-lg-2">Property Sub Type</label>
                                <div class="col-lg-10">
                                    <select name="property_sub_type" class="form-select" required>
                                        <option value="">Choose Sub Type</option>
                                        @foreach($subtypes as $subtype)
                                            <option value="{{ $subtype->slug }}"
                                                {{ old('property_sub_type', $property->property_sub_type ?? '') == $subtype->slug ? 'selected' : '' }}>
                                                {{ $subtype->psubtype_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4" id="sub_property_container" style="display: none;">
                                <label for="sub_property" class="col-form-label col-lg-2">Sub Property</label>
                                <div class="col-lg-10">
                                    <select name="sub_property" class="form-select" id="sub_property">
                                        <option value="">Choose Sub Property</option>
                                        <option value="Retail Shops" {{ old('sub_property', $property->sub_property) == 'Retail Shops' ? 'selected' : '' }}>Retail Shops</option>
                                        <option value="Office spaces" {{ old('sub_property', $property->sub_property) == 'Office spaces' ? 'selected' : '' }}>Office spaces</option>
                                    </select>
                                </div>
                            </div>

                                
                                
                                <div class="form-group row mb-4">
                                <label for="property_status" class="col-form-label col-lg-2">Property Status</label>
                                <div class="col-lg-10">
                                    <select name="property_status" class="form-select" required>
                                        <option value="">Choose Status</option>
                                        <option value="new-launch" {{ $property->property_status == 'new-launch' ? 'selected' : '' }}>New Launch</option>
                                        <option value="pre-launch" {{ $property->property_status == 'pre-launch' ? 'selected' : '' }}>Pre-Launch</option>
                                        <option value="under-construction" {{ $property->property_status == 'under-construction' ? 'selected' : '' }}>Under Construction</option>
                                        <option value="ready-to-move" {{ $property->property_status == 'ready-to-move' ? 'selected' : '' }}>Ready To Move</option>
                                        <option value="completed" {{ $property->property_status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="resale" {{ $property->property_status == 'resale' ? 'selected' : '' }}>Resale</option>
                                        <option value="available" {{ $property->property_status == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="sold-out" {{ $property->property_status == 'sold-out' ? 'selected' : '' }}>Sold Out</option>
                                        <option value="coming-soon" {{ $property->property_status == 'coming-soon' ? 'selected' : '' }}>Coming Soon</option>
                                    </select>
                                </div>
                            </div>


                                <!-- Property Multiple Amenities Relation-->
                                <div class="form-group row mb-4">
                                    <label for="amenities" class="col-form-label col-lg-2">Amenities</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="amenities[]"
                                            id="choices-multiple-remove-button" multiple>
                                            <option value="">Choose Amenity</option>
                                            @foreach($amenities as $amenity)
                                            <option value="{{ $amenity->id }}" @if(in_array($amenity->id,
                                                $property->amenities->pluck('id')->toArray())) selected @endif>
                                                {{ $amenity->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- End Property Multiple Amenities Relation-->
                                
                                
                                
                                <div class="form-group row mb-4">
                                <label for="builder_id" class="col-form-label col-lg-2">Select Builder</label>
                                <div class="col-lg-10">
                                <select name="builder_id" id="builder_id" class="form-control">
                                    <option value="">-- Select Builder --</option>
                                    @foreach($builders as $builder)
                                        <option value="{{ $builder->id }}" {{ old('builder_id', $property->builder_id ?? '') == $builder->id ? 'selected' : '' }}>
                                            {{ $builder->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            
                            
                            <div class="form-group row mb-4">
                            <label for="is_trending_project" class="col-form-label col-lg-2">Trending Project</label>
                            <div class="col-lg-10">
                                <div class="form-check">
                                    <input 
                                        type="checkbox" 
                                        name="is_trending_project" 
                                        id="is_trending_project" 
                                        value="1" 
                                        class="form-check-input"
                                        {{ old('is_trending_project', $property->is_trending_project) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="is_trending_project">
                                        Mark as Trending
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row mb-4">
                        <label for="is_featured" class="col-form-label col-lg-2">Featured Project</label>
                        <div class="col-lg-10">
                            <div class="form-check">
                                <input 
                                    type="checkbox" 
                                    name="is_featured" 
                                    id="is_featured" 
                                    value="1" 
                                    class="form-check-input"
                                    {{ old('is_featured', $property->is_featured) ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="is_featured">
                                    Mark as Featured
                                </label>
                            </div>
                        </div>
                    </div>



                                
                                
                                
                                 <!--About section-->
                                <div class="form-group row mb-4">
                                    <label for="about_heading" class="col-form-label col-lg-2">About Heading </label>
                                    <div class="col-lg-10">
                                        <input name="about_heading" type="text" class="form-control" id="about_heading"
                                            value="{{ $property->about_heading }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="content" class="col-form-label col-lg-2">About Content</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1"
                                            name="about_content">{{ $property->about_content }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="col-form-label" class="col-lg-2">About Image</label>
                                    <div class="col-lg-1">
                                        @if($property->about_image)
                                        @php
                                        $imagePath = str_replace('/storage', '', $property->about_image);
                                        @endphp
                                        <img src="{{ asset('storage/app/public/' . $imagePath) }}" alt="about_image"
                                            style="max-width: 100%;">
                                        @else
                                        <span>No image uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="about_image">Upload New About Image</label>
                                        <label class="image-upload-guide">(Size: W: 1048px / H: 552px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="about_image" name="about_image"
                                            class="form-control">
                                    </div>
                                </div>
                                <!-- / About section-->



                                <!--Highlight section-->
                                <div class="form-group row mb-4">
                                    <label for="highlights_heading" class="col-form-label col-lg-2">Highlights Heading </label>
                                    <div class="col-lg-10">
                                        <input name="highlights_heading" type="text" class="form-control" id="highlights_heading"
                                            value="{{ $property->highlights_heading }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="content" class="col-form-label col-lg-2">Highlights Content</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-2"
                                            name="highlights_content">{{ $property->highlights_content }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="col-form-label" class="col-lg-2">Highlights Image</label>
                                    <div class="col-lg-1">
                                        @if($property->highlights_img)
                                        @php
                                        $imagePath = str_replace('/storage', '', $property->highlights_img);
                                        @endphp
                                        <img src="{{ asset('storage/app/public/' . $imagePath) }}" alt="highlights_img"
                                            style="max-width: 100%;">
                                        @else
                                        <span>No image uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="highlights_img">Upload New Highlights Image</label>
                                        <label class="image-upload-guide">(Size: W: 1048px / H: 552px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="highlights_img" name="highlights_img"
                                            class="form-control">
                                    </div>
                                </div>
                                <!-- / Highlight section--> 
                                
                                

                                <!-- Repeater for Floor Plans with Property Floor Plan Relation -->
                                <div class="form-group row mb-4">
                                    <label for="floor_plans" class="col-form-label col-lg-2">Floor Plans</label>
                                    <div class="col-lg-10">
                                        <div class="outer-repeater">
                                            @php
                                            $floorPlans = $property->floorPlans ?? [];
                                            @endphp

                                            @if ($floorPlans->isEmpty())
                                            @php $floorPlans = [['name' => '', 'size' => '', 'type' => '', 'image' => '']]; @endphp
                                            @endif

                                            @foreach ($floorPlans as $index => $floorPlan)
                                            <div class="outer-repeater-item">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <input type="text" name="floor_plans[{{ $index }}][name]"
                                                            class="form-control"
                                                            value="{{ old('floor_plans.' . $index . '.name', $floorPlan['name'] ?? '') }}"
                                                            placeholder="Floor Plan Name" required />
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="text" name="floor_plans[{{ $index }}][size]"
                                                            class="form-control"
                                                            value="{{ old('floor_plans.' . $index . '.size', $floorPlan['size'] ?? '') }}"
                                                            placeholder="Floor Plan Size" required />
                                                    </div>
                                                    
                                                     <div class="col-lg-2">
                                                    <select name="floor_plans[{{ $index }}][type]" class="form-control">
                                                        <option value="">Select Type</option>
                                                        @foreach(['1BHK', '2BHK', '3BHK', '4BHK'] as $type)
                                                            <option value="{{ $type }}"
                                                                {{ old("floor_plans.{$index}.type", $floorPlan['type'] ?? '') == $type ? 'selected' : '' }}>
                                                                {{ $type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                    <div class="col-lg-1">
                                                        @if(isset($floorPlan['image']) && $floorPlan['image'])
                                                        @php
                                                        $imagePath = str_replace('/storage', '', $floorPlan['image']);
                                                        @endphp
                                                        <img src="{{ asset('storage/app/public/' . $imagePath) }}"
                                                            alt="image" style="max-width: 100%;">
                                                        @else
                                                        <span>No image uploaded</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="file" name="floor_plans[{{ $index }}][image]"
                                                            class="form-control" />
                                                             <label class="image-upload-guide">(Size: W: 221 px / H: 208 px)</label>
                                                    </div>

                                                    <div class="col-lg-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-repeater-item">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-success add-repeater-item">Add Another
                                            Floor Plan</button>
                                    </div>
                                </div>
                                <!-- End Repeater for Floor Plans -->


                                <!-- Repeater for Gallery with Property Gallery Relation-->
                                <div class="form-group row mb-4">
                                    <label for="galleries" class="col-form-label col-lg-2">Gallery</label>
                                    <div class="col-lg-10">
                                        <div class="outer-repeater">
                                            @foreach ($property->galleries as $index => $gallery)
                                            <div class="outer-repeater-item">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <input type="text" name="galleries[{{ $index }}][name]"
                                                            class="form-control"
                                                            value="{{ old('galleries.' . $index . '.name', $gallery->name) }}"
                                                            placeholder="Image Title" required />
                                                    </div>
                                                    <div class="col-lg-1">
                                                        @if($gallery->image)
                                                        @php
                                                        $imagePath = str_replace('/storage', '', $gallery->image);
                                                        @endphp
                                                        <img src="{{ asset('storage/app/public/' . $imagePath) }}"
                                                            alt="image" style="max-width: 100%;">
                                                        @else
                                                        <span>No image uploaded</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input type="file" name="galleries[{{ $index }}][image]"
                                                            class="form-control" />
                                                            <label class="image-upload-guide">(Size: W: 380 px / H: 308 px)</label>

                                                    </div>
                                                    <div class="col-lg-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-repeater-item">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-success add-repeater-item">Add Another
                                            Gallery Image</button>
                                    </div>
                                </div>
                                <!-- End Repeater for Gallery -->
                                
                                
                             <div class="form-group row mb-4">
    <label for="location_advantage" class="col-form-label col-lg-2">Location Advantage</label>
    <div class="col-lg-10">
        <div class="outer-repeater">

            @php
                $locationAdvantages = old('location_advantage', $property->locationAdvantages ?? []);
            @endphp

            @forelse ($locationAdvantages as $index => $locationAdvantage)
                <div class="outer-repeater-item">
                    <div class="row align-items-center mb-2">
                        <input type="hidden" name="location_advantage[{{ $index }}][id]" value="{{ $locationAdvantage['id'] ?? $locationAdvantage->id ?? '' }}">

                        <div class="col-lg-3">
                            <input type="text" name="location_advantage[{{ $index }}][name]" class="form-control"
                                   value="{{ old("location_advantage.$index.name", $locationAdvantage['name'] ?? $locationAdvantage->name ?? '') }}"
                                   placeholder="Location Name" required>
                        </div>

                        <div class="col-lg-2">
                            <input type="text" name="location_advantage[{{ $index }}][distance]" class="form-control"
                                   value="{{ old("location_advantage.$index.distance", $locationAdvantage['distance'] ?? $locationAdvantage->distance ?? '') }}"
                                   placeholder="Distance" required>
                        </div>

                        <div class="col-lg-3">
                            @php
                                $selectedType = old("location_advantage.$index.type", $locationAdvantage['type'] ?? $locationAdvantage->type ?? '');
                            @endphp
                            <select name="location_advantage[{{ $index }}][type]" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="Education" {{ $selectedType == 'Education' ? 'selected' : '' }}>Education</option>
                                <option value="Transport" {{ $selectedType == 'Transport' ? 'selected' : '' }}>Transport</option>
                                <option value="Hospital" {{ $selectedType == 'Hospital' ? 'selected' : '' }}>Hospital</option>
                                <option value="Connectivity" {{ $selectedType == 'Connectivity' ? 'selected' : '' }}>Connectivity</option>
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <button type="button" class="btn btn-danger remove-repeater-item">Remove</button>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Show one blank row if no data -->
                <div class="outer-repeater-item">
                    <div class="row align-items-center mb-2">
                        <div class="col-lg-3">
                            <input type="text" name="location_advantage[0][name]" class="form-control"
                                   placeholder="Location Name" required>
                        </div>
                        <div class="col-lg-2">
                            <input type="text" name="location_advantage[0][distance]" class="form-control"
                                   placeholder="Distance" required>
                        </div>
                        <div class="col-lg-3">
                            <select name="location_advantage[0][type]" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="Education">Education</option>
                                <option value="Transport">Transport</option>
                                <option value="Hospital">Hospital</option>
                                <option value="Connectivity">Connectivity</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-danger remove-repeater-item">Remove</button>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>

        <button type="button" class="btn btn-success add-repeater-item mt-2">Add Another Location Advantage</button>
    </div>
</div>



                                
                                
                                
<!--Price section-->
<div class="form-group row mb-4">
     <label class="col-form-label col-lg-2">Properties Price List</label>
    
     <div class="col-lg-10">
<div class="faq-item border p-3 mb-3">
    <div id="price-repeater">
    @if($property->prices->count())
        @foreach($property->prices as $index => $price)
        <div class="price-item mb-3 border p-3">
            <input type="hidden" name="prices[{{ $index }}][id]" value="{{ $price->id }}">
            <div class="row">
                <div class="col-md-4">
                    <label>Unit Type</label>
                    <input type="text" name="prices[{{ $index }}][unit_type]" class="form-control" value="{{ $price->unit_type }}">
                </div>
                <div class="col-md-4">
                    <label>Unit Size</label>
                    <input type="text" name="prices[{{ $index }}][unit_size]" class="form-control" value="{{ $price->unit_size }}">
                </div>
                <div class="col-md-4">
                    <label>Price</label>
                    <input type="text" name="prices[{{ $index }}][price]" class="form-control" value="{{ $price->price }}">
                </div>
            </div>
        </div>
        @endforeach
        @php $lastIndex = $property->prices->count(); @endphp
    @else
        <div class="price-item mb-3 border p-3">
            <div class="row">
                <div class="col-md-4">
                    <label>Unit Type</label>
                    <input type="text" name="prices[0][unit_type]" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Unit Size</label>
                    <input type="text" name="prices[0][unit_size]" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Price</label>
                    <input type="text" name="prices[0][price]" class="form-control">
                </div>
            </div>
        </div>
        @php $lastIndex = 1; @endphp
    @endif
</div>

<button type="button" class="btn btn-sm btn-secondary mt-2" onclick="addPriceItem()">+ Add More</button>
</div>

</div>


</div>
<!--Price section-->

                                <div class="form-group row mb-4">
                                    <label for="location" class="col-form-label col-lg-2">Location</label>
                                    <div class="col-lg-10">
                                        <input name="location" type="text" class="form-control" id="location"
                                            placeholder="Enter Location..." value="{{ $property->location }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="direction_link" class="col-form-label col-lg-2">Location Map
                                        Link</label>
                                    <div class="col-lg-10">
                                        <input name="direction_link" type="text" class="form-control"
                                            id="direction_link" placeholder="Enter Location Map Link..."
                                            value="{{ $property->direction_link }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="col-form-label" class="col-lg-2">Brochure</label>
                                    <div class="col-lg-1">
                                        @if($property->brochure)
                                        @php
                                        $imagePath = str_replace('/storage', '', $property->brochure);
                                        @endphp
                                        <a href="{{ asset('storage/app/public/' . $imagePath) }}" target="_blank">View Brochure</a>
                                        @else
                                        <span>No Brochure uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="brochure">Upload New Brochure</label>
                                        <label class="image-upload-guide">Pdf only - Max. 5 mb Filesize
                                            </label>
                                        <input type="file" id="brochure" name="brochure" class="form-control">
                                    </div>
                                </div>






                                <div class="form-group row mb-4">
                                    <label for="map" class="col-form-label col-lg-2">Map
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="map" rows="4" class="form-control"
                                            id="map">{{ $property->map}}</textarea>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <!--Faqs-->
                                <div class="form-group row mb-4">
                                <label class="col-form-label col-lg-2">Properties FAQs</label>
                                <div class="col-lg-10">
                                <div id="faq-repeater-wrapper">
                                    @forelse ($property->pfaqs as $index => $faq)
                                    <div class="faq-item border p-3 mb-3">
                                        <input type="hidden" name="pfaqs[{{ $index }}][id]" value="{{ $faq->id }}">
                                        <div class="form-group mb-2">
                                            <label>Question</label>
                                            <input type="text" name="pfaqs[{{ $index }}][question]" class="form-control" value="{{ $faq->question }}" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Answer</label>
                                            <textarea name="pfaqs[{{ $index }}][answer]" class="form-control" rows="2" required>{{ $faq->answer }}</textarea>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                    </div>
                                    @empty
                                    <div class="faq-item border p-3 mb-3">
                                        <div class="form-group mb-2">
                                            <label>Question</label>
                                            <input type="text" name="pfaqs[0][question]" class="form-control" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Answer</label>
                                            <textarea name="pfaqs[0][answer]" class="form-control" rows="2" required></textarea>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                    </div>
                                    @endforelse
                                </div>
                                
                                <button type="button" id="add-faq" class="btn btn-secondary btn-sm">+ Add FAQ</button>
                                </div>
                            </div>
                            <!--Faqs-->





                                <div class="form-group row mb-4">
                                    <label for="meta_title" class="col-form-label col-lg-2">Meta Title </label>
                                    <div class="col-lg-10">
                                        <input name="meta_title" type="text" class="form-control" id="meta_title"
                                            value="{{ $property->meta_title}}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="meta_keywords" class="col-form-label col-lg-2">Meta Keywords </label>
                                    <div class="col-lg-10">
                                        <input name="meta_keywords" type="text" class="form-control" id="meta_keywords"
                                            value="{{ $property->meta_keywords}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="meta_description" class="col-form-label col-lg-2">Meta Description
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="meta_description" rows="4" class="form-control"
                                            id="meta_description">{{ $property->meta_keywords}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="schema_seo" class="col-form-label col-lg-2">Schema
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="schema_seo" rows="4" class="form-control"
                                            id="schema_seo" placeholder="Enter Schema...">{{ $property->schema_seo}}</textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2" for="customSwitchsizemd">Status
                                        (Inactive/Active)</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <!-- Hidden input to ensure the value is 0 if the checkbox is unchecked -->
                                            <input type="hidden" name="status" value="0">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                name="status" value="1" {{ $property->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update
                                            Property</button>
                                        <button type="button" class="btn btn-secondary"
                                            onclick="window.location.href='{{url('')}}/admin/properties/'"><i
                                                class="fas fa-reply"></i> Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Function to generate slug based on input value
    $("#heading").on("keyup", function() {
        var headingValue = $(this).val();
        var slugValue = slugify(headingValue);
        $("#slug").val(slugValue);
    });

    // Function to slugify text
    function slugify(text) {
        return text
            .toString()
            .toLowerCase()
            .replace(/\s+/g, "-") // Replace spaces with -
            .replace(/[^\w\-]+/g, "") // Remove all non-word chars
            .replace(/\-\-+/g, "-") // Replace multiple - with single -
            .replace(/^-+/, "") // Trim - from start of text
            .replace(/-+$/, ""); // Trim - from end of text
    }

    // Function to toggle sub_property field based on property_type
    function toggleSubPropertyField() {
        var propertyType = $("select[name='property_type']").val();
        if (propertyType === 'commercial') {
            $("#sub_property_container").show();
        } else {
            $("#sub_property_container").hide();
            $("#sub_property").val("");
        }
    }

    // Initial toggle based on current property_type
    toggleSubPropertyField();

    // Bind change event to property_type select
    $("select[name='property_type']").on("change", function() {
        toggleSubPropertyField();
    });

    // Repeater functionality
    $(document).on("click", ".add-repeater-item", function() {
        var repeaterContainer = $(this).closest(".form-group").find(".outer-repeater");
        var firstRepeaterItem = repeaterContainer.find(".outer-repeater-item:first").clone();

        // Clear all inputs in the cloned item
        firstRepeaterItem.find("input").each(function() {
            $(this).val("");
        });

        // Update input names with new indices
        firstRepeaterItem.find("input").each(function() {
            var name = $(this).attr("name");
            if (name) {
                var match = name.match(/\[(\d+)\]/);
                if (match) {
                    var index = parseInt(match[1]) + repeaterContainer.find(
                        ".outer-repeater-item").length;
                    $(this).attr("name", name.replace(/\[(\d+)\]/, "[" + index + "]"));
                }
            }
        });

        // Append the new item to the repeater
        repeaterContainer.append(firstRepeaterItem);
    });

    // Remove repeater item
    $(document).on("click", ".remove-repeater-item", function() {
        var repeaterContainer = $(this).closest(".outer-repeater");
        if (repeaterContainer.find(".outer-repeater-item").length > 1) {
            $(this).closest(".outer-repeater-item").remove();
        } else {
            alert("At least one item is required.");
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const element = document.getElementById('choices-multiple-remove-button');
    const choices = new Choices(element, {
        removeItemButton: true, // Enables the remove button
        placeholder: true,
        placeholderValue: 'Choose Amenity',
        searchEnabled: true // Optional: Enables search functionality
    });
});
</script>




<script>
let faqIndex = {{ count($property->pfaqs) }};

document.getElementById('add-faq').addEventListener('click', function () {
    const wrapper = document.getElementById('faq-repeater-wrapper');
    const faqHTML = `
        <div class="faq-item border p-3 mb-3">
            <div class="form-group mb-2">
                <label>Question</label>
                <input type="text" name="pfaqs[${faqIndex}][question]" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label>Answer</label>
                <textarea name="pfaqs[${faqIndex}][answer]" class="form-control" rows="2" required></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
        </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', faqHTML);
    faqIndex++;
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-faq')) {
        e.target.closest('.faq-item').remove();
    }
});
</script>


<script>
let priceIndex = {{ $lastIndex ?? 1 }};
function addPriceItem() {
    const html = `
    <div class="price-item mb-3 border p-3">
        <div class="row">
            <div class="col-md-4">
                <label>Unit Type</label>
                <input type="text" name="prices[\${priceIndex}][unit_type]" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Unit Size</label>
                <input type="text" name="prices[\${priceIndex}][unit_size]" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Price</label>
                <input type="text" name="prices[\${priceIndex}][price]" class="form-control">
            </div>
        </div>
    </div>`;
    document.getElementById('price-repeater').insertAdjacentHTML('beforeend', html);
    priceIndex++;
}
</script>



@endpush
@stop