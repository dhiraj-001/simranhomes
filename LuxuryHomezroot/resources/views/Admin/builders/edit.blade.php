@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Builder')
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
                        <h4 class="mb-sm-0 font-size-18">Edit Builder</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('Admin.builders.index') }}">Builder</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Builder</li>
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
                            <h4 class="card-title">Edit Builder Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.builders.update', $builder->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')




                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-form-label col-lg-2">Builder Name</label>
                                    <div class="col-lg-10">
                                        <input name="name" type="text" class="form-control" id="name"
                                            value="{{ old('name', $builder->name) }}">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Slug</label>
                                    <div class="col-lg-10">
                                        <input name="slug" type="text" class="form-control" id="slug"
                                            value="{{ old('slug', $builder->slug) }}" readonly>
                                    </div>
                                </div>


                                   <div class="form-group row mb-4">
                                    <label for="cities" class="col-form-label col-lg-2">City</label>
                                    <div class="col-lg-10">
                                        <select class="form-control" name="cities[]" id="choices-multiple-remove-button" multiple>
                                            @foreach($cities as $city)
                                            <option value="{{ $city->id }}" 
                                                {{ in_array($city->id, $builder->cities->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $city->city_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <!-- Years of Experience -->
                                <div class="form-group row mb-4">
                                    <label for="years_of_experience" class="col-form-label col-lg-2">Years of Experience</label>
                                    <div class="col-lg-10">
                                        <input 
                                            name="years_of_experience" 
                                            type="number" 
                                            min="0" 
                                            class="form-control" 
                                            id="years_of_experience" 
                                            value="{{ old('years_of_experience', $builder->years_of_experience) }}"
                                            placeholder="Enter Years of Experience"
                                        >
                                    </div>
                                </div>
                                
                                <!-- Total Projects -->
                                <div class="form-group row mb-4">
                                    <label for="total_projects" class="col-form-label col-lg-2">Total Projects</label>
                                    <div class="col-lg-10">
                                        <input 
                                            name="total_projects" 
                                            type="number" 
                                            min="0" 
                                            class="form-control" 
                                            id="total_projects" 
                                            value="{{ old('total_projects', $builder->total_projects) }}"
                                            placeholder="Enter Total Projects"
                                        >
                                    </div>
                                </div>
                                
                                <!-- Total Cities -->
                                <div class="form-group row mb-4">
                                    <label for="total_cities" class="col-form-label col-lg-2">Total Cities</label>
                                    <div class="col-lg-10">
                                        <input 
                                            name="total_cities" 
                                            type="number" 
                                            min="0" 
                                            class="form-control" 
                                            id="total_cities" 
                                            value="{{ old('total_cities', $builder->total_cities) }}"
                                            placeholder="Enter Total Cities"
                                        >
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="current_logo" class="col-form-label col-lg-2">Logo</label>
                                    <div class="col-lg-1">
                                        @if($builder->logo)
                                        <img src="{{ asset('storage/app/public/' . $builder->logo) }}" alt="Logo"
                                            class="me-2" style="max-width: 100%;">
                                        @else
                                        <span>No logo uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="logo">Upload New Logo:</label>
                                        <label class="image-upload-guide">(Size: W: 190px / H: 106px) SVG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="logo" name="logo" class="form-control">

                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="content" class="col-form-label col-lg-2">Content </label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1"
                                            name="content">{{ $builder->content }}</textarea>
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
                                                name="status" value="1" {{ $builder->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>




                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update
                                            Builder</button>
                                        <button type="button" class="btn btn-secondary"
                                            onclick="window.location.href='/admin/builders/'"><i
                                                class="fas fa-reply"></i>
                                            Cancel</button>
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
        removeItemButton: true,
        placeholder: true,
        placeholderValue: 'Choose City',
        searchEnabled: true
    });
});
</script>
@endpush

@stop