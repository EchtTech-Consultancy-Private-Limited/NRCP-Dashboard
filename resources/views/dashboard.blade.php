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
                                        <div class=" col-md-3 col-4">
                                            <div class="form-group">
                                                <label for="state">State<span class="star"></span></label>
                                                <select class="form-select state click-function"
                                                    aria-label="Default select example" id="state" name="state_name"
                                                    onChange="handleFilterValue();handleDistrict()">
                                                    <option value="" selected state-name=""> Select
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
                                        <div class="col-md-2 col-4">
                                            <div class="form-group">
                                                <label for="district">District<span class="star"></span></label>
                                                <select class="form-select click-function"
                                                    aria-label="Default select example" id="district"
                                                    name="district_name" onChange="handleFilterValue()">
                                                    <option value="" dist-name="">Select District </option>
                                                </select>
                                                <small id="district-error" class="form-text text-muted">
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-4">
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

                                        <div class="col-lg-2 col-md-2 col-4">
                                            <div class="form-group">
                                                <label for="toYear">To Year<span class="star"></span></label>
                                                <select class="form-select p-1 year click-function" name="toYear"
                                                    aria-label="To Year" id="yearto" onChange="handleFilterValue()">
                                                </select>
                                                <!-- <span class="calender"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span> -->
                                                <small id="toYear-error" class="form-text text-muted"></small>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-4">
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
                                        <div class="col-lg-3 col-md-3 col-4">
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
                                        <div class="col search-reset align-items-end">
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
                                <div class="dashboard-filter mb-4">
                                    <div class="row card-mm mt-3">
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-1 p-0">
                                                <div class="crm_body">
                                                    <h4 id="national-giaReceivedTotal">{{$total->sum_total_health_animal}}</h4>
                                                    <p>Total No. of Health Facilities Providing Animal Bite Management
                                                        in The State </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-2 p-0">
                                                <div class="crm_body">
                                                    <h4 id="national-committedLiabilitiesTotal">{{$total->total_health_facilities_submitted}}
                                                    </h4>
                                                    <p>Total Number of Facilities Submitted Monthly Report Under NRCP
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-3 p-0">
                                                <div class="crm_body">
                                                    <h4 id="national-totalBalanceTotal">{{$total->total_patients}}</h4>
                                                    <p>Total No. of Patients</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-4 p-0">
                                                <div class="crm_body">
                                                    <h4 id="national-actualExpenditureTotal">{{$total->suspected_death_reports}}</h4>
                                                    <p>Suspected / Probable / Confirmed Rabies Cases / Deaths Reported
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-5 p-0">
                                                <div class="crm_body">
                                                    <h4 id="national-unspentBalance31stTotal">{{$total->availability_arv}}</h4>
                                                    <p>Availability of ARV </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-n">
                                            <div class="single_crm border-line-6 p-0">
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
                                            <div class="box-heading">
                                                <div class="row select-filter">
                                                    <div class="col-md-4 ">
                                                        <h1 class="main-heading">State wise Bar Graph</h1>

                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <label for="district"
                                                                    class="mr-3  text-nowrap mb-0">Year <span
                                                                        class="star">*</span></label>
                                                                <select name="year" id="year2" class="form-control"
                                                                    style="color: grey;">
                                                                    <option value="">Select Year</option>
                                                                    <option value="">2019-2020</option>
                                                                    <option value="">2020-2021</option>
                                                                    <option value="">2021-2022</option>
                                                                    <option value="">2022-2023</option>
                                                                    <option value="">2023-2024</option>
                                                                </select>
                                                                <label for="district"
                                                                    class="mr-3 ml-3 text-nowrap mb-0">Month <span
                                                                        class="star">*</span></label>
                                                                <select name="month" id="month2" class="form-control"
                                                                    style="color: grey;">
                                                                    <option value="">Select Month</option>
                                                                    <option value="">January</option>
                                                                    <option value="">February</option>
                                                                    <option value="">March</option>
                                                                    <option value="">April</option>
                                                                    <option value="">May</option>
                                                                    <option value="">June</option>
                                                                    <option value="">July</option>
                                                                    <option value="">August</option>
                                                                    <option value="">September</option>
                                                                    <option value="">October</option>
                                                                    <option value="">November</option>
                                                                    <option value="">December</option>
                                                                </select>

                                                            </div>

                                                            <div class="">
                                                                <button class="dt-button buttons-print" type="button"
                                                                    onclick="printDiv('State-wise-bar-graph' "><span><i
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
                                            <div class="box-heading">
                                                <div class="row select-filter">
                                                    <div class="col-md-4 ">
                                                        <h1 class="main-heading">State wise Patient Report</h1>

                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <label for="district"
                                                                    class="mr-3  text-nowrap mb-0">Year <span
                                                                        class="star">*</span></label>
                                                                <select name="year" id="year2" class="form-control">
                                                                    <option value="">Select Year</option>
                                                                    <option value="">2019-2020</option>
                                                                    <option value="">2020-2021</option>
                                                                    <option value="">2021-2022</option>
                                                                    <option value="">2022-2023</option>
                                                                    <option value="">2023-2024</option>
                                                                </select>
                                                                <label for="district"
                                                                    class="mr-3 ml-3 text-nowrap mb-0">Month <span
                                                                        class="star">*</span></label>
                                                                <select name="month" id="month2" class="form-control">
                                                                    <option value="">Select Month</option>
                                                                    <option value="">January</option>
                                                                    <option value="">February</option>
                                                                    <option value="">March</option>
                                                                    <option value="">April</option>
                                                                    <option value="">May</option>
                                                                    <option value="">June</option>
                                                                    <option value="">July</option>
                                                                    <option value="">August</option>
                                                                    <option value="">September</option>
                                                                    <option value="">October</option>
                                                                    <option value="">November</option>
                                                                    <option value="">December</option>
                                                                </select>

                                                            </div>

                                                            <div class="">
                                                                <button class="dt-button buttons-print" type="button"
                                                                    onclick="printDiv('State-wise-bar-graph' "><span><i
                                                                            class="fa fa-print"
                                                                            aria-hidden="true"></i></span></button>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="row state-graph-filter">
                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state1"
                                                                        class=" state-filter-highchart rounded  ">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="white_card  ">
                                                                <div class="">
                                                                    <div id="integrated-dashboard-state2"
                                                                        class=" state-filter-highchart rounded  received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="">
                                                                <div id="integrated-dashboard-state3"
                                                                    class=" state-filter-highchart rounded mb-0 ">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state4"
                                                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state5"
                                                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state6"
                                                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state7"
                                                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state8"
                                                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state9"
                                                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state10"
                                                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="white_card  ">

                                                                <div class="">
                                                                    <div id="integrated-dashboard-state11"
                                                                        class=" state-filter-highchart rounded mb-0 received-chart">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="col-md-5">
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
                                            <div class="box-heading d-block pb-2">
                                                <h1 class="main-heading mb-0">State wise availability of ARV /
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
                                                <h1 class="main-heading mb-0">Availability of ARS</h1>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="state-wise-ars-bar-graph" class="border rounded mb-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- State wise availability of ARV / ARS end -->
                                <!-- National Dashboard: Report Generate start -->
                                <div class="dashboard-filter mb-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-heading pb-1">
                                                <h1 class="main-heading">Report Generate</h1>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <form action="">
                                                <div class="row align-items-center">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="district" class="mr-3 text-nowrap mb-0">State
                                                                <span class="star">*</span></label>
                                                            <select name="month" id="month" class="form-control"
                                                                style="color: grey;">
                                                                <option value="">Select State</option>
                                                                <option value="">Uttar Pradesh</option>
                                                                <option value="">Madhya Pradesh</option>
                                                                <option value="">Uttarakhand</option>
                                                                <option value="">Himanchal Pradesh</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="district" class="mr-3 text-nowrap mb-0">Month
                                                                <span class="star">*</span></label>
                                                            <select name="month" id="month" class="form-control"
                                                                style="color: grey;">
                                                                <option value="">Select Month</option>
                                                                <option value="">January</option>
                                                                <option value="">February</option>
                                                                <option value="">March</option>
                                                                <option value="">April</option>
                                                                <option value="">May</option>
                                                                <option value="">June</option>
                                                                <option value="">July</option>
                                                                <option value="">August</option>
                                                                <option value="">September</option>
                                                                <option value="">October</option>
                                                                <option value="">November</option>
                                                                <option value="">December</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="formType" class="mr-3 text-nowrap mb-0">Year
                                                                <span class="star">*</span></label>
                                                            <select name="year" id="year" class="form-control"
                                                                style="color: grey;">
                                                                <option value="">Select Year</option>
                                                                <option value="">2019-2020</option>
                                                                <option value="">2020-2021</option>
                                                                <option value="">2021-2022</option>
                                                                <option value="">2022-2023</option>
                                                                <option value="">2023-2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3 mt-4">
                                                        <div class="">
                                                            <button type="submit" class="btn bg-primary button">Export
                                                                Excel</button>
                                                            <button type="reset"
                                                                class="btn bg-danger me-3">Reset</button>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 mt-4">
                                                        <table id="general_profiles_TABLE2" class="w-100 ">
                                                            <thead>
                                                                <tr>
                                                                    <th>State</th>
                                                                    <th>Month | Year</th>
                                                                    <th>View/Download</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>NCT of Delhi </td>
                                                                    <td>September 2023 </td>
                                                                    <td class="download-icon-width">
                                                                        <div class="download ">
                                                                            <a href="#"><span
                                                                                    class="view">View</span></a>
                                                                            <i class="fa fa-file-pdf-o"
                                                                                aria-hidden="true"></i>
                                                                            <span class="size">(42.18kb)
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Uttar Pradesh </td>
                                                                    <td>September 2023 </td>
                                                                    <td class="download-icon-width">
                                                                        <div class="download ">
                                                                            <a href="#"><span
                                                                                    class="view">View</span></a>
                                                                            <i class="fa fa-file-pdf-o"
                                                                                aria-hidden="true"></i>
                                                                            <span class="size">(43.20kb)
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tamil Nadu </td>
                                                                    <td>September 2023 </td>
                                                                    <td class="download-icon-width">
                                                                        <div class="download ">
                                                                            <a href="#"><span
                                                                                    class="view">View</span></a>
                                                                            <i class="fa fa-file-pdf-o"
                                                                                aria-hidden="true"></i>
                                                                            <span class="size">(729.83kb)
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>West Bengal </td>
                                                                    <td>September 2023 </td>
                                                                    <td class="download-icon-width">
                                                                        <div class="download ">
                                                                            <a href="#"><span
                                                                                    class="view">View</span></a>
                                                                            <i class="fa fa-file-pdf-o"
                                                                                aria-hidden="true"></i>
                                                                            <span class="size">(43.14kb)
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <!-- National Dashboard: Report Generate end -->
                                <div class="presumptive-cases dashboard-filter mt-3">
                                    <h1 id="map-text" class="map-text my-3">Human Rabies (Presumptive Cases) in
                                        India
                                    </h1>

                                    <div class="row lform">
                                        <div class="col-md-12 ">
                                            <div class="box">
                                                <span class="user-icon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </span>
                                                <span id="text3" class="cases"> Laboratory Cases- <span id="box3">
                                                    </span> </span>
                                                <br>
                                                <span id="text3" class="case-title">
                                                    Persons Tested
                                                </span>
                                            </div>

                                            <div class="box">
                                                <span class="user-icon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </span>
                                                <span id="text4" class="cases">Laboratory Cases- <span id="box4">
                                                    </span> </span>
                                                <br>
                                                <span id="text4" class="case-title"> Samples Tested
                                                </span>
                                            </div>
                                            <div class="box">
                                                <span class="user-icon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </span>
                                                <span id="text5" class="cases">Laboratory Cases- <span id="box5">
                                                    </span> </span>
                                                <br>

                                                <span id="text5" class="case-title"> Positive </span>
                                            </div>
                                        </div>
                                        <!-- <div class="col-4 ">
                                            <div class="box"><span id="box4">
                                            </span></br><span id="text4">
                                            <strong>Laboratory Cases</strong></br> Samples Tested
                                            </span></div>
                                        </div>
                                        <div class="col-4 ">
                                            <div class="box"><span id="box5">
                                            </span></br><span id="text5">
                                            <strong>Laboratory Cases</strong></br> Positive
                                            </span></div>
                                        </div> -->
                                    </div>

                                    <div class="row defaultform">
                                        <div class="col-md-12">
                                            <div class="box">
                                                <span class="user-icon">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </span>
                                                <span id="box1" class="cases"> </span> </br><span id="text1"
                                                    class="case-title"> </span>
                                            </div>

                                            {{-- <div class="box">
                                                    <span class="user-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </span>
                                                    <span id="box2" class="cases"> </span> <br><span
                                                        id="text2" class="case-title"> </span>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>


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
                                            <div class="col-md-6 pr-4" id="dashboardMap">
                                                <div class="country-map " id="country-map">
                                                    <div class="case-type">
                                                        {{-- <select class="form-control w-auto" name="type"
                                                                id="type">
                                                                <option value="0">Cases</option>
                                                                <option value="1">Deaths</option>
                                                            </select> --}}
                                                    </div>
                                                    <div class="year-selector p-3"> </div>
                                                    <div id="container" class="map"></div>
                                                    <div id="stateMap"><img class="stateImage" src="">
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-6 pl-4">
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
                                        <div class="col-md-12 pr-2">
                                            <div id="containerPie" class="piechart dashboard-filter" height="400">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-2">
                                            <div id="chart" class="dashboard-filter mt-3"></div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 pr-2">
                                            <div class="dashboard-filter mt-3">

                                                <div id="barchart_materialcase">
                                                </div>
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