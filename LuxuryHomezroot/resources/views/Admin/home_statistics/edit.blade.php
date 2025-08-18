@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Edit Home Statistic')
@section('content')

@push('styles')
<!-- Optional: Add page-specific CSS here -->
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Home Statistic</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('Admin.home_statistics.index') }}">Home Statistics</a></li>
                                <li class="breadcrumb-item active">Edit Statistic</li>
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
                            <h4 class="card-title">Edit Home Statistic Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.home_statistics.update', $stat->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Icon Upload -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Icon Image</label>
                                    <div class="col-lg-1">
                                        <img src="{{ asset('storage/app/public/' . $stat->icon_path) }}" width="40" alt="Current Icon">
                                    </div>
                                    <div class="col-lg-9">
                                        <label class="image-upload-guide">(SVG/PNG - Leave empty to keep existing)</label>
                                        <input type="file" name="icon_path" class="form-control">
                                    </div>
                                </div>

                                <!-- Count -->
                                <div class="form-group row mb-4">
                                    <label for="count" class="col-form-label col-lg-2">Count</label>
                                    <div class="col-lg-10">
                                        <input name="count" type="number" class="form-control" id="count"
                                            value="{{ old('count', $stat->count) }}" placeholder="Enter count value" required>
                                    </div>
                                </div>

                                <!-- Label -->
                                <div class="form-group row mb-4">
                                    <label for="label" class="col-form-label col-lg-2">Label</label>
                                    <div class="col-lg-10">
                                        <input name="label" type="text" class="form-control" id="label"
                                            value="{{ old('label', $stat->label) }}" placeholder="Enter statistic label" required>
                                    </div>
                                </div>

                                <!-- Status Switch -->
                                <div class="form-group row mb-4">
                                    <label class="form-check-label col-lg-2" for="statusSwitch">Status</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="hidden" name="status" value="0">
                                            <input type="checkbox" class="form-check-input" id="statusSwitch"
                                                name="status" value="1" {{ $stat->status ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>

                                <!-- Buttons -->
                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Update Statistic
                                        </button>
                                        <button type="button" class="btn btn-secondary"
                                            onclick="window.location.href='{{ route('Admin.home_statistics.index') }}'">
                                            <i class="fas fa-reply"></i> Cancel
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
<!-- Optional custom JS -->
@endpush

@stop
