@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Builders')
@section('content')

@push('styles')

@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Builders</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add Builders</li>
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
                            <h4 class="card-title">Create New Builders</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.builders.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row mb-4">
                                    <label for="name" class="col-form-label col-lg-2">Name </label>
                                    <div class="col-lg-10">
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Enter Builder Name..." required>
                                    </div>
                                </div>
                                
                                
                                 <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Slug </label>
                                    <div class="col-lg-10">
                                        <input name="slug" type="text" class="form-control" id="slug"
                                            placeholder="Slug Automaticaly..." readonly>
                                    </div>
                                </div>

                                
                                
                                <div class="form-group row mb-4">
                                    <label for="cities" class="col-form-label col-lg-2">City</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="cities[]"
                                            id="choices-multiple-remove-button" multiple>
                                            <option value="">Choose City</option>
                                            @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <!-- Years of Experience -->
                                <div class="form-group row mb-4">
                                    <label for="years_of_experience" class="col-form-label col-lg-2">Years of Experience</label>
                                    <div class="col-lg-10">
                                        <input name="years_of_experience" type="number" min="0" class="form-control" id="years_of_experience" placeholder="Enter Years of Experience" required>
                                    </div>
                                </div>
                                
                                <!-- Total Projects -->
                                <div class="form-group row mb-4">
                                    <label for="total_projects" class="col-form-label col-lg-2">Total Projects</label>
                                    <div class="col-lg-10">
                                        <input name="total_projects" type="number" min="0" class="form-control" id="total_projects" placeholder="Enter Total Projects" required>
                                    </div>
                                </div>
                                
                                <!-- Total Cities -->
                                <div class="form-group row mb-4">
                                    <label for="total_cities" class="col-form-label col-lg-2">Total Cities</label>
                                    <div class="col-lg-10">
                                        <input name="total_cities" type="number" min="0" class="form-control" id="total_cities" placeholder="Enter Total Cities" required>
                                    </div>
                                </div>




                                <div class="form-group row mb-4">
                                    <label for="logo" class="col-form-label col-lg-2">Builder Logo </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 190px / H: 106px) SVG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="logo" name="logo" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-4">
                                    <label for="content" class="col-form-label col-lg-2">Content
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1" name="content"></textarea>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2">Status (Inactive/Active)</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                name="status" value="1">
                                        </div>
                                    </div>
                                </div>




                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Create
                                            Builder</button>
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
// Function to generate slug based on input value
function slugify(text) {
    return text.toString().toLowerCase()
        .replace(/\s+/g, '-') // Replace spaces with -
        .replace(/[^\w\-]+/g, '') // Remove all non-word chars
        .replace(/\-\-+/g, '-') // Replace multiple - with single -
        .replace(/^-+/, '') // Trim - from start of text
        .replace(/-+$/, ''); // Trim - from end of text
}

// Event listener for input field
document.getElementById('name').addEventListener('keyup', function() {
    var headingValue = document.getElementById('name').value;
    var slugValue = slugify(headingValue);
    document.getElementById('slug').value = slugValue;
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const element = document.getElementById('choices-multiple-remove-button');
    const choices = new Choices(element, {
        removeItemButton: true, // Enables the remove button
        placeholder: true,
        placeholderValue: 'Choose City',
        searchEnabled: true // Optional: Enables search functionality
    });
});
</script>
@endpush

@stop