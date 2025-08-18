@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Property Sub Type')
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
                        <h4 class="mb-sm-0 font-size-18">Edit Property Sub Type</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Property Sub Type</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Property Sub Type</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.psubtypes.update', $psubtype->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label for="psubtype_name" class="col-form-label col-lg-2">Property Sub Type Name</label>
                                    <div class="col-lg-10">
                                        <input name="psubtype_name" type="text" class="form-control" id="psubtype_name"
                                            value="{{ old('psubtype_name', $psubtype->psubtype_name) }}"
                                            placeholder="Enter Property Sub Type Name ..." required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Slug</label>
                                    <div class="col-lg-10">
                                        <input name="slug" type="text" class="form-control" id="slug"
                                            value="{{ old('slug', $psubtype->slug) }}"
                                            placeholder="Slug Automaticaly...">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="main_image" class="col-form-label col-lg-2">Main Image</label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 380px / H: 266px) JPG or PNG only - Max. 512kb</label>
                                        <input type="file" id="main_image" name="main_image" class="form-control">
                                        @if($psubtype->main_image)
                                            <img src="{{ asset('uploads/psubtypes/' . $psubtype->main_image) }}" alt="Current Image" class="mt-2" width="120">
                                        @endif
                                        @error('main_image')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2">Status (Inactive/Active)</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                name="status" value="1"
                                                {{ $psubtype->status ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update Property Sub Type</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- card-body -->
                    </div>
                </div>
            </div> <!-- row -->

        </div> <!-- container-fluid -->
    </div>
</div>

@push('scripts')
<script>
    // Function to generate slug based on input
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-') // Replace spaces with -
            .replace(/[^\w\-]+/g, '') // Remove all non-word chars
            .replace(/\-\-+/g, '-') // Replace multiple - with single -
            .replace(/^-+/, '') // Trim - from start of text
            .replace(/-+$/, ''); // Trim - from end of text
    }

    // Event listener for auto slug generation
    document.getElementById('psubtype_name').addEventListener('keyup', function() {
        var headingValue = this.value;
        var slugValue = slugify(headingValue);
        document.getElementById('slug').value = slugValue;
    });
</script>
@endpush

@stop
