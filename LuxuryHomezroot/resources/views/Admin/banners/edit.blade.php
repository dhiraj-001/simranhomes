@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Banner')
@section('content')

@push('styles')
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Banner</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Banner</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h4 class="card-title">Update Banner</h4></div>
                        <div class="card-body">
                            <form action="{{ route('Admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Page Dropdown -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Page</label>
                                    <div class="col-lg-10">
                                        <select name="page" class="form-control" required>
                                            <option value="home" {{ $banner->page == 'home' ? 'selected' : '' }}>Home</option>
                                            <option value="about" {{ $banner->page == 'about' ? 'selected' : '' }}>About</option>
                                            <option value="property" {{ $banner->page == 'property' ? 'selected' : '' }}>Property</option>
                                            <option value="blogs" {{ $banner->page == 'blogs' ? 'selected' : '' }}>Blogs</option>
                                            <option value="location" {{ $banner->page == 'location' ? 'selected' : '' }}>Location</option>
                                            <option value="developers" {{ $banner->page == 'developers' ? 'selected' : '' }}>Developers</option>
                                            <option value="contact" {{ $banner->page == 'contact' ? 'selected' : '' }}>Contact Us</option>
                                            <option value="privacy" {{ $banner->page == 'privacy' ? 'selected' : '' }}>Privacy Policy</option>
                                            <option value="terms" {{ $banner->page == 'terms' ? 'selected' : '' }}>Terms & Condition</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Type -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Banner Type</label>
                                    <div class="col-lg-10">
                                        <select name="type" class="form-control" id="bannerType" required>
                                            <option value="">Select Type</option>
                                            <option value="video" {{ $banner->type == 'video' ? 'selected' : '' }}>Video</option>
                                            <option value="image" {{ $banner->type == 'image' ? 'selected' : '' }}>Image Slider</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Video Upload -->
                                <div class="form-group row mb-4" id="videoUpload" style="{{ $banner->type == 'video' ? '' : 'display: none;' }}">
                                    <label class="col-form-label col-lg-2">Upload Video</label>
                                    <div class="col-lg-10">
                                        @if($banner->video)
                                            <video width="200" controls>
                                                <source src="{{ asset('storage/app/public/' . $banner->video) }}" type="video/mp4">
                                            </video><br><br>
                                        @endif
                                        <input type="file" name="video" accept="video/*" class="form-control">
                                    </div>
                                </div>

                                <!-- Images Upload -->
                               <div class="sortable-images d-flex flex-wrap gap-2" id="sortable-image-list">
                            @if($banner->images)
                                @foreach(json_decode($banner->images, true) as $key => $img)
                                    <div class="image-item position-relative" data-index="{{ $key }}">
                                        <img src="{{ asset('storage/app/public/' . $img['image']) }}" width="100" class="me-2 mb-2">
                                        <input type="hidden" name="existing_images[]" value="{{ $img['image'] }}">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 remove-image">&times;</button>
                                    </div>
                                @endforeach
                            @endif
                            </div>
                            
                             <input type="file" name="images[]" class="form-control mb-3" multiple accept="image/*">


                                <!-- Sub Heading -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Sub Heading</label>
                                    <div class="col-lg-10">
                                        <input name="sub_heading" type="text" class="form-control" value="{{ $banner->sub_heading }}">
                                    </div>
                                </div>

                                <!-- Heading -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Heading</label>
                                    <div class="col-lg-10">
                                        <input name="heading" type="text" class="form-control" value="{{ $banner->heading }}">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        <textarea name="description" class="form-control" rows="3">{{ $banner->description }}</textarea>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Status</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" name="status" value="1" {{ $banner->status == 1 ? 'checked' : '' }} id="customSwitchsizemd">
                                            <label class="form-check-label" for="customSwitchsizemd">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update Banner</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col-12 -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
    // Sortable initialization
    new Sortable(document.getElementById('sortable-image-list'), {
        animation: 150,
        onEnd: function () {
            updateImageOrder();
        }
    });

    // Remove image
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-image')) {
            e.target.closest('.image-item').remove();
            updateImageOrder();
        }
    });

    // Update order inputs
    function updateImageOrder() {
        let newImages = [];
        document.querySelectorAll('.image-item').forEach((item, index) => {
            const input = item.querySelector('input[name="existing_images[]"]');
            if (input) {
                newImages.push(input.value);
            }
        });

        // Optional: send to hidden input (if you want)
        // or handle in controller with `existing_images[]` order
    }
</script>
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
