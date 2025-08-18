@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Founder Section')
@section('content')

@push('styles')
<!-- Optional page-specific styles -->
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Founder Section</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Founder</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <!-- Success Alert -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Founder Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.founder.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Title -->
                                <div class="form-group row mb-4">
                                    <label for="title" class="col-form-label col-lg-2">Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter title"
                                               value="{{ old('title', $founder->title ?? '') }}">
                                    </div>
                                </div>

                                <!-- Subtitle -->
                                <div class="form-group row mb-4">
                                    <label for="subtitle" class="col-form-label col-lg-2">Subtitle</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="subtitle" id="subtitle" class="form-control" placeholder="Enter subtitle"
                                               value="{{ old('subtitle', $founder->subtitle ?? '') }}">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1"
                                            name="description">{{ old('description', $founder->description ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Name -->
                                <div class="form-group row mb-4">
                                    <label for="name" class="col-form-label col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter founder name"
                                               value="{{ old('name', $founder->name ?? '') }}">
                                    </div>
                                </div>

                                <!-- Designation -->
                                <div class="form-group row mb-4">
                                    <label for="designation" class="col-form-label col-lg-2">Designation</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter designation"
                                               value="{{ old('designation', $founder->designation ?? '') }}">
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Current Image</label>
                                    <div class="col-lg-1">
                                        @if(!empty($founder->image))
                                            <img src="{{ asset('storage/app/public/' . $founder->image) }}" alt="Founder Image" style="width: 50px;">
                                        @else
                                            <span>No image uploaded</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <label for="image">Upload New Image (SVG/PNG)</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update Founder</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('Admin.dashboard') }}'">
                                            Cancel
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col -->
            </div> <!-- row -->

        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

@push('scripts')
<!-- Optional: add script tags if needed -->
@endpush

@stop
