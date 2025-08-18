@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Amenity')
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
                        <h4 class="mb-sm-0 font-size-18">Edit Amenity</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('Admin.amenities.index') }}">Amenity</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Amenity</li>
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
                            <h4 class="card-title">Edit Amenity Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.amenities.update', $amenity->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')




                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-form-label col-lg-2">Amenity Title</label>
                                    <div class="col-lg-10">
                                        <input name="title" type="text" class="form-control" id="title"
                                            value="{{ old('title', $amenity->title) }}">
                                    </div>
                                </div>





                                <div class="form-group row mb-4">
                                    <label for="current_image" class="col-form-label col-lg-2">Image</label>
                                    <div class="col-lg-1">
                                        @if($amenity->image)
                                        <img src="{{ asset('storage/app/public/' . $amenity->image) }}"
                                            alt="Current Image" class="me-2" style="max-width: 100%;">
                                        @else
                                        <span>No image uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="main_image">Upload New Main Image:</label>
                                        <label class="image-upload-guide">(Size: W: 46px / H: 46px) SVG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="image" name="image" class="form-control">

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
                                                name="status" value="1" {{ $amenity->status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>




                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update
                                            Amenity</button>
                                        <button type="button" class="btn btn-secondary"
                                            onclick="window.location.href='/admin/amenities/'"><i
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


@endpush

@stop