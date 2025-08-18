@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Add Banner')
@section('content')

@push('styles')
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Banner</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Banner</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Create New Banner</h4></div>
                        <div class="card-body">
                            <form action="{{ route('Admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Page Dropdown -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Page</label>
                                    <div class="col-lg-10">
                                        <select name="page" class="form-control" required>
                                            <option value="">Select Page</option>
                                            <option value="home">Home</option>
                                            <option value="about">About</option>
                                            <option value="property">Property</option>
                                            <option value="location">Location</option>
                                            <option value="developers">Developers</option>
                                            <option value="contact">Contact Us</option>
                                            <option value="blogs">Blogs</option>
                                            <option value="privacy">Privacy Policy</option>
                                            <option value="terms">Terms & Condition</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Type -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Banner Type</label>
                                    <div class="col-lg-10">
                                        <select name="type" class="form-control" id="bannerType" required>
                                            <option value="">Select Type</option>
                                            <option value="video">Video</option>
                                            <option value="image">Image Slider</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Video Upload -->
                                <div class="form-group row mb-4" id="videoUpload" style="display: none;">
                                    <label class="col-form-label col-lg-2">Upload Video</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="video" accept="video/*" class="form-control">
                                    </div>
                                </div>

                                <!-- Image Upload (multiple) -->
                                <div class="form-group row mb-4" id="imageUpload" style="display: none;">
                                    <label class="col-form-label col-lg-2">Upload Images</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                                    </div>
                                </div>

                                <!-- Sub Heading -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Sub Heading (optional)</label>
                                    <div class="col-lg-10">
                                        <input name="sub_heading" type="text" class="form-control" placeholder="Banner Sub Heading">
                                    </div>
                                </div>
                                
                                
                                
                                <!-- Heading -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Heading (optional)</label>
                                    <div class="col-lg-10">
                                        <input name="heading" type="text" class="form-control" placeholder="Banner Heading">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Description (optional)</label>
                                    <div class="col-lg-10">
                                        <textarea name="description" class="form-control" rows="3" placeholder="Banner Description"></textarea>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Status</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" name="status" value="1" id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Create Banner</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

@push('scripts')
<script>
    const typeSelect = document.getElementById('bannerType');
    const videoField = document.getElementById('videoUpload');
    const imageField = document.getElementById('imageUpload');

    typeSelect.addEventListener('change', function () {
        const value = this.value;
        if (value === 'video') {
            videoField.style.display = 'flex';
            imageField.style.display = 'none';
        } else if (value === 'image') {
            videoField.style.display = 'none';
            imageField.style.display = 'flex';
        } else {
            videoField.style.display = 'none';
            imageField.style.display = 'none';
        }
    });
</script>
@endpush

@endsection
