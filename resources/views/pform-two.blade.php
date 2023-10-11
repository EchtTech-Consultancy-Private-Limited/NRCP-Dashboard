@include('includes.header')

<link rel="stylesheet" href="{{ asset('assets/pform_css/style.css') }}">
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                            <!--            <h1 class="m-0">Dashboard</h1>-->
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
            <section class="content pform2">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">


                        @if (session()->has('message'))
                            <script>
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Patient record saved successfully',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                            </script>
                        @endif


                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="form-tab">
                                    <div class="bootstrap-tab">

                                        <div class="tab-content" id="myTabContent">

                                            <div class="" id="nav-add-patient-record" role="tabpanel"
                                                aria-labelledby="home-tab">



                                                <form action="{{ url('/patient-Record') }}" method="post"
                                                    class="myForm">

                                                    <div class="row">

                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="state">State<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="state" required>
                                                                    <option value=""> Select Your State
                                                                    </option>
                                                                    <option value="1"> UP</option>
                                                                    <option value="2"> MP</option>
                                                                    <option value="3"> DL</option>
                                                                </select>
                                                                <small id="state-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="district">District<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="district" required>
                                                                    <option value=""> Select Your District
                                                                    </option>
                                                                    <option value="1"> UP</option>
                                                                    <option value="2"> MP</option>
                                                                    <option value="3"> DL</option>
                                                                </select>
                                                                <small id="district-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="fromYear">From Year<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="district" required>
                                                                    <option value=""> yyyy </option>
                                                                    <option value="1"> 2000</option>
                                                                    <option value="2"> 2001</option>
                                                                    <option value="3"> 2002</option>
                                                                </select>


                                                                <span class="calender"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> </span>
                                                                <small id="fromYear-error"
                                                                    class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="toYear">To Year<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="district"
                                                                    required>
                                                                    <option value=""> yyyy </option>
                                                                    <option value="1"> 2000</option>
                                                                    <option value="2"> 2001</option>
                                                                    <option value="3"> 2002</option>
                                                                </select>
                                                                <span class="calender"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> </span>

                                                                <small id="toYear-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="formType">Form Type<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="formType"
                                                                    required>
                                                                    <option value=""> Select Form Type
                                                                    </option>
                                                                    <option value="1"> L Form</option>
                                                                    <option value="2">P Form</option>
                                                                    <option value="3">S Form</option>
                                                                </select>
                                                                <small id="formType-error"
                                                                    class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="diseasesSyndromes">Diseases Syndromes<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="diseasesSyndromes"
                                                                    required>
                                                                    <option value=""> Select Diseases Syndromes
                                                                    </option>
                                                                    <option value="1">Diseases 1</option>
                                                                    <option value="2">Diseases 2</option>
                                                                    <option value="3">Diseases 3</option>
                                                                </select>
                                                                <small id="diseasesSyndromes-error"
                                                                    class="form-text text-muted"> </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="button apply-filter">
                                                                <label for=""><span
                                                                        class="star"></span></label>
                                                                <button
                                                                    class="btn search-patient-btn bg-primary text-light">Apply
                                                                    Filter</button>

                                                            </div>

                                                        </div>
                                                    </div>


                                                </form>







                                                <!-- /.row -->
                                                <div class="card-body">
                                                    <div class="row bg-white">

                                                        <div class="col-md-8">
                                                            <div class="year-selector p-3">
                                                                <div class="form-group">

                                                                    <select class="form-select p-1 year"
                                                                        name="year"
                                                                        aria-label="Default select example"
                                                                        id="year" required="">
                                                                        <option value="yyyy">yyyy</option>
                                                                        <?php
                                                                        $currentYear = date('Y');
                                                                        for ($year = $currentYear; $year >= 2015; $year--) {
                                                                            $selected = $year == 2022 ? 'selected' : '';
                                                                            echo "<option value='$year' $selected>$year</option>";
                                                                        }
                                                                        ?>
                                                                    </select>


                                                                    <small id="gander-error"
                                                                        class="form-text text-muted">
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

                                                    </div>
                                                </div>
                                                <!-- /.row -->



















                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->


                        </div>

                    </div>
                    <!-- /.row -->


                    <!-- /.row -->


                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <script>
            $(document).ready(function() {
                // $("#first-name-error").text("New word");
                // console.log(fname);
                //Detect that a user has started entering their name itno the name input
                // Name can't be blank
                $('#first-name').on('input', function() {
                    var input = $(this);

                    var is_name = input.val();
                    var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
                    var name = regex.test(is_name);
                    if (name) {
                        $("#first-name-error").text("");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#first-name-error").text("Please enter valid name");
                    }
                });

                $('#last-name').on('input', function() {
                    var input = $(this);

                    var is_name = input.val();
                    var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
                    var name = regex.test(is_name);
                    if (name) {
                        $("#last-name-error").text("");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#last-name-error").text("Please enter valid last name");
                    }
                });



                $('#dob').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "") {
                        $("#dob-error").text("Dob is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#dob-error").text("");
                    }
                });


                $('#gander').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your Gender") {
                        $("#gander-error").text("Gander  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#gander-error").text("");
                    }
                });

                $('#id-type').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your id-type") {
                        $("#id-type-error").text("Id Type  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#gander-error").text("");
                    }
                });

                $('#identification').on('input', function() {
                    var input = $(this);

                    var is_name = input.val();
                    var regex = /^[0-9]+$/;
                    var name = regex.test(is_name);


                    if (name) {
                        $("#identification-error").text("");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#identification-error").text("Please enter valid identity no");
                    }
                });


                $('#citizenship').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your Citizenship") {
                        $("#citizenship-error").text("citizenship   is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#citizenship-error").text("");
                    }
                });


                $('#house-no').on('input', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "") {
                        $("#house-no-error").text("House no is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#house-no-error").text("");
                    }
                });

                $('#state').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your state") {
                        $("#state-error").text("state number  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#gander-error").text("");
                    }
                });

                $('#district').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your district") {
                        $("#district-error").text("district number  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#gander-error").text("");
                    }
                });

                $('#taluka').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your taluka") {
                        $("#taluka-error").text("taluka number  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#gander-error").text("");
                    }
                });

                $('#village').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your village") {
                        $("#village-error").text("Village number  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#gander-error").text("");
                    }
                });

                $('#street-name').on('input', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "") {
                        $("#street-name-error").text("Street-name  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#street-name-error").text("");
                    }
                });

                $('#landmark').on('input', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "") {
                        $("#landmark-error").text("Landmark  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#landmark-error").text("");
                    }
                });

                $('#pin-code').on('input', function() {
                    var input = $(this);

                    var is_name = input.val();
                    var regex = /^[0-9]+$/;
                    var name = regex.test(is_name);

                    if (name) {
                        $("#pin-code-error").text("");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#pin-code-error").text("Please enter valid pin code");
                    }
                });

                $('#provisinal-diagnosis').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your Diagnosis") {
                        $("#provisinal-diagnosis-error").text("Diagnosis number  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#gander-error").text("");
                    }
                });

                $('#date-of-onset').on('input', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "") {
                        $("#date-of-onset-error").text("date-of-onset  is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#pin-code-error").text("");
                    }
                });


                $('#OPD-IPD').on('click', function() {
                    var input = $(this);

                    var is_name = input.val();
                    if (is_name == "Select Your OPD-IPD") {
                        $("#opd-ipd-error").text("OPD/IPD is required");
                        // input.removeClass("invalid").addClass("valid");
                    } else {
                        $("#opd-ipd-error").text("");
                    }
                });

                // Email must be an email
                $('#contact_email').on('input', function() {
                    var input = $(this);
                    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                    var is_email = re.test(input.val());
                    if (is_email) {
                        input.removeClass("invalid").addClass("valid");
                    } else {
                        input.removeClass("valid").addClass("invalid");
                    }
                });
                // Website must be a website
                $('#contact_website').on('input', function() {
                    var input = $(this);
                    if (input.val().substring(0, 4) == 'www.') {
                        input.val('http://www.' + input.val().substring(4));
                    }
                    var re =
                        /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/;
                    var is_url = re.test(input.val());
                    if (is_url) {
                        input.removeClass("invalid").addClass("valid");
                    } else {
                        input.removeClass("valid").addClass("invalid");
                    }
                });
                // Message can't be blank
                $('#contact_message').keyup(function(event) {
                    var input = $(this);
                    var message = $(this).val();
                    console.log(message);
                    if (message) {
                        input.removeClass("invalid").addClass("valid");
                    } else {
                        input.removeClass("valid").addClass("invalid");
                    }
                });
                // After Form Submitted Validation

            });
        </script>


        <script>
            $(document).ready(function() {

                let mapdata = "";

                year = $('#year').val();

                 //  alert('function ready');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('human-rabies') }}",
                    type: "get",
                    success: function(result) {

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
                            //const statesDeaths = result.array1;

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
                                        events: {
                                            click: function(e) {

                                                let nameState = e.point.name

                                                //  alert(nameState)

                                                if (nameState) {

                                                    $(".detailsDatas").hide();

                                                }

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
            $('#year').on('change', function() {

                year = $(this).val();

                  // alert('year function')


                if (year) {
                    $(".detailsDatas").show();
                    $("#detailsData").hide();
                }

                //  alert(year);

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

                               //console.log(statesData);

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
                                        events: {
                                            click: function(e) {

                                                let nameState = e.point.name

                                               // alert(nameState)

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



    <script>
        $('#year').on('change', function() {
            //alert($('#state').val() != '')
            if ($('#state').val() != '') {
                $('#state').val('');
                $('.statewise').hide();
            }
        })


    </script>




    <script>
        $(document).ready(function() {
            $('#year').change(function() {
                var fromYear = parseInt($(this).val());
                   //alert(fromYear)
                var toYearSelect = $('#yearto');



                // Clear existing options
                toYearSelect.empty();

                // Add options starting from next year
                for (var year = fromYear + 1; year <= new Date().getFullYear(); year++) {
                    var option = $('<option></option>');
                    option.val(year);
                    option.text(year);

                    if (year === new Date().getFullYear()) {
                        option.prop('selected', true);
                    }

                    toYearSelect.append(option);
                }
            });
        });
    </script>

        <script></script>



        <!-- Main Footer -->
        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
