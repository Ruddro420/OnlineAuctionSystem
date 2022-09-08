@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/css/OverlayScrollbars.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    @notifyCss
    <style>
        .notify {
            z-index: 10000 !important;
        }
        .swal2-html-container{
          color: wheat;
        }
    </style>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>

    <title>Dashboard</title>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('admin/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>




        <!-- Navbar START HERE #################################### -->


        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item ">
                    <a class=" nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>



        <!-- Navbar END HERE #################################### -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">

                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin/img/AdminLTELogo.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                        <li class="nav-item {{($prefix=='/setups')?'menu-open':''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Setup Managment
                                    <i class="fas fa-angle-left right"></i>

                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.class.view') }}" class="nav-link {{($route=='setups.student.class.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student Class</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.year.view') }}" class="nav-link {{($route=='setups.student.year.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student Year</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.group.view') }}" class="nav-link {{($route=='setups.student.group.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student Group</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.shift.view') }}" class="nav-link {{($route=='setups.student.shift.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student Shift</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.fee.view') }}" class="nav-link {{($route=='setups.student.fee.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student Fee</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.amount.view') }}" class="nav-link {{($route=='setups.student.amount.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student Fee Amount</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.exam.view') }}" class="nav-link {{($route=='setups.student.exam.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student Exam Type</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.subject.view') }}" class="nav-link {{($route=='setups.student.subject.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Subject View</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('setups.student.asub.view') }}" class="nav-link {{($route=='setups.student.asub.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assign Subject</p>
                                    </a>
                                </li>
                            </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->
            {{-- Main Content Was Start Here --}}

            @yield('multiple_data')

            {{-- Main Content Was End Here --}}


            
     <!-- overlayScrollbars -->
     
     <script src="{{ asset('admin/js/jquery.overlayScrollbars.min.js') }}"></script>
     <!-- AdminLTE App -->
     <script src="{{ asset('admin/js/adminlte.js') }}"></script>

     <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
     <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
     <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>

     <script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    @notifyJs
    <x:notify-messages />
    
  </body>
</html>