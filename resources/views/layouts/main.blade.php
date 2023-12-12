@include('partial.header')
<div class="content-wrapper">
    <div class="container-fluid">
      
        <div class="main-title nrcp-main-title">
        <div class="row mb-2 d-flex align-items-center">
            <div class="col-sm-8">
                <h1 class=" text-left  " >Dashboard for Rabies</h1>
            </div>
            <div class="col-sm-4">
                <ol class="breadcrumb  justify-content-end m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
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
