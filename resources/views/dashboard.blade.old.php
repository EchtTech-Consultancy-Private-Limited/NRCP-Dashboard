@include('includes.header')

<link rel="stylesheet" href="{{ asset('assets/pform_css/style.css') }}">
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    .table-responsive.detailsDatas {
        height: 688px;
    }

    path.highcharts-point.highcharts-name-uttar-pradesh.highcharts-key-uttar.pradesh.highcharts-point-select {
    color: #0043ff;
    fill: #0043ff;
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
                        <div class="col-sm-8">
                            <h1 class="m-0 text-dark" >State Dashboard - Human Health Rabies</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-4">
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



                                                <!-- <form action="{{ url('/record-filter') }}" method="post" class="myForm"> -->
                                                <!-- <form action="#" method="post" class="myForm"> -->
                                                    <!-- @csrf -->
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="state">State<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select state click-function"
                                                                    aria-label="Default select example" id="state"
                                                                    name="state_name" onChange="handleFilterValue();handleDistrict()">
                                                                    <option value=""> Select Your State </option>
                                                                    @foreach (state_list() as $state)
                                                                        <option value="{{ $state->state_name }}" state-id="{{$state->id}}">
                                                                            {{ ucfirst($state->state_name) ?? '' }} </option>
                                                                    @endforeach
                                                                </select>
                                                                <small id="state-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>



                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="district">District<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select click-function"
                                                                    aria-label="Default select example" id="district"
                                                                    name="district_name" onChange="handleFilterValue()">
                                                                    <option value="">Enter your District </option>
                                                                </select>
                                                                <small id="district-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="fromYear">From Year<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select p-1 year click-function"
                                                                    name="year" aria-label="Default select example"
                                                                    id="year" required="" onChange="handleFilterValue()">
                                                                    <option value="yyyy">yyyy</option>
                                                                    <?php
                                                                    $currentYear = date('Y');
                                                                    for ($year = $currentYear; $year >= 2015; $year--) {
                                                                        $selected = $year == 2022 ? 'selected' : '';
                                                                        echo "<option value='$year' $selected>$year</option>";
                                                                    }
                                                                    ?>
                                                                </select>


                                                                <span class="calender"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> </span>
                                                                <small id="fromYear-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        {{-- <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="toYear">To Year<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                  id="yearto"
                                                                   name="yearto"onChange="handleFilterValue()" >
                                                                    <option value=""> yyyy </option>

                                                                </select>
                                                                <span class="calender"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> </span>

                                                                <small id="toYear-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div> --}}

                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="toYear">To Year<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select p-1 year click-function"
                                                                    name="toYear" aria-label="To Year"
                                                                    id="yearto" onChange="handleFilterValue()">


                                                                    <!-- Options will be populated dynamically using JavaScript -->
                                                                </select>

                                                                <span class="calender"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> </span>
                                                                <small id="toYear-error"
                                                                    class="form-text text-muted"></small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">


                                                                <label for="formType">Form Type<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select "
                                                                    aria-label="Default select example"
                                                                    id="formType" onChange="handleFormType()">

                                                                    <option value="" disabled> Select Form Type
                                                                    </option>
                                                                    <option value="1" form-type="l-form">L Form</option>
                                                                    <option value="2" form-type="p-form" selected >P Form</option>
                                                                    <option value="3" form-type="s-form">S Form</option>
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
                                                                    id="diseasesSyndromes" onChange="handleFilterValue()">
                                                                    <option value=""> Select Diseases Syndromes
                                                                    </option>
                                                                    <option value='human_rabies' selected>Human Rabies</option> <option value='animal_bite'>Animal Bite - Dog Bite</option>
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
                                                                    id="apply_filter"
                                                                    class="btn search-patient-btn bg-primary text-light apply-filter">Apply
                                                                    Filter</button>

                                                            </div>
                                                            <input type="hidden" value="" id="filter_state">
                                                            <input type="hidden" value="" id="filter_district">
                                                            <input type="hidden" value="2022" id="filter_from_year">
                                                            <input type="hidden" value="" id="filter_to_year">
                                                            <input type="hidden" value="2" id="filter_form_type">
                                                            <input type="hidden" value="" id="filter_diseases">

                                                <!-- </form> -->
                                            </div>
                                        </div>


                                        <!-- /.row -->
                                        <div class="card-body">
                                            <div class="row bg-white">

                                                <div class="col-md-5">
                                                    <select class="form-control" name="type" id="type">
                                                        <option value=""
                                                            {{ session('type') == '' ? 'selected' : '' }}>Cases
                                                        </option>
                                                        <option value="1"
                                                            {{ session('type') == '1' ? 'selected' : '' }}>Deaths
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="year-selector p-3">

                                                    </div>
                                                    <div style="height: 700px;" id="container"></div>
                                                </div>
                                                <div class="col-md-4">


                                                    <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%"
                                                        id="yeartostate">
                                                    </div>

                                                    <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%"
                                                        class="statewise">
                                                    </div>


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
        /*handle Form Type*/
const handleFormType = ()=>{

    const formType = $('#formType').find(":selected").attr('form-type');
    $("#diseasesSyndromes").html("");
    let option="";
    if(formType==="p-form"){
        $("#filter_form_type").val(2);
        option="<option value='human_rabies'>Human Rabies</option> <option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
    }else  if(formType==="l-form"){
        $("#filter_form_type").val(1);
        option="<option>Please select Diseases Syndromes</option><option value='laboratary'>Human Rabies and Laboratary</option>";
        $("#diseasesSyndromes").append(option);
    }else{
        $("#filter_form_type").val(3);
        option="<option value='animal_bite'>Animal Bite - Dog Bite</option>";
        $("#diseasesSyndromes").append(option);
    }
}

const handleFilterValue = ()=>{
    const filter_state = $('#state').find(":selected").val();
    const filter_district = $('#district').find(":selected").val();
    const filter_from_year = $('#year').find(":selected").val();
    const filter_to_year = $('#yearto').find(":selected").val();
    const form_type = $('#formType').find(":selected").val();
    const filter_diseasesSyndromes = $('#diseasesSyndromes').find(":selected").val();

    filter_state ? $("#filter_state").val(filter_state) : "";
    filter_district ? $("#filter_district").val(filter_district) : "";
    filter_from_year ? $("#filter_from_year").val(filter_from_year) : "";
    filter_to_year ? $("#filter_to_year").val(filter_to_year) : "";
    form_type ? $("#filter_form_type").val(form_type) : "";
    filter_diseasesSyndromes ? $("#filter_diseases").val(filter_diseasesSyndromes) : "";

}

const handleDistrict = ()=>{
    const state_id = $('#state').find(":selected").attr('state-id');
    let option = "<option>Please select district</option>";
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('get-district') }}",
                type: "get",
                data: {
                    state_id: state_id,
                    },
                success: function(result) {
                    if(result){
                        $("#district").html("");
                        result.district_list.forEach((district)=>{
                            option +=`<option value="${district.id}">${district.district_name}</option>`;
                        });
                        $("#district").append(option);
                    }else{
                        $("#district").html("");
                    }
                }
            });
}


