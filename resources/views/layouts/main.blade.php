@include('partial.header')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row mb-2 d-flex align-items-center">
            <!-- <div class="col-sm-8">
                <h1 class=" text-dark text-left  main-title nrcp-main-title" >State Dashboard - Human Health Rabies</h1>
            </div>/.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb  m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->


        <section class="content pform2">
        @yield('content')
    </section>
    </div>
    </div>

</div>

@include('partial.footer')
</body>
</html>
