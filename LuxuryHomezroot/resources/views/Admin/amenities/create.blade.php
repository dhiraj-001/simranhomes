@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Amenities')
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
                        <h4 class="mb-sm-0 font-size-18">Add Amenities</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add Amenities</li>
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
                            <h4 class="card-title">Create New Amenities</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.amenities.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-form-label col-lg-2">Title </label>
                                    <div class="col-lg-10">
                                        <input name="title" type="text" class="form-control" id="heading"
                                            placeholder="Enter Amenity Title..." required>
                                    </div>
                                </div>



                                <div class="form-group row mb-4">
                                    <label for="image" class="col-form-label col-lg-2">Amenities Image </label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Size: W: 46px / H: 46px) SVG or PNG only -
                                            Max. 50kb Filesize</label>
                                        <input type="file" id="image" name="image" class="form-control">
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
                                            Amenity</button>
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