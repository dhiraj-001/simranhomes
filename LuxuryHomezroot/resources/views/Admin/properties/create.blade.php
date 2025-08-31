@extends('Admin.layouts.admin_master') @section('title', 'Admin | Add Property') @section('content') @push('styles')
<!-- Add any specific CSS you need here -->
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create Property</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Properties</a></li>
                                <li class="breadcrumb-item active">Create Property</li>
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
                            <h4 class="card-title">Create New Property</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.properties.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-form-label col-lg-2">Heading </label>
                                    <div class="col-lg-10">
                                        <input name="heading" type="text" class="form-control" id="heading"
                                            placeholder="Enter Property Heading..." required />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Slug </label>
                                    <div class="col-lg-10">
                                        <input name="slug" type="text" class="form-control" id="slug"
                                            placeholder="Slug Automaticaly..." readonly />
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row mb-4">
                                    <label for="property_city_wise" class="col-form-label col-lg-2">Property in
                                        City</label>
                                    <div class="col-lg-10">
                                        <select name="property_city_wise" class="form-select" required>
                                            <option value="">Choose City</option>
                                            @foreach($cities as $city)
                                            <option value="{{ $city->slug }}">{{ $city->city_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="unit_size" class="col-form-label col-lg-2">Unit Size </label>
                                    <div class="col-lg-10">
                                        <input name="unit_size" type="text" class="form-control" id="unit_size"
                                            placeholder="Enter Unit Size..." />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="configuration" class="col-form-label col-lg-2">Configuration </label>
                                    <div class="col-lg-10">
                                        <input name="configuration" type="text" class="form-control" id="configuration"
                                            placeholder="Enter Configuration..." />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="price" class="col-form-label col-lg-2">Price </label>
                                    <div class="col-lg-10">
                                        <input name="price" type="text" class="form-control" id="price"
                                            placeholder="Enter Price..." />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="main_image" class="col-form-label col-lg-2">Property Main Image </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 339px / H: 213px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control"
                                            required />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="banner_image" class="col-form-label col-lg-2">Banner Image </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 1280px / H: 651px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="banner_image" name="banner_image" class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="property_type" class="col-form-label col-lg-2">Property Type</label>
                                    <div class="col-lg-10">
                                        <select name="property_type" class="form-select" required>
                                            <option value="">Choose Type</option>
                                            <option value="residential">Residential</option>
                                            <option value="commercial">Commercial</option>
                                            <option value="new-launch">New Launch</option>
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
                                                {{ old('property_sub_type') == $subtype->slug ? 'selected' : '' }}>
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
                                        <option value="Retail Shops" {{ old('sub_property') == 'Retail Shops' ? 'selected' : '' }}>Retail Shops</option>
                                        <option value="Office spaces" {{ old('sub_property') == 'Office spaces' ? 'selected' : '' }}>Office spaces</option>
                                    </select>
                                </div>
                            </div>

                                
                                
                                
                                <div class="form-group row mb-4">
                                <label for="property_status" class="col-form-label col-lg-2">Property Status</label>
                                <div class="col-lg-10">
                                    <select name="property_status" class="form-select" required>
                                        <option value="">Choose Status</option>
                                        <option value="new-launch">New Launch</option>
                                        <option value="pre-launch">Pre-Launch</option>
                                        <option value="under-construction">Under Construction</option>
                                        <option value="ready-to-move">Ready To Move</option>
                                        <option value="completed">Completed</option>
                                        <option value="resale">Resale</option>
                                        <option value="available">Available</option>
                                        <option value="sold-out">Sold Out</option>
                                        <option value="coming-soon">Coming Soon</option>
                                    </select>
                                </div>
                            </div>




                                <!--Property Multiple Amenities Relation--->
                                <div class="form-group row mb-4">
                                    <label for="amenities" class="col-form-label col-lg-2">Amenities</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="amenities[]"
                                            id="choices-multiple-remove-button" multiple>
                                            <option value="">Choose Amenity</option>
                                            @foreach($amenities as $amenity)
                                            <option value="{{ $amenity->id }}">{{ $amenity->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group row mb-4">
                                <label for="builder_id" class="col-form-label col-lg-2">Select Builder</label>
                                 <div class="col-lg-10">
                                <select name="builder_id" id="builder_id" class="form-control">
                                    <option value="">-- Select Builder --</option>
                                    @foreach($builders as $builder)
                                        <option value="{{ $builder->id }}">
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
                                    <input type="checkbox" name="is_trending_project" id="is_trending_project" value="1" class="form-check-input">
                                    <label class="form-check-label" for="is_trending_project">Mark as Trending</label>
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
                                >
                                <label class="form-check-label" for="is_featured">
                                    Mark as Featured
                                </label>
                            </div>
                        </div>
                    </div>



                                
                                
                                <!--About section-->
                                 <div class="form-group row mb-4">
                                    <label for="highlights_heading" class="col-form-label col-lg-2">About Heading </label>
                                    <div class="col-lg-10">
                                        <input name="about_heading" type="text" class="form-control" id="about_heading"
                                            placeholder="Enter About Heading..." required />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="highlights_content" class="col-form-label col-lg-2">About Content
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1" name="about_content"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="about_image" class="col-form-label col-lg-2">About Image
                                    </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 1048px / H: 552px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="about_image" name="about_image"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <!-- / About section-->

                                <!--Highlight section-->   
                                <div class="form-group row mb-4">
                                    <label for="highlights_heading" class="col-form-label col-lg-2">Highlights Heading </label>
                                    <div class="col-lg-10">
                                        <input name="highlights_heading" type="text" class="form-control" id="highlights_heading"
                                            placeholder="Enter Highlights Heading..." required />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="highlights_content" class="col-form-label col-lg-2">Highlights Content
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-2" name="highlights_content"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="highlights_img" class="col-form-label col-lg-2">Highlights Image
                                    </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 1048px / H: 552px) JPG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="highlights_img" name="highlights_img"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <!-- / Highlight section--> 

                                <!-- Repeater for Floor Plans with Property Floor Plan Relation -->
                                <div class="form-group row mb-4">
                                    <label for="floor_plans" class="col-form-label col-lg-2">Floor Plans</label>
                                    <div class="col-lg-10">
                                        <div class="outer-repeater">
                                            <div class="outer-repeater-item">
                                                <div class="row mb-2">
                                                    <div class="col-lg-3">
                                                        <input type="text" name="floor_plans[0][name]"
                                                            class="form-control" placeholder="Floor Plan Name" required />
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="text" name="floor_plans[0][size]"
                                                            class="form-control" placeholder="Size" required />
                                                        <label class="image-upload-guide">(W: 221px / H: 208px)</label>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <select name="floor_plans[0][type]" class="form-control">
                                                            <option value="">Select Type</option>
                                                            <option value="1BHK">1 BHK</option>
                                                            <option value="2BHK">2 BHK</option>
                                                            <option value="3BHK">3 BHK</option>
                                                            <option value="4BHK">4 BHK</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="file" name="floor_plans[0][image]"
                                                            class="form-control" required />
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-repeater-item">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success add-repeater-item">Add Another Floor Plan</button>
                                    </div>
                                </div>
                                <!-- End Repeater for Floor Plans -->




                                <!-- Repeater for Gallery with  Property Gallery Relation--->
                                <div class="form-group row mb-4">
                                    <label for="galleries" class="col-form-label col-lg-2">Gallery</label>
                                    <div class="col-lg-10">
                                        <div class="outer-repeater">
                                            <div class="outer-repeater-item">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <input type="text" name="galleries[0][name]"
                                                            class="form-control" placeholder="Image Title" required />
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <input type="file" name="galleries[0][image]"
                                                            class="form-control" required />
                                                             <label class="image-upload-guide">(Size: W: 380 px / H: 308 px)</label>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-repeater-item">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success add-repeater-item">Add Another
                                            Gallery Image</button>
                                    </div>
                                </div>
                                <!-- End Repeater for Gallery -->
                                
                                
                                 <!-- Repeater for Location Advantage with  Property Location Advantage Relation--->
                                <div class="form-group row mb-4">
                                    <label for="location_advantage" class="col-form-label col-lg-2">Location
                                        Advantage</label>
                                    <div class="col-lg-10">
                                        <div class="outer-repeater">
                                            <div class="outer-repeater-item">
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <input type="text" name="location_advantage[0][name]"
                                                            class="form-control" placeholder="Location Name" required />
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="text" name="location_advantage[0][distance]"
                                                            class="form-control" placeholder="Distance" required />
                                                    </div>
                                                    
                                                    <div class="col-lg-2">
                                                        <select name="location_advantage[0][type]" class="form-control">
                                                            <option value="">Select Type</option>
                                                            <option value="Education">Education</option>
                                                            <option value="Transport">Transport</option>
                                                            <option value="Hospital">Hospital</option>
                                                            <option value="Connectivity">Connectivity</option>
                                                        </select>
                                                    </div>
                                                   
                                                    <div class="col-lg-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-repeater-item">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success add-repeater-item">Add Another
                                            Advantage</button>
                                    </div>
                                </div>
                                <!-- End Repeater for Location Advantage -->
                                
                                
                                
                                
                                <!--Price Section-->
                                <div id="price-repeater">
                                <div class="price-item mb-3 border p-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Unit Type</label>
                                            <input type="text" name="prices[0][unit_type]" class="form-control" placeholder="e.g. 4 BHK Apartments">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit Size</label>
                                            <input type="text" name="prices[0][unit_size]" class="form-control" placeholder="e.g. 7400 Sq. Ft.">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Price</label>
                                            <input type="text" name="prices[0][price]" class="form-control" placeholder="e.g. ₹5 Cr / On Request">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="addPriceItem()">+ Add More</button>
                            <!--Price-->


                                
                                
                                
                                

                                <div class="form-group row mb-4">
                                    <label for="location" class="col-form-label col-lg-2">Location</label>
                                    <div class="col-lg-10">
                                        <input name="location" type="text" class="form-control" id="location"
                                            placeholder="Enter Location..." required />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="direction_link" class="col-form-label col-lg-2">Location Map
                                        Link</label>
                                    <div class="col-lg-10">
                                        <input name="direction_link" type="text" class="form-control"
                                            id="direction_link" placeholder="Enter Location Map Link..." required />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="brochure" class="col-form-label col-lg-2">Brochure
                                    </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">Pdf only -
                                            Max. 5 mb Filesize</label>
                                        <input type="file" id="brochure" name="brochure" class="form-control"
                                            required />
                                    </div>
                                </div>



                              
                                
                               

                                <div class="form-group row mb-4">
                                    <label for="map" class="col-form-label col-lg-2">Map
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="map" rows="4" class="form-control">Enter Map Iframe</textarea> 
                                    </div>
                                </div>
                                
                                <!--FAQs-->
                                <div class="form-group row mb-4">
                                <label class="col-form-label col-lg-2">Properties FAQs</label>
                                <div class="col-lg-10">
                                    <div id="faq-repeater-wrapper">
                                        <div class="faq-item border p-3 mb-3">
                                            <div class="form-group mb-2">
                                                <label>Question</label>
                                                <input type="text" name="pfaqs[0][question]" class="form-control" placeholder="Enter question..." required />
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Answer</label>
                                                <textarea name="pfaqs[0][answer]" class="form-control" rows="2" placeholder="Enter answer..." required></textarea>
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                        </div>
                                    </div>
                                    <button type="button" id="add-faq" class="btn btn-secondary btn-sm">+ Add FAQ</button>
                                </div>
                            </div>
                            <!--FAQs-->


                                <div class="form-group row mb-4">
                                    <label for="meta_title" class="col-form-label col-lg-2">Meta Title </label>
                                    <div class="col-lg-10">
                                        <input name="meta_title" type="text" class="form-control" id="meta_title"
                                            placeholder="Enter Meta Title..." required />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="meta_keywords" class="col-form-label col-lg-2">Meta Keywords </label>
                                    <div class="col-lg-10">
                                        <input name="meta_keywords" type="text" class="form-control" id="meta_keywords"
                                            placeholder="Enter Meta Keywords..." required />
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="meta_description" class="col-form-label col-lg-2">Meta Description
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="meta_description" rows="4" class="form-control"
                                            id="meta_description" placeholder="Enter Meta  Description..."></textarea>
                                    </div>
                                </div>
                                
                                
                                
                                 <div class="form-group row mb-4">
                                    <label for="schema_seo" class="col-form-label col-lg-2">Schema
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="schema_seo" rows="4" class="form-control"
                                            id="schema_seo" placeholder="Enter Schema..."></textarea>
                                    </div>
                                </div>
                                
                                
                                

                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2">Status (Inactive/Active)</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                name="status" value="1" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Create
                                            Property</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
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
let faqIndex = 1;

document.getElementById('add-faq').addEventListener('click', function () {
    const wrapper = document.getElementById('faq-repeater-wrapper');

    const faqHTML = `
    <div class="faq-item border p-3 mb-3">
        <div class="form-group mb-2">
            <label>Question</label>
            <input type="text" name="pfaqs[${faqIndex}][question]" class="form-control" placeholder="Enter question..." required>
        </div>
        <div class="form-group mb-2">
            <label>Answer</label>
            <textarea name="pfaqs[${faqIndex}][answer]" class="form-control" rows="2" placeholder="Enter answer..." required></textarea>
        </div>
        <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
    </div>
    `;

    wrapper.insertAdjacentHTML('beforeend', faqHTML);
    faqIndex++;
});

// Remove FAQ
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-faq')) {
        e.target.closest('.faq-item').remove();
    }
});
</script>





<script>
let priceIndex = 1;
function addPriceItem() {
    const html = `
    <div class="price-item mb-3 border p-3">
        <div class="row">
            <div class="col-md-4">
                <label>Unit Type</label>
                <input type="text" name="prices[${priceIndex}][unit_type]" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Unit Size</label>
                <input type="text" name="prices[${priceIndex}][unit_size]" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Price</label>
                <input type="text" name="prices[${priceIndex}][price]" class="form-control">
            </div>
        </div>
    </div>`;
    document.getElementById('price-repeater').insertAdjacentHTML('beforeend', html);
    priceIndex++;
}
</script>


@endpush @stop