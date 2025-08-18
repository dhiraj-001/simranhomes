@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Testimonial')
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
                        <h4 class="mb-sm-0 font-size-18">Edit Testimonial</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Edit Testimonial</li>
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
                            <h4 class="card-title">Update Testimonial</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group row mb-4">
                                    <label for="name" class="col-form-label col-lg-2">Name </label>
                                    <div class="col-lg-10">
                                        <input name="name" type="text" class="form-control" id="name"
                                            value="{{ old('name', $testimonial->name) }}" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="position" class="col-form-label col-lg-2">Position </label>
                                    <div class="col-lg-10">
                                        <input name="position" type="text" class="form-control" id="position"
                                            value="{{ old('position', $testimonial->position) }}" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="message" class="col-form-label col-lg-2">Message</label>
                                    <div class="col-lg-10">
                                        <textarea name="message" rows="4" class="form-control"
                                            id="message">{{ old('message', $testimonial->message) }}</textarea>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row mb-4">
                                <label for="star" class="col-form-label col-lg-2">Star Rating</label>
                                <div class="col-lg-10">
                                    <input 
                                        type="number" 
                                        name="star" 
                                        id="star" 
                                        class="form-control" 
                                        min="1" 
                                        max="5" 
                                        value="{{ old('star', $testimonial->star) }}"
                                        placeholder="Enter star rating (1-5)"
                                        required
                                    >
                                </div>
                            </div>


                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2">Status (Inactive/Active)</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                name="status" value="1" {{ $testimonial->status ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Testimonial</button>
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
