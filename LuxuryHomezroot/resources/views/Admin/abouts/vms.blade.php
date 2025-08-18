@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Vision, Mission & Strength')
@section('content')

@push('styles')
<!-- Add custom styles if needed -->
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Vision, Mission & Strength</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">VMS Settings</li>
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
                            <h4 class="card-title">Update Vision, Mission & Strength</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('Admin.vms.update') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Vision Title -->
                                <div class="form-group row mb-4">
                                    <label class="col-lg-2 col-form-label">Vision Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="visionTitle" class="form-control"
                                               value="{{ old('visionTitle', $vms->visionTitle ?? '') }}" required>
                                    </div>
                                </div>

                                <!-- Vision Description -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Vision Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-1"
                                            name="visionDescription">{{ old('visionDescription', $vms->visionDescription ?? '') }}</textarea>
                                    </div>
                                </div>
                                  

                                <!-- Mission Title -->
                                <div class="form-group row mb-4">
                                    <label class="col-lg-2 col-form-label">Mission Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="missionTitle" class="form-control"
                                               value="{{ old('missionTitle', $vms->missionTitle ?? '') }}" required>
                                    </div>
                                </div>

                                <!-- Mission Description -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Mission Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-2"
                                            name="missionDescription">{{ old('missionDescription', $vms->missionDescription ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Strength Title -->
                                <div class="form-group row mb-4">
                                    <label class="col-lg-2 col-form-label">Strength Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="strengthTitle" class="form-control"
                                               value="{{ old('strengthTitle', $vms->strengthTitle ?? '') }}" required>
                                    </div>
                                </div>

                                <!-- Strength Description -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Strength Description</label>
                                    <div class="col-lg-10">
                                        <textarea id="taskdesc-editor-3"
                                            name="strengthDescription">{{ old('strengthDescription', $vms->strengthDescription ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Submit Buttons -->
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
<!-- Add custom scripts if needed -->
@endpush

@stop
