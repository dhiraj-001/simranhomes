@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Add Home Statistic')
@section('content')

@push('styles')
<!-- Add any page-specific styles here -->
@endpush

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Home Statistic</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add Statistic</li>
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
                            <h4 class="card-title">Create New Home Statistic</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Admin.home_statistics.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-4">
                                    <label for="icon_path" class="col-form-label col-lg-2">Icon Image</label>
                                    <div class="col-lg-10">
                                        <label class="image-upload-guide">(Format: .svg / .png only - Suggested size: 46x46px)</label>
                                        <input type="file" id="icon_path" name="icon_path" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="count" class="col-form-label col-lg-2">Count</label>
                                    <div class="col-lg-10">
                                        <input name="count" type="number" class="form-control" id="count" placeholder="Enter count value" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label for="label" class="col-form-label col-lg-2">Label</label>
                                    <div class="col-lg-10">
                                        <input name="label" type="text" class="form-control" id="label" placeholder="Enter statistic label" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label col-lg-2">Status</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-lg">
                                            <input type="checkbox" class="form-check-input" id="statusSwitch" name="status" value="1" checked>
                                            <label class="form-check-label" for="statusSwitch">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Statistic</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Row -->
        </div>
    </div>
</div>

@push('scripts')
<!-- Optional custom scripts -->
@endpush

@stop
