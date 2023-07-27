@include('includes.header')
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<style>
    #container{
        width: 100%;
        height: 100%
    }
    
    img.das-icon {
    width: 50px;
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
            <h1 class="m-0"><?php 
      if($_REQUEST['usertype'] == 1) 
      { echo "Central"; } 
      else if($_REQUEST['usertype'] == 2) 
      { echo "State"; }
      else if($_REQUEST['usertype'] == 3) 
      { echo "District"; }
      else 
      { echo "Health Facilities"; }
      ?> Dashboard - (<?php 
      if($_REQUEST['section'] == 1) 
      { echo "Animal Health"; } 
      else 
      { echo "Human Health Rabies"; }
      ?>)</h1>
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
        
  <?php if($_REQUEST['section'] == 1){ ?>      
  <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{asset('assets/images/vaccination-coverage.png')}}" alt="" class="das-icon" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Vaccination Coverage</span>
                <span class="info-box-number">
                  68
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><img src="{{asset('assets/images/rabies-cases.png')}}" alt="" class="das-icon" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Rabies Cases</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><img src="{{asset('assets/images/animal-population.png')}}" alt="" class="das-icon" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Animal Population</span>
                <span class="info-box-number">6879408</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><img src="{{asset('assets/images/control-measures.png')}}" alt="" class="das-icon" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Control Measures</span>
                <span class="info-box-number">2,000</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><img src="{{asset('assets/images/dog-bite.png')}}" alt="" class="das-icon" /></span>

              <div class="info-box-content">
                <span class="info-box-text">Animal Bites Incidents</span>
                <span class="info-box-number">762,9700</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div> 
  <?php } ?>    
        <!-- /.row -->
<div class="card-body">
    <div class="row bg-white">
        <?php if($usertype == "1"){ ?>   
          <div class="col-md-9">
           <div style="height: 700px;" id="container"></div>
          </div>
            <div class="col-md-3">
            <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%" id="detailsData"></div>
            </div>
        <?php } ?>
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
        'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
    ).then(response => response.json());

    // Prepare demo data. The data is joined to map using value of 'hc-key'
    // property by default. See API docs for 'joinBy' for more info on linking
    // data and map.
    const data = [
        ['madhya pradesh', 10], ['uttar pradesh', 11], ['karnataka', 12],
        ['nagaland', 13], ['bihar', 14], ['lakshadweep', 15],
        ['andaman and nicobar', 16], ['assam', 17], ['west bengal', 18],
        ['puducherry', 19], ['daman and diu', 20], ['gujarat', 21],
        ['rajasthan', 22], ['dadara and nagar havelli', 23],
        ['chhattisgarh', 24], ['tamil nadu', 25], ['chandigarh', 26],
        ['punjab', 27], ['haryana', 28], ['andhra pradesh', 29],
        ['maharashtra', 30], ['himachal pradesh', 31], ['meghalaya', 32],
        ['kerala', 33], ['telangana', 34], ['mizoram', 35], ['tripura', 36],
        ['manipur', 37], ['arunanchal pradesh', 38], ['jharkhand', 39],
        ['goa', 40], ['nct of delhi', 41], ['odisha', 42],
        ['jammu and kashmir', 43], ['sikkim', 44], ['uttarakhand', 45]
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