@extends('layouts.main')
@section('content')
@section('title')
{{__('Laboratory Dashboard')}}
@endsection
<style>
@media print {

    /* Add styles for print here */
    #laboratory-map {
        /* Adjust map styles for print */
        width: 100%;
        /* Adjust as needed */
    }

    .laboratoryDetailsDatas {
        /* Adjust table styles for print */
        width: 100%;
        /* Adjust as needed */
    }

    /* Add other print-specific styles as needed */
}
</style>

<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        <div class="col-md-12">

            <!-- general form elements -->
            <div class=" card-primary dashboard">
                @if (Auth::user()->user_type == 1)
                <div class="form-tab">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="bootstrap-tab">
                                    <div class="tab-content" id="myTabContent">

                                        <div class="" id="nav-add-patient-record" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            {{-- <form action="{{ url('/record-filter') }}" method="post"
                                            class="myForm">
                                            <form action="#" method="post" class="myForm"> --}}
                                                {{-- @csrf --}}

                                                <div class="dashboard-filter mb-4" id="dashboard-filter">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2 col-4">
                                                            <div class="form-group">
                                                                <label for="state">Institute Name</label>
                                                                <select class="form-select month click-function"
                                                                    aria-label="Default select example" id="institute"
                                                                    name="institute"
                                                                    onChange="handleFilterValue();handleDistrict()">
                                                                    <option value="" disabled selected
                                                                        institute-name=""> Select Institute
                                                                    </option>
                                                                    @foreach ($institutes as $key => $institute)
                                                                    <option value="{{ $institute->id }}">
                                                                        {{ $institute->name }}
                                                                        ({{ ucfirst(@$institute->state->state_name) }})
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <small id="institute-error"
                                                                    class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-4">
                                                            <div class="form-group">
                                                                <label for="state">Month</label>
                                                                <select class="form-select month click-function"
                                                                    aria-label="Default select example" id="month"
                                                                    name="month_name"
                                                                    onChange="handleFilterValue();handleDistrict()">
                                                                    <option value="" disabled selected month-name="">
                                                                        Select Month
                                                                    </option>
                                                                    @foreach ($months as $key => $month)
                                                                    <option value="{{ $key + 1 }}">
                                                                        {{ $month }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                <small id="month-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-4">
                                                            <div class="form-group">
                                                                <label for="fromYear">From Year</label>
                                                                <select class="form-select p-1 year click-function"
                                                                    name="year" aria-label="Default select example"
                                                                    id="year" required=""
                                                                    onChange="handleFilterValue()">
                                                                    <option value="" disabled selected year-name="">
                                                                        Select Year
                                                                    </option>
                                                                    <?php
                                                                            $currentYear = date('Y');
                                                                            for ($year = $currentYear; $year >= 2015; $year--) {
                                                                                $selected = $year == 2022 ? '' : '';
                                                                                echo "<option value='$year' $selected>$year</option>";
                                                                            }
                                                                            ?>
                                                                </select>
                                                                <span class="calender"></span>
                                                                <small id="fromYear-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-3 col-4 pt-5">
                                                            <button id="laboratory_apply_filter"
                                                                class="btn bg-primary text-light laboratory_apply_filter button border-0 mr-2">Search</button>
                                                            <button id="laboratory_reset_button"
                                                                class="btn bg-primary text-light laboratory_apply_filter button border-0 mr-2">Reset</button>
                                                        </div>
                                                    </div>



                                                </div>
                                        </div>
                                        <div class="presumptive-cases dashboard-filter mb-4 laboratory-card">
                                            <div class="row defaultform justify-content-center">
                                                <div class="col-md-3">
                                                    <div class="box box1">
                                                        <span class="user-icon">
                                                            <i class="fa fa-users" aria-hidden="true"></i>
                                                        </span>
                                                        <div class="cases">
                                                            <div class="d-inline-block ml-2">
                                                                <span id="rabiestext1" class="">Number of
                                                                    Patients </span>
                                                                </br><span id="rabiesbox1" class="case-title">
                                                                    {{ $numberOfPatient }}
                                                                </span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="box box2">
                                                        <span class="user-icon">
                                                            <!-- <i class="fa fa-users" aria-hidden="true"></i> -->
                                                            <img src="{{ asset('assets/images/sample.png') }}"
                                                                alt="sample">
                                                        </span>
                                                        <div class="cases">
                                                            <div class="d-inline-block ml-2">
                                                                <span id="rabietext2" class="">Number of
                                                                    Sample Received </span>
                                                                <br><span id="rabiesbox2"
                                                                    class="case-title">{{ $numberOfSampleReceived }}
                                                                </span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="box box3">
                                                        <span class="user-icon">
                                                            <!-- <i class="fa fa-users" aria-hidden="true"></i> -->
                                                            <img src="{{ asset('assets/images/positive.png') }}"
                                                                alt="sample">
                                                        </span>
                                                        <div class="cases">
                                                            <div class="d-inline-block ml-2">
                                                                <span id="rabiestext3" class="">Total number of
                                                                    Positives </span>
                                                                <br><span id="rabiesbox3" class="case-title">
                                                                    {{ $numbersOfPositives }}
                                                                </span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="box box4">
                                                        <span class="user-icon">
                                                            <!-- <i class="fa fa-users" aria-hidden="true"></i> -->
                                                            <img src="{{ asset('assets/images/ihip.jpg') }}"
                                                                alt="sample">
                                                        </span>
                                                        <div class="cases">
                                                            <div class="d-inline-block ml-2">
                                                                <span id="rabiestext" class="cases">No. Entered
                                                                    into
                                                                    IHIP </span>
                                                                </br>
                                                                <span id="rabiesbox4"
                                                                    class="case-title">{{ $numbersOfInteredIhip }}
                                                                </span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <!-- /.row -->
                                        <div class="card-body p-3 mb-4 dashboard-filter">
                                            <div class="row bg-white">
                                                <div class="col-md-12 ">
                                                    <div
                                                        class="map-text m-0 mb-2 d-flex align-items-center justify-content-between">
                                                        <h1 class="m-0 mr-3 d-inline-block">Institute list</h1>
                                                        <button class="buttons-print float-right" type="button"
                                                            onclick="printContent('printMap1')"><span>
                                                                <i class="fa fa-print"></i></span></button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div>
                                                <div class="row bg-white">
                                                    <div class="col-md-6 pr-4" id="printMap1">
                                                        {{-- map code html --}}
                                                        <div id="laboratory-map"></div>
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
                                                                id="laboratoryDetailsData">
                                                            </div>

                                                            <div
                                                                class="table-responsive laboratoryDetailsDatas dashboard-table">
                                                                <table class='table table-bordered s-p-form-map'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th rowspan='2'
                                                                                class="state_filter_district">
                                                                                Institute
                                                                            </th>
                                                                            <th colspan='2'>
                                                                                No. of Test Conducted
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tableBody">

                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- graph start-->
                                        <div class="card-body p-3 mb-4 dashboard-filter">
                                            <div id="graphical_view" class="">
                                                <div class="row">
                                                    <div
                                                        class="table-responsive laboratoryDetailsDatas dashboard-table">
                                                        <table class='table table-bordered s-p-form-map'>
                                                            <thead>
                                                                <tr>
                                                                    <th>No. of Patients</th>
                                                                    <th>No. of Sample Received</th>
                                                                    <th>No. of Test Conducted</th>
                                                                    <th>Total number of Positives</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tableGraphBody"></tbody>
                                                        </table>
                                                    </div>


                                                </div>
                                                <!-- end here -->
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <div id="container-speed" class="chart-container"></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="container-rpm" class="chart-container"></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="container-rpm-first" class="chart-container"></div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="container-rpm-second" class="chart-container"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="graphical_view ">
                                            <div class="row">

                                                <div class="col-md-6 pr-3 institute_year_filter">
                                                    <div class="institute_year_filter">
                                                        <select class="form-control w-auto" name="institute_year"
                                                            id="institute_year_filter">
                                                            <option value="numbers_of_sample_recieved">No. of Sample
                                                                Received</option>
                                                            <option value="numbers_of_positives">Total numbers of
                                                                Positives</option>
                                                            <option value="numbers_of_test">Number of Test Conducted
                                                            </option>
                                                            <option value="numbers_of_intered_ihip">No. of Entered into
                                                                IHIP</option>
                                                        </select>
                                                    </div>
                                                    <div id="yearReport" class="dashboard-filter "></div>
                                                </div>
                                                <div class="col-md-6 pl-2">
                                                    <div class="dashboard-filter ">
                                                        <div id="monthlyReport" style="height: 400px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="graphical_view">
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="dashboard-filter mt-4">
                                                        <div id="monthlySampleReport" style="height: 400px;"></div>
                                                    </div>
                                                </div>
                                            </div>
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