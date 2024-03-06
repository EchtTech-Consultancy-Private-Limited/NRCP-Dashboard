@include('partial.header')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="main-title nrcp-main-title">
        <div class="row mb-0 d-flex align-items-center">
            <div class="col-sm-8">
                <h1 class="text-left">Dashboard for @if(Auth::user()->user_type == 1)Rabies @else Laboratory @endif</h1>
            </div>
            <div class="col-sm-4">
                <ol class="breadcrumb  justify-content-end m-0 p-0 align-items-center" >
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $breadCrum ?? 'Dashboard' }}</li>
                </ol>
            </div><!-- /.col --> 
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ asset('AdminLTELogo.png') }}" alt="Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-bold"><b>NRCP Dashboard</b></span>
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
        </div><!-- /.row -->
        </div>
        <section class="content pform2">
            @yield('content')
        </section>
    </div>
    </div>
</div>
@include('partial.footer')
</body>
</html>
