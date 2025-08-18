<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('') }}/admin_assets/images/favicon.png">

    <!-- select2 css -->
    <link href="{{ url('') }}/admin_assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ url('') }}/admin_assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{ url('') }}/admin_assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- plugin css -->
    <link href="{{ url('') }}/admin_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />
    <!-- preloader css -->
    <link rel="stylesheet" href="{{ url('') }}/admin_assets/css/preloader.min.css" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ url('') }}/admin_assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('') }}/admin_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('') }}/admin_assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Custom Css-->
    <link href="{{ url('') }}/admin_assets/css/abhi-custom.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ url('') }}/admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ url('') }}/admin_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/admin_assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet"
        type="text/css" />
</head>




<body data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ url('') }}/admin/dashboard" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ url('') }}/admin_assets/images/logo-icon.png" alt="" height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ url('') }}/admin_assets/images/logo-icon.png" alt="" height="34"> <span
                                    class="logo-txt">Luxury Homez</span>
                            </span>
                        </a>

                        <a href="{{ url('') }}/admin/dashboard" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ url('') }}/admin_assets/images/logo-icon.png" alt="" height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ url('') }}/admin_assets/images/logo-icon.png" alt="" height="34"> <span
                                    class="logo-txt">Luxury Homez </span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>

                    @if (Auth::check())
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item bg-light-subtle border-start border-end"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ url('') }}/admin_assets/images/users/avatar-1.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="{{ url('') }}/admin/profile"><i
                                    class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>

                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item"><i
                                        class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" data-key="t-menu">Menu</li>

                        <li>
                            <a href="{{ url('') }}/admin/dashboard">
                                <i class="fas fa-home"></i>
                                <span class="badge rounded-pill bg-success-subtle text-success float-end"></span>
                                <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>




                        <li>
                            <a href="{{ url('') }}/admin/properties">
                                <i class="fas fa-boxes"></i>
                                <span data-key="t-horizontal">Properties</span>
                            </a>
                        </li>



                        <li>
                            <a href="{{ url('') }}/admin/amenities">
                                <i class="fas as fa-map-signs"></i>
                                <span data-key="t-horizontal">Amenities</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ url('') }}/admin/builders">
                                <i class="fas as  fas fa-building"></i>
                                <span data-key="t-horizontal">Builders</span>
                            </a>
                        </li>
                        
                        
                        <li>
                            <a href="{{ url('') }}/admin/psubtypes">
                                <i class="fas as  fas fa-anchor"></i>
                                <span data-key="t-horizontal">Property SubTypes</span>
                            </a>
                        </li>
                        
                        
                        
                        
                        <li>
                            <a href="{{ url('') }}/admin/cities">
                                <i class="fas as  fas fa-campground"></i>
                                <span data-key="t-horizontal">Property City</span>
                            </a>
                        </li>
                        
                        
                        
                         <li>
                            <a href="{{ url('') }}/admin/testimonials">
                                <i class="fas as  fas fa-grin-stars"></i>
                                <span data-key="t-horizontal">Testimonials</span>
                            </a>
                        </li>
                        
                        
                        
                         <li>
                            <a href="{{ url('') }}/admin/homestatistics">
                                <i class="fas as  fas fas fa-allergies"></i>
                                <span data-key="t-horizontal">Home Statistics</span>
                            </a>
                        </li>
                        
                        
                        
                         <li>
                            <a href="{{ url('') }}/admin/about-us">
                                <i class="fas as  far fa-heart"></i>
                                <span data-key="t-horizontal">About Us</span>
                            </a>
                        </li>
                        
                        
                        
                        <li>
                            <a href="{{ url('') }}/admin/founder">
                                <i class="fas as  fas fa-pencil-alt"></i>
                                <span data-key="t-horizontal">Founder Message</span>
                            </a>
                        </li>
                        
                        
                         <li>
                            <a href="{{ url('') }}/admin/vms">
                                <i class="fas as fas fa-mask"></i>
                                <span data-key="t-horizontal">Vision & Mission</span>
                            </a>
                        </li>






                        <li>
                            <a href="{{ url('') }}/admin/blogs">
                                <i class="far fa-newspaper"></i>
                                <span data-key="t-horizontal">Blogs</span>
                            </a>
                        </li>
                        
                        
                        
                        
                         <li>
                            <a href="{{ url('') }}/admin/banners">
                                <i class="fas fas fa-image"></i>
                                <span data-key="t-horizontal">Banners</span>
                            </a>
                        </li>
                        
                        
                        <li>
                            <a href="{{ url('') }}/admin/keywords">
                                <i class="fas fas fa-tags"></i>
                                <span data-key="t-horizontal">Keywords</span>
                            </a>
                        </li>
                        
                        
                        
                        <li>
                            <a href="{{ url('') }}/admin/kfaqs">
                                <i class="fas fa-question-circle"></i>
                                <span data-key="t-horizontal">Keyword Faqs</span>
                            </a>
                        </li>








                        <li>
                            <a href="{{ url('') }}/admin/enquiry-data">
                                <i class="fas fa-envelope-open-text"></i>
                                <span data-key="t-horizontal">Enquiry</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ url('') }}/admin/profile">
                                <i class="fas fa-user-edit"></i>
                                <span data-key="t-horizontal">Edit Profile</span>
                            </a>
                        </li>
                        
                        
                        
                        
                        
                         <li>
                            <a href="{{ url('') }}/admin/settings">
                                <i class="fas fas fa-cog"></i>
                                <span data-key="t-horizontal">Settings</span>
                            </a>
                        </li>



                        <li class="custom-color-logout">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-user-lock"></i>
                                <span data-key="t-horizontal">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>






                    </ul>


                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->







        @yield('content')




        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                        document.write(new Date().getFullYear())
                        </script> © Luxury Homez.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by <a href="https://icreatebrand.com/"
                                class="text-decoration-underline">ICB</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->




    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ url('') }}/admin_assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('') }}/admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/admin_assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ url('') }}/admin_assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('') }}/admin_assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ url('') }}/admin_assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="{{ url('') }}/admin_assets/libs/pace-js/pace.min.js"></script>
    <!-- apexcharts -->
    <script src="{{ url('') }}/admin_assets/libs/apexcharts/apexcharts.min.js"></script>
    <!-- Plugins js-->
    <script src="{{ url('') }}/admin_assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
    </script>
    <script
        src="{{ url('') }}/admin_assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js">
    </script>
    <script src="{{ url('') }}/admin_assets/js/pages/allchart.js"></script>
    <!-- dashboard init -->
    <script src="{{ url('') }}/admin_assets/js/pages/dashboard.init.js"></script>
    <script src="{{ url('') }}/admin_assets/js/app.js"></script>
    <!-- Required datatable js -->
    <script src="{{ url('') }}/admin_assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/admin_assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ url('') }}/admin_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('') }}/admin_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <!-- init js -->
    <script src="{{ url('') }}/admin_assets/js/pages/datatable-pages.init.js"></script>
    <!--tinymce js-->
    <script src="{{ url('') }}/admin_assets/libs/tinymce/tinymce.min.js"></script>
    <!-- form repeater js -->
    <script src="{{ url('') }}/admin_assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
    <script src="{{ url('') }}/admin_assets/js/pages/task-create.init.js"></script>
    <!-- ckeditor -->
    <script src="{{ url('') }}/admin_assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <!-- init js -->
    <script src="{{ url('') }}/admin_assets/js/pages/form-editor.init.js"></script>
    <!-- jquery-knob plugin  -->
    <script src="{{ url('') }}/admin_assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <!-- jquery-knob init -->
    <script src="{{ url('') }}/admin_assets/js/pages/jquery-knob.init.js"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ url('') }}/admin_assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Sweet alert init js-->
    <script src="{{ url('') }}/admin_assets/js/pages/sweetalert.init.js"></script>

    <!-- select 2 plugin -->
    <script src="{{ url('') }}/admin_assets/libs/select2/js/select2.min.js"></script>

    <!-- dropzone plugin -->
    <script src="{{ url('') }}/admin_assets/libs/dropzone/min/dropzone.min.js"></script>

    <!-- init js -->
    <script src="{{ url('') }}/admin_assets/js/pages/ecommerce-select2.init.js"></script>

    <!-- init js -->
    <script src="{{ url('') }}/admin_assets/js/pages/form-advanced.init.js"></script>

    <!-- choices js -->
    <script src="{{ url('') }}/admin_assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>


    @stack('scripts')
</body>

</html>