<!DOCTYPE html>
<html lang="en">

<head>
    @include('./partial.header-script')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('AdminLTELogo.png') }}" alt="logo"
                height="60" width="60">
                
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <!-- <li class="nav-item">
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
                </li> -->

                {{-- <div class="form-inline">
                    <div class="input-group search" data-widget="sidebar-search" >
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                            <i class="fas fa-search fa-fw"></i>
                    </div>
                </div> --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" onclick="return confirm('Are you sure you want to logout?')"
                        href="{{ url('logout') }}" role="button">
                        <i class="fa fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                {{-- <img src="{{ asset('AdminLTELogo.png') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">NRCP Dashboard</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->

                <!-- Sidebar Menu -->
                @include('partial.sidebar')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>