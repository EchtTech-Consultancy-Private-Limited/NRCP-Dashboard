<!DOCTYPE html>
<html lang="en">

<head>
    @include('./partial.header-script')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('AdminLTELogo.png') }}" alt="logo"
                height="60" width="60">

        </div> -->
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
                <div class="notifications" id="notification-card">
                    <div class="icon_wrap"><i class="fa fa-bell text-white"></i></div>
                    
                    <div class="notification_dd">
                        <ul class="notification_ul">
                            <li class="starbucks success">                               
                                <div class="notify_data">
                                    <div class="title">
                                        Lorem, ipsum dolor.
                                    </div>
                                    <div class="sub_title">
                                    Lorem ipsum dolor sit amet consectetur.
                                </div>
                                </div>
                                <div class="notify_status">
                                    <p>Success</p>  
                                </div>
                            </li>  
                            <li class="baskin_robbins failed">                                
                                <div class="notify_data">
                                    <div class="title">
                                        Lorem, ipsum dolor.  
                                    </div>
                                    <div class="sub_title">
                                    Lorem ipsum dolor sit amet consectetur.
                                </div>
                                </div>
                                <div class="notify_status">
                                    <p>Failed</p>  
                                </div>
                            </li> 
                            <li class="mcd success">                               
                                <div class="notify_data">
                                    <div class="title">
                                        Lorem, ipsum dolor.  
                                    </div>
                                    <div class="sub_title">
                                    Lorem ipsum dolor sit amet consectetur.
                                </div>
                                </div>
                                <div class="notify_status">
                                    <p>Success</p>  
                                </div>
                            </li>  
                            <li class="pizzahut failed">                               
                                <div class="notify_data">
                                    <div class="title">
                                        Lorem, ipsum dolor.  
                                    </div>
                                    <div class="sub_title">
                                    Lorem ipsum dolor sit amet consectetur.
                                </div>
                                </div>
                                <div class="notify_status">
                                    <p>Failed</p>  
                                </div>
                            </li> 
                            <li class="kfc success">                                
                                <div class="notify_data">
                                    <div class="title">
                                        Lorem, ipsum dolor.  
                                    </div>
                                    <div class="sub_title">
                                    Lorem ipsum dolor sit amet consectetur.
                                </div>
                                </div>
                                <div class="notify_status">
                                    <p>Success</p>  
                                </div>
                            </li> 
                            <li class="show_all">
                                <p class="link">Show All Notification</p>
                            </li> 
                        </ul>
                    </div>
                    
                </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
                        <i class="fa fa-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item d-flex align-items-center mr-4">
                    <div class="dropdown show profile">
                        <a class="btndropdown-toggle" href="#" role="button" id="profile"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="profile">
                            <ul>
                                <li class="text-center">{{ Auth::user()->email }}</li>
                                <li> <a class="dropdown-item" href="{{route('profile.edit')}}"><i class="fa fa-user" aria-hidden="true"></i>My Profile</a> </li>
                                <li> <a class="dropdown-item" href="{{route('password.update')}}"><i class="fa fa-lock" aria-hidden="true"></i>Change Password</a> </li>
                                <li> <a class="dropdown-item" onclick="return confirm('Are you sure you want to logout?')"
                                href="{{ url('logout') }}" role="button">   <i class="fa fa-power-off"></i> Logout </a> </li>
                            </ul>
                           
                        </div>
                    </div>
                   
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->
        <!-- Main Sidebar Container -->