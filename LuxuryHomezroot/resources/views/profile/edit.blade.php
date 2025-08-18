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

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="profile-user"></div>
                            </div>
                        </div>

                        <div class="row">
                           <div class="profile-content">
                               <div class="row align-items-end">
                                    <div class="col-sm">
                                        <div class="d-flex align-items-end mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xxl me-3">
                                                    <img src="{{url('')}}/admin_assets/images/users/avatar-1.jpg" alt="" class="img-fluid rounded-circle d-block img-thumbnail">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">

                                            @if(Auth::check())
                                                <div>
                                                    <h5 class="font-size-16 mb-1">{{ Auth::user()->name }}</h5>
                                                    <p class="text-muted font-size-13 mb-2 pb-2">{{ Auth::user()->email }}</p>
                                                </div>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                    
                               </div>
                           </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                               <div class="card bg-transparent shadow-none">
                                   <div class="card-body">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-top mt-2" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Overview</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link px-3" data-bs-toggle="tab" href="#editprofile" role="tab">Edit Profile</a>
                                            </li>
                                        </ul>
                                   </div>
                               </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="overview" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0"><i class="mdi mdi-arrow-right text-primary me-1"></i> About</h5>
                                            </div>

                                            <div class="card-body">
                                                <div>
                                                    <div class="pb-3">
                                                        
                                                        <div class="text-normal">
                                                            <p class="mb-2">Hi I'm Phyllis Gatlin, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</p>                                                    
                                                           
                                                        </div>
                                                    </div>

                                                   
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end tab pane -->

                                    <div class="tab-pane" id="editprofile" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">   
                                                
                                            

                                            <div class="col-lg-12 ms-lg-auto">
                                                <div class="mt-4 mt-lg-0">
                                                    <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Update Profile</h5>
                                                    



                                                    
                                                
                                                <form method="POST" action="{{ route('profile.partials.update') }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-4">
                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Full Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" id="horizontal-firstname-input" value="{{ old('name', auth()->user()->name) }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" id="horizontal-email-input" value="{{ old('email', auth()->user()->email) }}" required>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="horizontal-password-input" class="col-sm-3 col-form-label">New Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password" class="form-control" id="horizontal-password-input">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="horizontal-password-confirm-input" class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password_confirmation" class="form-control" id="horizontal-password-confirm-input">
                                            </div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>






                                                </div>
                                            </div>
                                        
                                        
                                        


                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->


                                        
                                       
                                    </div>
                                    <!-- end tab pane -->
                                </div>
                                <!-- end tab content -->
                            </div>
                            <!-- end col -->

                            
                            
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @push('scripts')
                <script src="{{url('')}}/admin_assets/js/pages/profile.init.js"></script>
@endpush


@stop

                
                