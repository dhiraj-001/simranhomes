@extends('Admin.layouts.admin_master')
@section('title', 'Admin | Dashboard')
@section('content')

@push('styles')

@endpush



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Welcome Admin!</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Welcome Admin!</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">





                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <a href="{{url('')}}/admin/properties/">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Property</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="{{ $propertyCount }}">0</span>
                                        </h4>

                                    </div>

                                    <div class="flex-shrink-0 text-end dash-widget">
                                        <input class="knob" data-width="70" data-height="70" data-linecap=round
                                            data-fgColor="#1c84ee" value="{{ $propertyCount }}" data-skin="tron"
                                            data-angleOffset="180" data-readOnly=true data-thickness=".2" />
                                    </div>





                                </div>
                            </div><!-- end card body -->
                        </a>
                    </div><!-- end card -->
                </div><!-- end col -->






                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <a href="{{url('')}}/admin/blogs/">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Blog</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="{{ $blogCount }}">0</span>
                                        </h4>

                                    </div>
                                    <div class="flex-shrink-0 text-end dash-widget">
                                        <input class="knob" data-width="70" data-height="70" data-linecap=round
                                            data-fgColor="#1c84ee" value="{{ $blogCount }}" data-skin="tron"
                                            data-angleOffset="180" data-readOnly=true data-thickness=".2" />
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </a>
                    </div><!-- end card -->
                </div><!-- end col-->












                <div class="col-xl-4 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <a href="{{url('')}}/admin/enquiry-data/">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Enquiry</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="{{ $enquiryCount }}">0</span>
                                        </h4>

                                    </div>
                                    <div class="flex-shrink-0 text-end dash-widget">
                                        <input class="knob" data-width="70" data-height="70" data-linecap=round
                                            data-fgColor="#1c84ee" value="{{ $enquiryCount }}" data-skin="tron"
                                            data-angleOffset="180" data-readOnly=true data-thickness=".2" />
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </a>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row-->

            <div class="row">
                <div class="col-xl-12">
                    <div class="profile-user-dashboard"></div>
                </div>
            </div>


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    @push('scripts')

    @endpush


    @stop