/*end here*/
        $(document).ready(function() {

            $('#year').change(function() {
                var fromYear = parseInt($(this).val());
                var toYearSelect = $('#yearto');
                //aleart(toYearSelect)

                // Clear existing options
                toYearSelect.empty();

                // Add options starting from next year
                $('#yearto').html('<option value="" selected>Choose Year</option>');
                for (var year = fromYear + 1; year <= new Date().getFullYear(); year++) {

                    var option = $('<option></option>');
                    option.val(year);
                    option.text(year);

                    toYearSelect.append(option);
                }
            });

            // Set a default selected option
            $('#yearto').append('<option value="" selected>Choose Year</option>');

            // Trigger the change event to populate the "to year" dropdown initially
            // $('#year').change();
        });
    </script>

    {{-- load time year  with state  --}}
    <script>
        $(document).ready(function() {

            let mapdata = "";
            year = $('#year').val();
            $('.statewise').hide();
            $('#yeartostate').hide();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('human-rabies') }}",
                type: "get",
                success: function(result) {

                    //  alert('defalut value')

                    $("#detailsData").hide();


                    (async () => {

                        const topology = await fetch(
                            'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                        ).then(response => response.json());


                        const statesData = result.array;
                        const entries = Object.entries(statesData);

                          console.log(result);
                        // console.log(entries);

                        const data = entries;

                        // console.log(data);

                        const tableBody = $('.detailsDatas tbody');

                        // Clear any existing rows in the table
                        tableBody.empty();

                        // Loop through the entries and add rows to the table
                        entries.forEach(function(entry) {
                            const state = entry[0];
                            const cases = entry[1];

                            let sessionvalue = "{{ session('type') }}";

                            const row = `
                                <tr>
                                    <td>${state}</td>
                                    <td>${sessionvalue === '' ? cases : '' }</td>
                                    <td>${sessionvalue === '1' ? cases : ''}</td>
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


                                            $('.detailsDatas').hide();
                                            if ($('#state').val() != '') {
                                                $('#state').val('');
                                                $('.statewise').hide();
                                            }

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


                                            var sessionvalue =
                                                "{{ session('type') }}"
                                            //alert(sessionvalue);
                                            if (sessionvalue === '1') {


                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td><span id='totalDeath'></span></td><td>" +
                                                    e.point.value +
                                                    "</td></tr></tbody></table> </div>";

                                            } else {

                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td>" + e.point.value +
                                                    "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";

                                            }



                                            $("#detailsData").html(StateContent);

                                            // Swal.fire({
                                            //     position: 'top-end',
                                            //     icon: 'success',
                                            //     title: 'State records fetched successfully',
                                            //     showConfirmButton: false,
                                            //     timer: 3000
                                            // })


                                        }
                                    }
                                }
                            },
                            // tooltip: {
                            //     pointFormatter: function() {

                            //         console.log(data)
                            //     return `<b>State:</b> ${this.name}</br><b>Total Death:</b> ${this.name}</br>`
                            //     }
                            // },
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


    {{-- common function  --}}
    <script>
        $("#apply_filter").on('click',function(){

            filter_state = $("#filter_state").val();
            filter_district = $("#filter_district").val() ;
            filter_from_year = $("#filter_from_year").val() ;
            filter_to_year = $("#filter_to_year").val() ;
            form_type = $("#filter_form_type").val() ;
            filter_diseasesSyndromes = $("#filter_diseases").val() ;

    if (year) {
        $(".detailsDatas").show();
        $("#detailsData").hide();
    }


let mapdata = "";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    url: "{{ url('test') }}",
    type: "get",
    data: {
            setstate: filter_state,
            district: filter_district,
            setyear: filter_from_year,
            setyearto: filter_to_year,
            form_type: form_type,
            filter_diseasesSyndromes:filter_diseasesSyndromes,
        },
    success: function(result) {
        $("#detailsData").hide();
        (async () => {
            const topology = await fetch(
                'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
            ).then(response => response.json());

            let statesData = result.array;

            const entries = Object.entries(statesData);
            const data = entries;
            const tableBody = $('.detailsDatas tbody');
            // Clear any existing rows in the table
            tableBody.empty();
            // Loop through the entries and add rows to the table
            let sessionvalue = "{{ session('type') }}";
            entries.forEach(function(entry) {
                console.log(entry,' entry point')
                const state = entry[0];
                const cases = entry[1];

                const row = `
                        <tr>
                            <td>${state}</td>
                            <td>${sessionvalue === '' ? cases : '' }</td>
                            <td>${sessionvalue === '1' ? cases : ''}</td>
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

                                //alert(nameState)

                                $('.detailsDatas').hide();
                                if ($('#state').val() != '') {
                                    $('#state').val('');
                                    $('.statewise').hide();
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
                                    success: function(
                                        result) {

                                        $('#totalDeath')
                                            .text(result
                                                .human_rabies_deaths
                                            );

                                    }

                                });

                                $("#detailsData").show();



                                var sessionvalue =
                                    "{{ session('type') }}"
                                //alert(sessionvalue);
                                if (sessionvalue === '1') {


                                    var StateContent =
                                        "Fetching the data for " + e
                                        .point
                                        .name +
                                        " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                        e.point
                                        .name +
                                        "</td><td><span id='totalDeath'></span></td><td>" +
                                        e.point.value +
                                        "</td></tr></tbody></table> </div>";

                                } else {

                                    var StateContent =
                                        "Fetching the data for " + e
                                        .point
                                        .name +
                                        " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                        e.point
                                        .name +
                                        "</td><td>" + e.point
                                        .value +
                                        "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";

                                }

                                $("#detailsData").html(
                                    StateContent);

                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'State-wise records fetched successfully',
                                    showConfirmButton: false,
                                    timer: 3000
                                })


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


        $('#apply_filter-old').on('click', function() {

            if (state != '' && year != '' && yearto != '') {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $(
                            'meta[name="csrf-token"]'
                        ).attr(
                            'content')
                    }
                });

                $.ajax({
                    url: "{{ url('human-rabies-state-year') }}",
                    type: "get",
                    data: {
                        setyear: year,
                        setstate: state,
                        setyearto: yearto
                    },
                    success: function(result) {

                        (async () => {

                            const topology = await fetch(
                                'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                            ).then(response => response.json());

                            // Swal.fire({
                            //     position: 'top-end',
                            //     icon: 'success',
                            //     title: 'State records fetched successfully',
                            //     showConfirmButton: false,
                            //     timer: 3000
                            // })

                            const statesData = result;

                            let data = [
                                [statesData.state.state_name, statesData.human_rabies_case]
                            ];

                            $('.detailsDatas').hide();
                            $('#yeartostate').show();



                            var sessionvalue = "{{ session('type') }}"
                            //alert(sessionvalue);
                            if (sessionvalue === '1') {
                                var Statewise =
                                    "Fetching the data for " + result.state.state_name +
                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                    result.state.state_name +
                                    "</td><td>" + result.human_rabies_deaths +
                                    "</td><td>" + result.human_rabies_case +
                                    "</td></tr></tbody></table> </div>";
                            } else {
                                var Statewise =
                                    "Fetching the data for " + result.state.state_name +
                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                    result.state.state_name +
                                    "</td><td>" + result.human_rabies_case +
                                    "</td><td>" + result.human_rabies_deaths +
                                    "</td></tr></tbody></table> </div>";
                            }

                            $("#yeartostate").html(Statewise);

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


            } else if (state != '' && year != '') {

               // alert('state')

                $('.detailsDatas').hide();
                $('#detailsData').hide();
                $(".statewise").hide();



                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $(
                            'meta[name="csrf-token"]'
                        ).attr(
                            'content')
                    }
                });

                $.ajax({
                    url: "{{ url('human-rabies-state') }}",
                    type: "get",
                    data: {
                        setyear: year,
                        setstate: state
                    },
                    success: function(result) {

                        (async () => {

                            const topology = await fetch(
                                'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                            ).then(response => response.json());

                            // Swal.fire({
                            //     position: 'top-end',
                            //     icon: 'success',
                            //     title: 'State records fetched successfully',
                            //     showConfirmButton: false,
                            //     timer: 3000
                            // })

                            const statesData = result;

                            console.log(statesData.state.state_name)

                            let data = [
                                [statesData.state.state_name, statesData.human_rabies_case]
                            ];

                            $('#yeartostate').show();

                            // var Statewise =
                            //     "Fetching the data for " + result.state.state_name +
                            //     " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                            //     result.state.state_name +
                            //     "</td><td>" + result.human_rabies_case +
                            //     "</td><td>" + result.human_rabies_deaths +
                            //     "</td></tr></tbody></table> </div>";

                            var sessionvalue = "{{ session('type') }}"
                            //alert(sessionvalue);
                            if (sessionvalue === '1') {
                                var Statewise =
                                    "Fetching the data for " + result.state.state_name +
                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                    result.state.state_name +
                                    "</td><td>" + result.human_rabies_deaths +
                                    "</td><td>" + result.human_rabies_case +
                                    "</td></tr></tbody></table> </div>";
                            } else {
                                var Statewise =
                                    "Fetching the data for " + result.state.state_name +
                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                    result.state.state_name +
                                    "</td><td>" + result.human_rabies_case +
                                    "</td><td>" + result.human_rabies_deaths +
                                    "</td></tr></tbody></table> </div>";
                            }

                            $("#yeartostate").html(Statewise);

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

                        // var Statewise =
                        //     "Fetching the data for " + result.state.state_name +
                        //     " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                        //     result.state.state_name +
                        //     "</td><td>" + result.human_rabies_case +
                        //     "</td><td>" + result.human_rabies_deaths +
                        //     "</td></tr></tbody></table> </div>";


                        // Swal.fire({
                        //     position: 'top-end',
                        //     icon: 'success',
                        //     title: 'State-wise records fetched successfully',
                        //     showConfirmButton: false,
                        //     timer: 3000
                        // })

                        // $(".statewise").html(Statewise);
                        // $("#detailsData").html(StateContent);


                    }

                });


            } else if (year != '' && yearto != '') {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $(
                            'meta[name="csrf-token"]'
                        ).attr(
                            'content')
                    }
                });

                $.ajax({
                    url: "{{ url('human-rabies-state-between') }}",
                    type: "get",
                    data: {
                        setyear: year,
                        setyearto: yearto
                    },
                    success: function(result) {

                        $('.detailsDatas').show();

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'From year or To year records fetched successfully',
                            showConfirmButton: false,
                            timer: 3000
                        })

                        $("#detailsData").hide();
                        (async () => {

                            const topology = await fetch(
                                'https://code.highcharts.com/mapdata/countries/in/custom/in-all-disputed.topo.json'
                            ).then(response => response.json());


                            // const statesData = result.state_totals;
                            // const entries = Object.entries(statesData);
                            // const data = entries;

                            // data.forEach(function(entry) {
                            //     let index = entry[0];
                            //     let stateInfo = entry[1];

                            //     let stateName = stateInfo.state_name;
                            //     let totalCases = stateInfo.total_human_rabies;


                            //     console.log(
                            //         `State Name: ${stateName}, Total Cases: ${totalCases}`
                            //         );

                            // });
                            const statesData = result.array;
                            // console.log(statesData);

                            const entries = Object.entries(statesData);
                            const data = entries;

                            // console.log(data);

                            const tableBody = $('.detailsDatas tbody');

                            // Clear any existing rows in the table
                            tableBody.empty();

                            // Loop through the entries and add rows to the table
                            entries.forEach(function(entry) {
                                const state = entry[0];
                                const cases = entry[1];

                                let sessionvalue = "{{ session('type') }}";

                                const row = `
                                    <tr>
                                        <td>${state}</td>
                                        <td>${sessionvalue === '' ? cases : '' }</td>
                                        <td>${sessionvalue === '1' ? cases : ''}</td>
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

                                                //alert(nameState)
                                                $('.detailsDatas').hide();
                                                if ($('#state').val() != '') {
                                                    $('#state').val('');
                                                    $('.statewise').hide();
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
                                                    success: function(
                                                        result) {

                                                        $('#totalDeath')
                                                            .text(result
                                                                .human_rabies_deaths
                                                            );

                                                    }

                                                });

                                                $("#detailsData").show();


                                                var StateContent =
                                                    "Fetching the data for " + e
                                                    .point
                                                    .name +
                                                    " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                    e.point
                                                    .name +
                                                    "</td><td>" + e.point.value +
                                                    "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";


                                                $("#detailsData").html(
                                                    StateContent);

                                                Swal.fire({
                                                    position: 'top-end',
                                                    icon: 'success',
                                                    title: 'From year or To year State-wise records fetched successfully',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                })


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

            } else if (year != '') {

                alert('year')

                if (year) {
                    $(".detailsDatas").show();
                    $("#detailsData").hide();
                }


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

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'year records fetched successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })

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
                            let sessionvalue = "{{ session('type') }}";

                            entries.forEach(function(entry) {
                                const state = entry[0];
                                const cases = entry[1];

                                const row = `
                                        <tr>
                                            <td>${state}</td>
                                            <td>${sessionvalue === '' ? cases : '' }</td>
                                            <td>${sessionvalue === '1' ? cases : ''}</td>
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

                                                //alert(nameState)

                                                $('.detailsDatas').hide();
                                                if ($('#state').val() != '') {
                                                    $('#state').val('');
                                                    $('.statewise').hide();
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
                                                    success: function(
                                                        result) {

                                                        $('#totalDeath')
                                                            .text(result
                                                                .human_rabies_deaths
                                                            );

                                                    }

                                                });

                                                $("#detailsData").show();



                                                var sessionvalue =
                                                    "{{ session('type') }}"
                                                //alert(sessionvalue);
                                                if (sessionvalue === '1') {


                                                    var StateContent =
                                                        "Fetching the data for " + e
                                                        .point
                                                        .name +
                                                        " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                        e.point
                                                        .name +
                                                        "</td><td><span id='totalDeath'></span></td><td>" +
                                                        e.point.value +
                                                        "</td></tr></tbody></table> </div>";

                                                } else {

                                                    var StateContent =
                                                        "Fetching the data for " + e
                                                        .point
                                                        .name +
                                                        " <div class='table-responsive'> <table class='table table-bordered'><thead><tr><th rowspan='2'>State</th><th colspan='2'>presumptive </th></tr> <tr><th>Cases</th><th>deaths</th></tr></thead><tbody><tr><td>" +
                                                        e.point
                                                        .name +
                                                        "</td><td>" + e.point
                                                        .value +
                                                        "</td><td><span id='totalDeath'></span></td></tr></tbody></table> </div>";

                                                }

                                                $("#detailsData").html(
                                                    StateContent);

                                                Swal.fire({
                                                    position: 'top-end',
                                                    icon: 'success',
                                                    title: 'State-wise records fetched successfully',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                })


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

            }

        })
    </script>

    <script>
        $('#type').on('change', function() {

            // alert($(this).val())

            let typeValue = $(this).val(); // The value you want to store in the session

            alert(typeValue)

            $.ajax({
                url: '{{ url('/set-session') }}',
                type: 'get',
                data: {
                    type: typeValue
                },
                headers: {
                    'X-CSRF-TOKEN': 'your_csrf_token_here' // Include CSRF token if required
                },
                success: function(response) {
                    console.log(response);

                    location.reload(true);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });

        })
    </script>

    <!-- Main Footer -->
    @include('includes.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
