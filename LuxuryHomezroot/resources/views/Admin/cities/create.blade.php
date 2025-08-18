@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Cities')
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
                        <h4 class="mb-sm-0 font-size-18">Add City</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add City</li>
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
                            <h4 class="card-title">Create New City</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.cities.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-form-label col-lg-2">City Name </label>
                                    <div class="col-lg-10">
                                        <input name="city_name" type="text" class="form-control" id="city_name"
                                            placeholder="Enter City Name ..." required>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Slug </label>
                                    <div class="col-lg-10">
                                        <input name="slug" type="text" class="form-control" id="slug"
                                            placeholder="Slug Automaticaly...">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row mb-4">
                                    <label for="punchline" class="col-form-label col-lg-2">Punch Line </label>
                                    <div class="col-lg-10">
                                        <input name="punchline" type="text" class="form-control" id="punchline"
                                            placeholder="Enter Punch Line ..." required>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="main_image" class="col-form-label col-lg-2">Main Image </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 380px / H: 266px) JPG or PNG only -
                                            Max. 512kb Filesize</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control">
                                        @error('main_image')
                                            <div class="alert alert-danger alert-dismissible alert-outline fade show" role="alert">
                                            <strong>Error</strong> - {{ $message }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="short_content" class="col-form-label col-lg-2">Short Content
                                    </label>
                                    <div class="col-lg-10">
                                        <textarea name="short_content" rows="4" cols="50" class="form-control"
                                            id="short_content" placeholder="Enter Short Content..."></textarea>
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
                                            City</button>
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
document.getElementById('city_name').addEventListener('keyup', function() {
    var headingValue = document.getElementById('city_name').value;
    var slugValue = slugify(headingValue);
    document.getElementById('slug').value = slugValue;
});
</script>
@endpush

@stop