@extends('layouts.main')
@section('title')
{{ __('NRCP Dashboard') }}
@endsection
@section('content')
<div class="container-fluid dashboard">

    <!-- Info boxes -->
    <div class="row">
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        {{-- <div class="col-md-12 pr-5">
            <button class="float-right generate-report" onclick="printDiv('report_national')">Generate Report </button>
        </div> --}}
        <div class="col-md-12">

            <!-- general form elements -->
            <div class="card-primary dashboard" id="report_national">
                @if (Auth::user()->user_type == 1)
                <div class="form-tab m-0">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">

                            <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                                <!-- <form action="{{ url('/record-filter') }}" method="post" class="myForm"> -->
                                <!-- <form action="#" method="post" class="myForm"> -->
                                <!-- @csrf -->

                                <div class="dashboard-filter mb-4" id="dashboard-filter">
                                    <div class="row">
                                        <div class="dashboard-col">
                                            <div class="form-group">
                                                <label for="state">State<span class="star"></span></label>
                                                <select class="form-select state click-function"
                                                    aria-label="Default select example" id="state" name="state_name"
                                                    onChange="handleFilterValue();handleDistrict()">
                                                    <option selected state-name=""> Select
                                                        State
                                                    </option>
                                                    @foreach (state_list() as $state)
                                                    <option value="{{ $state->state_name }}"
                                                        state-name="{{ ucfirst($state->state_name) }}"
                                                        state-id="{{ $state->id }}">
                                                        {{ ucfirst($state->state_name) ?? '' }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <small id="state-error" class="form-text text-muted">
                                                </small>
                                            </div>
                                        </div>
                                        <div class="dashboard-col">
                                            <div class="form-group">
                                                <label for="district">District<span class="star"></span></label>
                                                <select class="form-select click-function"
                                                    aria-label="Default select example" id="district"
                                                    name="district_name" onChange="handleFilterValue()">
                                                    <option dist-name="">Select District </option>
                                                </select>
                                                <small id="district-error" class="form-text text-muted">
                                                </small>
                                            </div>
                                        </div>
                                        <div class=" dashboard-col">
                                            <div class="form-group">
                                                <label for="fromYear">From Year<span class="star"></span></label>
                                                <select class="form-select p-1 year click-function" name="year"
                                                    aria-label="Default select example" id="year" required=""
                                                    onChange="handleFilterValue()">
                                                    <option>Select Year</option>
                                                    <?php
                                                        $currentYear = date('Y');
                                                        for ($year = 2015; $year <= $currentYear; $year++) {
                                                            echo "<option value='$year'>$year</option>";
                                                        }
                                                        ?>
                                                </select>
                                                <!-- <span class="calender"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span> -->
                                                <small id="fromYear-error" class="form-text text-muted">
                                                </small>
                                            </div>
                                        </div>

                                        <div class=" dashboard-col">
                                            <div class="form-group">
                                                <label for="toYear">To Year<span class="star"></span></label>
                                                <select class="form-select p-1 year click-function" name="toYear"
                                                    aria-label="To Year" id="yearto" onChange="handleFilterValue()">
                                                    <option>Select Year</option>
                                                </select>
                                                <!-- <span class="calender"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span> -->
                                                <small id="toYear-error" class="form-text text-muted"></small>
                                            </div>
                                        </div>
                                        <div class="dashboard-col">
                                            <div class="form-group">
                                                <label for="formType">Form Type<span class="star"></span></label>
                                                <select class="form-select " aria-label="Default select example"
                                                    id="formType" onChange="handleFormType()">
                                                    <option value=""> Select Form Type
                                                    </option>
                                                    <option value="1" form-type="l-form">L Form</option>
                                                    <option value="2" form-type="p-form">P Form</option>
                                                    {{-- <option value="3" form-type="s-form">S Form</option> --}}
                                                </select>
                                                <small id="formType-error" class="form-text text-muted">
                                                </small>
                                            </div>
                                        </div>
                                        <div class="dashboard-col">
                                            <div class="form-group mb-0">
                                                <label for="diseasesSyndromes">Diseases Syndromes<span
                                                        class="star"></span></label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="diseasesSyndromes" onChange="handleFilterValue()">
                                                    <option value="selected"> Select Diseases Syndromes
                                                    </option>
                                                    <option value='human_rabies'>Human Rabies</option>
                                                    <option value='animal_bite'>Animal Bite - Dog Bite</option>
                                                </select>
                                                <small id="diseasesSyndromes-error" class="form-text text-muted">
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col search-reset justify-content-center">
                                            <div class=" apply-filter text-center">
                                                <button id="apply_filter"
                                                    class="btn  bg-primary text-light apply-filter button border-0 mr-2">Search</button>

                                            </div>

                                            <input type="hidden" value="" id="filter_state">
                                            <input type="hidden" value="" id="filter_district">
                                            <input type="hidden" value="2022" id="filter_from_year">
                                            <input type="hidden" value="" id="filter_to_year">
                                            <input type="hidden" value="2" id="filter_form_type">
                                            <input type="hidden" value="" id="filter_diseases">
                                            <input type="hidden" value="0" id="session_value">
                                            <input type="hidden" value="" id="is_graph_data_available">
                                            <!-- </form> -->
                                            <div class=" apply-filter">
                                                <!-- <label for=""><span class="star"></span></label> -->
                                                <button id="reset_button"
                                                    class="btn bg-danger border-0 text-light apply-filter text-white ">Reset</button>

                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-2 col-4" id="test_performed">
                                            <div class="form-group">
                                                <label for="testPerformed" class="d-block">Test Performed<span
                                                        class="star">*</span></label>
                                                <select class="form-control" name="test_performed" id="mySelect2"
                                                    multiple="multiple" aria-label="Default select"
                                                    onKeyPress="handleTest(event)">
                                                    <!-- <option value="" selected>--All--</option> -->
                                                    <option name="test-performed" value="direct_fat_post">Direct
                                                        FAT
                                                        (Postmortem)</option>
                                                    <option name="test-performed" value="direct_fat_skin">Direct
                                                        FAT
                                                        (Skin Biopsy- Antemortem)</option>
                                                    <option name="test-performed" value="virus_isolation">Virus
                                                        Isolation by Cell Culture</option>
                                                    <option name="test-performed" value="ag_capture">Ag Capture
                                                        ELISA
                                                        (Post Mortem)</option>
                                                    <option name="test-performed" value="rabies_rt">Rabies RT-PCR
                                                    </option>
                                                    <option name="test-performed" value="rffit">RFFIT- rabies
                                                        virus
                                                        neutralising antibody (RVNA) titres</option>
                                                </select>
                                                <small id="testPerformed-error" class="form-text text-muted">
                                                </small>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <div class="">
                                    <div class="row card-mm mt-3">
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-1 p-0 dashboard-card mb-4">
                                                <div class="crm_body">
                                                    <h4 id="national-giaReceivedTotal">{{$total->sum_total_health_animal}}</h4>
                                                    <p>Total No. of Health Facilities Providing Animal Bite Management
                                                        in The State </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-2 p-0 dashboard-card mb-4">
                                                <div class="crm_body">
                                                    <h4 id="national-committedLiabilitiesTotal">{{$total->total_health_facilities_submitted}}
                                                    </h4>
                                                    <p>Total Number of Facilities Submitted Monthly Report Under NRCP
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-3 p-0 dashboard-card mb-4">
                                                <div class="crm_body">
                                                    <h4 id="national-totalBalanceTotal">{{$total->total_patients}}</h4>
                                                    <p>Total No. of Patients</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-4 p-0 dashboard-card mb-4">
                                                <div class="crm_body">
                                                    <h4 id="national-actualExpenditureTotal">{{$total->suspected_death_reports}}</h4>
                                                    <p>Suspected / Probable / Confirmed Rabies Cases / Deaths Reported
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-5 p-0 dashboard-card mb-4">
                                                <div class="crm_body">
                                                    <h4 id="national-unspentBalance31stTotal">{{$total->availability_arv}}</h4>
                                                    <p>Availability of ARV </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-6 p-0 dashboard-card mb-4">
                                                <div class="crm_body">
                                                    <h4 id="national-unspentBalance31stTotal">{{$total->availability_ars}}</h4>
                                                    <p>Availability of ARS</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="dashboard-filter mb-4 bg-yellow-color">
                                            <div class="row card-mm mt-3">
                                                <div class="col-md-6">
                                                    <div id="national-dashboard-monthly-report-received"
                                                        class="rounded mb-3 received-chart"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="national-dashboard-monthly-report-not-received"
                                                        class="rounded mb-3 received-chart"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dashboard-filter mb-4 bg-blue-color">
                                            <div class="row card-mm mt-3">
                                                <div class="col-md-6">
                                                    <div id="national-dashboard-Nos-of-monthly-report-received"
                                                        class="rounded mb-3 received-chart"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="national-dashboard-Nos-of-monthly-report-not-received"
                                                        class="rounded mb-3 received-chart"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="dashboard-filter mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <div class="row ">
                                                    <div class="col-md-12 ">
                                                        <div class="box-heading justify-content-center">

                                                            <h1 class="main-heading text-center">State wise Bar Graph
                                                            </h1>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row d-flex align-items-center justify-content-between mb-3">
                                                        <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="district"
                                                                                class="mr-3  text-nowrap ">Year
                                                                                <span class="star">*</span></label>
                                                                                <select name="state-bar-graph-year" id="state-bar-graph-year" class="form-control state_bar_graph"
                                                                    style="color: grey;">
                                                                    <option value="">Select Year</option>
                                                                    @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                                                        <option value="{{$i}}">{{$i}} - {{$i+1}}</option>
                                                                    @endfor
                                                                </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="district"
                                                                                class="mr-3 ml-3 text-nowrap ">Month
                                                                                <span class="star">*</span></label>
                                                                                <select name="state-bar-graph-month" id="state-bar-graph-month" class="form-control state_bar_graph"
                                                                    style="color: grey;">
                                                                    <option value="">Select Month</option>
                                                                    @foreach ($months as $key => $month)
                                                                        <option value="{{ $key+1 }}">
                                                                            {{ $month }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                        </div>
                                                                    </div>

                                                            <div class="col justify-content-end d-flex align-items-end">
                                                                <button class="dt-button buttons-print" type="button"
                                                                    onclick="printDiv('State-wise-bar-graph') "><span><i
                                                                            class="fa fa-print"
                                                                            aria-hidden="true"></i></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="white_card_body">
                                                <div id="State-wise-bar-graph"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dashboard-filter mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                           
                                                <div class="row mb-3">
                                                    <div class="col-md-12 ">
                                                        <div class="box-heading justify-content-center">

                                                            <h1 class="main-heading text-center">State wise Patient
                                                                Report</h1>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row d-flex align-items-center justify-content-between">
                                                           
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                    <label for="district"
                                                                    class="mr-3  text-nowrap ">Year <span
                                                                        class="star">*</span></label>
                                                                       <select name="state-bar-graph-year-patient" id="state-bar-graph-year-patient" class="form-control state_bar_graph_patient"
                                                                        style="color: grey;">
                                                                        <option value="">Select Year</option>
                                                                        @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                                                            <option value="{{$i}}">{{$i}} - {{$i+1}}</option>
                                                                        @endfor
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                    <label for="district"
                                                                    class="mr-3 ml-3 text-nowrap ">Month <span
                                                                        class="star">*</span></label>
                                                                        <select name="state-bar-graph-month-patient" id="state-bar-graph-month-patient" class="form-control state_bar_graph_patient"
                                                                        style="color: grey;">
                                                                        <option value="">Select Month</option>
                                                                        @foreach ($months as $key => $month)
                                                                            <option value="{{ $key+1 }}">
                                                                                {{ $month }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    </div>
                                                                </div>
                                                               
                                                            

                                                            <div class="col d-flex justify-content-end ">
                                                                <button class="dt-button buttons-print" type="button"
                                                                    onclick="printDiv('state-wise-patient-report') "><span><i
                                                                            class="fa fa-print"
                                                                            aria-hidden="true"></i></span></button>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="row" id="state-wise-patient-report">
                                                <div class="col-md-12">
                                                    <div class="row state-graph-filter">
                                                        @for($i=1; $i<= $states; $i++)
                                                        <div class="col">
                                                            <div class="white_card">
                                                                <div class="">
                                                                    <div id="integrated-dashboard-state{{$i}}"
                                                                        class=" state-filter-highchart rounded  ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endfor                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-7">
                                                    <div id="state-wise-patient-report-india-map"
                                                        class="border rounded mb-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- State wise availability of ARV / ARS  start-->
                                <div class="dashboard-filter mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-heading justify-content-center pb-2">
                                                <h1 class="main-heading mb-0 text-center">State wise availability of ARV
                                                    /
                                                    ARS</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="box-heading">
                                                <h1 class="main-heading-subtitle ">Availability of ARV</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="state-wise-arv-bar-graph" class="border rounded mb-3"></div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="box-heading">
                                                <h1 class="main-heading-subtitle  mb-0">Availability of ARS</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="state-wise-ars-bar-graph" class="border rounded mb-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- State wise availability of ARV / ARS end -->   
                                <!-- National Dashboard: Report Generate end -->
                                


                                <!-- /.row -->
                                <div class="card-body p-3 my-3 dashboard-filter">
                                    <div class="row bg-white">
                                        <div class="col-md-12 ">
                                            <div
                                                class="map-text m-0 mb-2 d-flex align-items-center justify-content-between">
                                                <h1 class="m-0 mr-3 d-inline-block">Cases state wise </h1>
                                                <button class="buttons-print float-right" type="button"
                                                    onclick="printDiv('dashboardMap')"><span> <i
                                                            class="fa fa-print"></i></span></button>
                                            </div>

                                        </div>

                                        <!-- <div class="col-md-6 d-flex justify-content-end">
                                            <button class="buttons-print" type="button"><span> <i class="fa fa-print"></i></span></button>
                                            </div> -->
                                    </div>
                                    <div>
                                        <div class="row bg-white">
                                            <div class="col-md-6 pr-2 " id="dashboardMap">
                                                <div class="country-map position-relative" id="country-map">
                                                    <div class="case-type">
                                                        {{-- <select class="form-control w-auto" name="type"
                                                                id="type">
                                                                <option value="0">Cases</option>
                                                                <option value="1">Deaths</option>
                                                            </select> --}}
                                                    </div>
                                                    <div class="total-cases">
                                                        <p > Total cases - <span class="value" id="box1"> 0</span> </p>
                                                    </div>
                                                    <div class="year-selector p-3"> </div>
                                                    <div id="container" class="map"></div>
                                                    <div id="stateMap"><img class="stateImage" src="">
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-6 pl-2">
                                                <div class="">
                                                    <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%"
                                                        id="yeartostate">
                                                    </div>
                                                    <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%"
                                                        class="statewise">
                                                    </div>
                                                    <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%"
                                                        id="detailsData">
                                                    </div>

                                                    <div class="table-responsive detailsDatas dashboard-table">
                                                        <table class='table table-bordered s-p-form-map'>
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan='2' class="state_filter_district">State
                                                                    </th>
                                                                    <th colspan='2'>Suspected Cases</th>
                                                                </tr>
                                                                <tr>
                                                                    <th></th>
                                                                    {{-- <th>Deaths</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tableBody">

                                                            </tbody>
                                                        </table>
                                                        <table class='table table-bordered l-form-map'>
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan='2' class="state_filter_district">State
                                                                    </th>
                                                                    <th colspan='3'>Laboratory Cases</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Person Tested</th>
                                                                    <th>Sample Tested</th>
                                                                    <th>Positive</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tableBody_l_form">
                                                                <!-- Rows will be populated dynamically -->
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.row -->
                                <!-- graph start-->
                                <div id="graphical_view">
                                    <div class="row">
                                        <div class="col-md-12 pr-2 mb-3">
                                            <div class="highchart-wrapper dashboard-filter position-relative">
                                                <div class="box-heading pb-1 justify-content-center">
                                                    <!-- <h1 class="main-heading text-center">Cases by Gender in India   from Select Year  to     n=(6367833)</h1> -->
                                                </div>
                                                <div id="containerPie" class="piechart " height="400"> </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-2 mb-3">
                                        <div class="highchart-wrapper dashboard-filter position-relative">
                                                <div class="box-heading pb-1 justify-content-center">
                                                    <!-- <h1 class="main-heading text-center">Case by age group in India   from  from Select Year to </h1> -->
                                                </div>
                                                <div id="chart" class=" mt-3"></div>
                                            </div>
                                           
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 pr-2 mb-3">
                                        <div class="highchart-wrapper dashboard-filter position-relative">
                                                <div class="box-heading pb-1 justify-content-center">
                                                    <h1 class="main-heading text-center">Cases </h1>
                                                </div>
                                                <div id="barchart_materialcase">   </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- end here -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
            @endif
        </div>
    </div>

    @endsection