@include('includes.header')
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<style>
    #container{
        width: 100%;
        height: 100%
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('assets/login/dist/img/AdminLTELogo.png') }}" alt="logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('includes.navigation')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/login/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NRCP Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('includes.sidebar')
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        
        <!-- /.row -->
<div class="card-body">
    <div class="row bg-white">
          <div class="col-md-9">
           <div style="height: 700px;" id="container"></div>
                  
            <!-- /.card -->
          </div>
            <div class="col-md-3">
            <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%" id="detailsData"></div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
        <!-- /.row -->

       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('includes.footer')
  <script>
  $("#detailsData").hide();    
  (async () => {

    const topology = await fetch(
        'https://code.highcharts.com/mapdata/countries/in/in-all.topo.json'
    ).then(response => response.json());

    // Prepare demo data. The data is joined to map using value of 'hc-key'
    // property by default. See API docs for 'joinBy' for more info on linking
    // data and map.
    const data = [
        ['in-py', 10], 
        ['in-ld', 11], 
        ['in-wb', 12], 
        ['in-or', 13],
        ['in-br', 14], 
        ['in-sk', 15], 
        ['in-ct', 16], 
        ['in-tn', 17],
        ['in-mp', 45],
        ['in-2984', 19],
        ['in-ga', 20],
        ['in-nl', 21],
        ['in-mn', 22], 
        ['in-ar', 23],
        ['in-mz', 24],
        ['in-tr', 25],
        ['in-3464', 26],
        ['in-dl', 27],
        ['in-hr', 28],
        ['in-ch', 29],
        ['in-hp', 30],
        ['in-jk', 31],
        ['in-kl', 32],
        ['in-ka', 33],
        ['in-dn', 34],
        ['in-mh', 35],
        ['in-as', 36],
        ['in-ap', 37],
        ['in-ml', 38],
        ['in-pb', 39],
        ['in-rj', 40],
        ['in-up', 41],
        ['in-ut', 42], 
        ['in-jh', 43]
    ];

    // Create the chart
    Highcharts.mapChart('container', {
        chart: {
            map: topology
        },
				
        title: {
            text: ''
        },

        subtitle: {
            text: ''
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
            min: 0
        },
   plotOptions: {
              series: {
                  events: {
                      click: function (e) {
                          
                          $("#detailsData").show();
                          
                          var StateContent = "Fetching the data for "+ e.point.name + "...";
                          
                          $("#detailsData").html(StateContent);
                          
//                          var text = '<b>Clicked</b><br>Series: ' + this.name +
//                                  '<br>Point: ' + e.point.name + ' (' + e.point.value + '/km²)';
//                          if (!this.chart.clickLabel) {
//                              this.chart.clickLabel = this.chart.renderer.label(text, 0, 250)
//                                  .css({
//                                      width: '280px'
//                                  })
//                                  .add();
//                          } else {
//                              this.chart.clickLabel.attr({
//                                  text: text
//                              });
//                          }
                      }
                  }
              }
          },
  
   /*  mapNavigation: {
        enabled: true,
        buttonOptions: {
            verticalAlign: 'bottom'
        }
    }, */

    series: [{
        data: data,
        name: '',
         allowPointSelect: true,
         cursor: 'pointer',
         color: "#fff",
        states: {
            select: {
              color: 'blue'
            }
        },
        dataLabels: {
            enabled: false,
            format: '{point.name}'
        }
    }]

    });

})();
  </script>