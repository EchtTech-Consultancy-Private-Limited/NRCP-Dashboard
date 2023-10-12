@include('includes.header')
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<style>
    #container {
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
            <img class="animation__wobble" src="{{ asset('assets/login/dist/img/AdminLTELogo.png') }}" alt="logo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('includes.navigation')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('assets/login/dist/img/AdminLTELogo.png') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">NRCP Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

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
                            <h1 class="m-0">



                                @if (Auth::user()->user_type == 1)
                                    {{ 'Central' }}
                                @elseif (Auth::user()->user_type == 2)
                                    {{ 'State' }}
                                @elseif (Auth::user()->user_type == 3)
                                    {{ 'District' }}
                                @else
                                    {{ 'Health Facilities' }}
                                @endif

                                  {{ 'Dashboard -' }}

                                @if (Auth::user()->user_type == 1)
                                     {{ 'Animal Health' }}
                                @else
                                     {{ 'Human Health Rabies' }}
                                @endif

                              </h1>
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

              @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif

              @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
              @endif

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->

                    {{-- <?php if($_REQUEST['section'] == 1){ ?> --}}
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-3">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info elevation-1"><img
                                                    src="{{ asset('assets/images/vaccination-coverage.png') }}"
                                                    alt="" class="das-icon" /></span>

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
                                            <span class="info-box-icon bg-danger elevation-1"><img
                                                    src="{{ asset('assets/images/rabies-cases.png') }}" alt=""
                                                    class="das-icon" /></span>

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
                                            <span class="info-box-icon bg-success elevation-1"><img
                                                    src="{{ asset('assets/images/animal-population.png') }}"
                                                    alt="" class="das-icon" /></span>

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
                                            <span class="info-box-icon bg-warning elevation-1"><img
                                                    src="{{ asset('assets/images/control-measures.png') }}"
                                                    alt="" class="das-icon" /></span>

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
                                            <span class="info-box-icon bg-warning elevation-1"><img
                                                    src="{{ asset('assets/images/dog-bite.png') }}" alt=""
                                                    class="das-icon" /></span>

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
                                {{-- <?php } ?> --}}
                                <!-- /.row -->
                                <div class="card-body">
                                    <div class="row bg-white">
                                        {{-- <?php if($usertype == "1"){ ?> --}}
                                        <div class="col-md-8">
                                            <div class="year-selector p-3">
                                                <div class="form-group">

                                                    <select class="form-select p-1 year" name="year"
                                                        aria-label="Default select example" id="year"
                                                        required="">
                                                        <option value="yyyy">yyyy</option>
                                                        <?php
                                                        $currentYear = date('Y');
                                                        for ($year = $currentYear; $year >= 2015; $year--) {
                                                            $selected = $year == 2022 ? 'selected' : ''; // Set 'selected' for 2022
                                                            echo "<option value='$year' $selected>$year</option>";
                                                        }
                                                        ?>
                                                    </select>


                                                    <small id="gander-error" class="form-text text-muted">
                                                    </small>
                                                </div>

                                            </div>
                                            <div style="height: 700px;" id="container"></div>
                                        </div>
                                        <div class="col-md-4">

                                            <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%"
                                                id="detailsData">

                                            </div>


                                            <div class='table-responsive detailsDatas'>
                                                <table class='table table-bordered'>
                                                    <thead>
                                                        <tr>
                                                            <th rowspan='2'>State</th>
                                                            <th colspan='2'>presumptive </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Cases</th>
                                                            <th>deaths</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody id="tableBody">
                                                        <!-- Rows will be populated dynamically -->
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                        {{-- <?php } ?> --}}
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
                        $(document).ready(function() {

                            let mapdata = "";

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                url: "{{ url('human-rabies') }}",
                                type: "get",
                                success: function(result) {

                                    // console.log(data)

                                    $("#detailsData").hide();
                                    (async () => {

                                        const topology = await fetch(
                                            'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                                        ).then(response => response.json());

                                        // Prepare demo data. The data is joined to map using value of 'hc-key'
                                        // property by default. See API docs for 'joinBy' for more info on linking
                                        // data and map.
                                        // console.log(result.states[12].state_name)

                                        const statesData = result.array;
                                        const statesDeaths = result.array1;

                                        const entries = Object.entries(statesData);

                                        const data = entries;

                                        const tableBody = $('.detailsDatas tbody');

                                        // Clear any existing rows in the table
                                        tableBody.empty();

                                        // Loop through the entries and add rows to the table
                                        entries.forEach(function(entry) {
                                            const state = entry[0];
                                            const cases = entry[1];

                                            const row = `
                            <tr>
                                <td>${state}</td>
                                <td>${cases}</td>
                                <td></td>
                            </tr>
                        `;

                                            tableBody.append(row);
                                        });



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



                                }
                            });

                        });
                    </script>


                    <script>
                        $('#year').on('change', function() {

                            year = $(this).val();

                            if (year) {

                                $(".detailsDatas").hide();

                            }

                            //   alert(year);

                            let mapdata = "";

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                url: "{{ url('human-rabies') }}",
                                type: "get",
                                data: {
                                    setyear: year
                                },
                                success: function(result) {

                                    // console.log(data)

                                    $("#detailsData").hide();
                                    (async () => {

                                        const topology = await fetch(
                                            'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                                        ).then(response => response.json());

                                        // Prepare demo data. The data is joined to map using value of 'hc-key'
                                        // property by default. See API docs for 'joinBy' for more info on linking
                                        // data and map.
                                        // console.log(result.states[12].state_name)

                                        const statesData = result.array;
                                        // const statesDeaths = result.array1;

                                        const entries = Object.entries(statesData);

                                        const data = entries;


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
                                                        click: function(e) {

                                                            let nameState = e.point.name

                                                            $.ajaxSetup({
                                                                headers: {
                                                                    'X-CSRF-TOKEN': $(
                                                                        'meta[name="csrf-token"]'
                                                                    ).attr(
                                                                        'content')
                                                                }
                                                            });

                                                            $.ajax({
                                                                url: "{{ url('human-rabies-death') }}",
                                                                type: "get",
                                                                data: {
                                                                    setyear: year,
                                                                    name: nameState
                                                                },
                                                                success: function(result) {

                                                                    $('#totalDeath')
                                                                        .text(result
                                                                            .human_rabies_deaths
                                                                        );

                                                                }

                                                            });

                                                            $("#detailsData").show();


                                                            var StateContent =
                                                                "Fetching the data for " + e.point
                                                                .name +
                                                                " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                                e.point
                                                                .name +
                                                                "</td><td>" + e.point.value +
                                                                "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";


                                                            $("#detailsData").html(StateContent);


                                                        }
                                                    }
                                                }
                                            },


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



                                }
                            });

                        });
                    </script>



                    <script>
                        $(document).ready(function() {

                            $.ajax({
                                url: "{{ url('human-rabies-death-default') }}",
                                type: "get",
                                success: function(result) {

                                    console.log(result.state_deaths)

                                }

                            });
                        })
                    </script>
