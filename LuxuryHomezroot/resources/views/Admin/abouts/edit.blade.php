@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit About Section')
@section('content')

@push('styles')
<!-- Optional: Add page-specific styles here -->
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit About Section</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit About</li>
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
                            <h4 class="card-title">Update About Content</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.about.update') }}" method="POST">
                                @csrf

                                <div class="form-group row mb-4">
                                    <label for="subtitle" class="col-lg-2 col-form-label">Subtitle</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                                               placeholder="Enter subtitle"
                                               value="{{ old('subtitle', $about->subtitle ?? '') }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="heading" class="col-lg-2 col-form-label">Heading</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="heading" id="heading" class="form-control"
                                               placeholder="Enter heading"
                                               value="{{ old('heading', $about->heading ?? '') }}">
                                    </div>
                                </div>

                               
                                
                                
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1"
                                            name="description">{{ old('description', $about->description ?? '') }}</textarea>
                                    </div>
                                </div>
                                
                                

                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary"
                                                onclick="window.location.href='{{ route('Admin.dashboard') }}'">
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
<!-- Optional JS here -->
@endpush

@stop
