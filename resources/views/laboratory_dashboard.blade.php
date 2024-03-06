@extends('layouts.main')
@section('content')
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
        <div class="card card-primary dashboard">
            @if (Auth::user()->user_type == 1)
                <div class="form-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-right">
                                <button id="printButton" onclick="printDiv('printableArea')"
                                    class="btn  bg-primary text-light apply-filter button border-0 mb-2">Print</button>
                                <div>
                                </div>
                            </div>
                            <div id="printableArea">
                                <div class="bootstrap-tab">
                                    <div class="tab-content" id="myTabContent">

                                        <div class="" id="nav-add-patient-record" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            {{-- <form action="{{ url('/record-filter') }}" method="post"
                                                class="myForm">
                                                <form action="#" method="post" class="myForm"> --}}
                                                    {{-- @csrf --}}

                                                    <div class="dashboard-filter" id="dashboard-filter">
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 col-4">
                                                                <div class="form-group">
                                                                    <label for="state">Month</label>
                                                                    <select class="form-select month click-function"
                                                                        aria-label="Default select example"
                                                                        id="month" name="month_name"
                                                                        onChange="handleFilterValue();handleDistrict()">
                                                                        <option value="" disabled selected
                                                                            month-name=""> Select Month
                                                                        </option>
                                                                        @foreach ($months as $key => $month)
                                                                            <option value="{{ $key + 1 }}">
                                                                                {{ $month }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    <small id="month-error"
                                                                        class="form-text text-muted">
                                                                    </small>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 col-md-2 col-4">
                                                                <div class="form-group">
                                                                    <label for="fromYear">From Year</label>
                                                                    <select
                                                                        class="form-select p-1 year click-function"
                                                                        name="year"
                                                                        aria-label="Default select example"
                                                                        id="year" required=""
                                                                        onChange="handleFilterValue()">
                                                                        <option value="" disabled selected
                                                                            year-name=""> Select Year
                                                                        </option>
                                                                        <?php
                                                                        $currentYear = date('Y');
                                                                        for ($year = $currentYear; $year >= 2015; $year--) {
                                                                            $selected = $year == 2022 ? '' : '';
                                                                            echo "<option value='$year' $selected>$year</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <span class="calender"><i class="fa fa-calendar"
                                                                            aria-hidden="true"></i></span>
                                                                    <small id="fromYear-error"
                                                                        class="form-text text-muted">
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
                                                    <div class="presumptive-cases dashboard-filter mt-5">
                                                        <div class="row defaultform">
                                                            <div class="col-md-12">
                                                                <div class="box">
                                                                    <span class="user-icon">
                                                                        {{-- icon --}}
                                                                    </span>
                                                                    <span id="rabiesbox1" class="cases">Number of Patients-{{ $numberOfPatient }}</span>
                                                                    </br><span id="rabiestext1" class="case-title">
                                                                    </span>
                                                                </div>

                                                                <div class="box">
                                                                    <span class="user-icon">
                                                                        {{-- icon --}}
                                                                    </span>
                                                                    <span id="rabiesbox2" class="cases">Numbers of Sample Received- {{ $numberOfSampleReceived }}</span>
                                                                    <br><span id="rabiestext2" class="case-title">
                                                                    </span>
                                                                </div>
                                                                <div class="box">
                                                                    <span class="user-icon">
                                                                        {{-- icon --}}
                                                                    </span>
                                                                    <span id="rabiesbox3" class="cases">Total numbers of Positives-{{ $numbersOfPositives }}</span>
                                                                    <br><span id="rabiestext3" class="case-title">
                                                                    </span>
                                                                </div>
                                                                <div class="box">
                                                                    <span class="user-icon">
                                                                       {{-- icon --}}
                                                                    </span>
                                                                    <span id="rabiesbox4" class="cases">No. Entered into IHIP-{{ $numbersOfInteredIhip }}</span>
                                                                    </br>
                                                                    <span id="rabiestext4" class="case-title">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- /.row -->
                                                    <div class="card-body p-3 my-5 dashboard-filter">
                                                        <div class="row bg-white">
                                                            <div class="col-md-12 ">
                                                                <div
                                                                    class="map-text m-0 mb-2 d-flex align-items-center justify-content-between">
                                                                    <h1 class="m-0 mr-3 d-inline-block">Deaths
                                                                        cases state
                                                                        wise </h1>
                                                                    <button class="buttons-print float-right"
                                                                        type="button"
                                                                        onclick="printContent('printMap1')"><span>
                                                                            <i
                                                                                class="fa fa-print"></i></span></button>
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
                                                                            <table
                                                                                class='table table-bordered s-p-form-map'>
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th rowspan='2'
                                                                                            class="state_filter_district">
                                                                                            State
                                                                                        </th>
                                                                                        <th colspan='2'>
                                                                                            Presumptive
                                                                                        </th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Cases</th>
                                                                                        <th>Deaths</th>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
            @endif
        </div>
    </div>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection