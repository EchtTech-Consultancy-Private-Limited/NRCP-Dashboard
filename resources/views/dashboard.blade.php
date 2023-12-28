@extends('layouts.main')
@section('content')
    <style>
        @media print {

            /* Add styles for print here */
            #container {
                /* Adjust map styles for print */
                width: 100%;
                /* Adjust as needed */

            }

            .detailsDatas {
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
                    <!-- <div class=" apply-filter">
                       
                        <button id="printButton" class="btn apply-filter text-white button">Print</button>
                    </div> -->
                    <!-- <div class="row">
                        <div class="col-sm-8">
                            <h1 class="text-left  main-title nrcp-main-title">State Dashboard - Human Health Rabies</h1>
                        </div>
                    </div> -->
                    <div class="form-tab">
                        <div class="bootstrap-tab">
                            <div class="tab-content" id="myTabContent">
                                <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                                    <!-- <form action="{{ url('/record-filter') }}" method="post" class="myForm"> -->
                                    <!-- <form action="#" method="post" class="myForm"> -->
                                    <!-- @csrf -->
                                    <div class="dashboard-filter" id="dashboard-filter">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-6">
                                                <div class="form-group">
                                                    <label for="state">State<span class="star">*</span></label>
                                                    <select class="form-select state click-function"
                                                        aria-label="Default select example" id="state" name="state_name"
                                                        onChange="handleFilterValue();handleDistrict()">
                                                        <option value="" disabled selected state-name=""> Select Your
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
                                            <div class="col-lg-3 col-md-3 col-6">
                                                <div class="form-group">
                                                    <label for="district">District<span class="star">*</span></label>
                                                    <select class="form-select click-function"
                                                        aria-label="Default select example" id="district"
                                                        name="district_name" onChange="handleFilterValue()">
                                                        <option value="" dist-name="">Enter your District </option>
                                                    </select>
                                                    <small id="district-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-6">
                                                <div class="form-group">
                                                    <label for="fromYear">From Year<span class="star">*</span></label>
                                                    <select class="form-select p-1 year click-function" name="year"
                                                        aria-label="Default select example" id="year" required=""
                                                        onChange="handleFilterValue()">
                                                        <option value="yyyy" disabled>yyyy</option>
                                                        <?php
                                                        $currentYear = date('Y');
                                                        for ($year = $currentYear; $year >= 2015; $year--) {
                                                            $selected = $year == 2022 ? 'selected' : '';
                                                            echo "<option value='$year' $selected>$year</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <span class="calender"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <small id="fromYear-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-6">
                                                <div class="form-group">
                                                    <label for="toYear">To Year<span class="star">*</span></label>
                                                    <select class="form-select p-1 year click-function" name="toYear"
                                                        aria-label="To Year" id="yearto" onChange="handleFilterValue()">
                                                        <!-- Options will be populated dynamically using JavaScript -->
                                                    </select>
                                                    <span class="calender"><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                    <small id="toYear-error" class="form-text text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-6">
                                                <div class="form-group">
                                                    <label for="formType">Form Type<span class="star">*</span></label>
                                                    <select class="form-select " aria-label="Default select example"
                                                        id="formType" onChange="handleFormType()">
                                                        <option value="" disabled> Select Form Type
                                                        </option>
                                                        <option value="1" form-type="l-form">L Form</option>
                                                        <option value="2" form-type="p-form" selected>P Form</option>
                                                        <option value="3" form-type="s-form">S Form</option>
                                                    </select>
                                                    <small id="formType-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-6">
                                                <div class="form-group">
                                                    <label for="diseasesSyndromes">Diseases Syndromes<span
                                                            class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        id="diseasesSyndromes" onChange="handleFilterValue()">
                                                        <option value=""> Select Diseases Syndromes
                                                        </option>
                                                        <option value='human_rabies' selected>Human Rabies</option>
                                                        <option value='animal_bite'>Animal Bite - Dog Bite</option>
                                                    </select>
                                                    <small id="diseasesSyndromes-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>


                                            <div class="col-lg-3 col-md-3 col-6" id="test_performed">
                                                <div class="form-group">
                                                    <label for="testPerformed" class="d-block">Test Performed<span
                                                            class="star">*</span></label>
                                                    <select class="form-control" id="mySelect2" multiple="multiple"
                                                        aria-label="Default select">
                                                        <!-- <option value="" selected>--All--</option> -->
                                                        <option name="test-performed" value="direct_fat_post">Direct FAT
                                                            (Postmortem)</option>
                                                        <option name="test-performed" value="direct_fat_skin">Direct FAT
                                                            (Skin Biopsy- Antemortem)</option>
                                                        <option name="test-performed" value="virus_isolation">Virus
                                                            Isolation by Cell Culture</option>
                                                        <option name="test-performed" value="ag_capture">Ag Capture ELISA
                                                            (Post Mortem)</option>
                                                        <option name="test-performed" value="rabies_rt">Rabies RT-PCR
                                                        </option>
                                                        <option name="test-performed" value="rffit">RFFIT- rabies virus
                                                            neutralising antibody (RVNA) titres</option>
                                                    </select>
                                                    <small id="testPerformed-error" class="form-text text-muted"> </small>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-6 search-reset">
                                                <div class=" apply-filter">
                                                    <!-- <label for=""><span
                                  class="star"></span></label> -->
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
                                                        class="btn border-0 text-light apply-filter text-white button">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="presumptive-cases dashboard-filter mt-5">
                                        <h1 id="map-text" class="map-text my-3">Human Rabies (Presumptive Cases) in India
                                        </h1>

                                        <div class="row lform">
                                            <div class="col-md-12 ">
                                                <div class="box">
                                                    <span class="user-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </span>
                                                    <span id="text3" class="cases"> Laboratory Cases- <span
                                                            id="box3">
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
                                                    <span id="text4" class="cases">Laboratory Cases- <span
                                                            id="box4">
                                                        </span> </span>
                                                    <br>
                                                    <span id="text4" class="case-title"> Samples Tested
                                                    </span>
                                                </div>
                                                <div class="box">
                                                    <span class="user-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </span>
                                                    <span id="text5" class="cases">Laboratory Cases- <span
                                                            id="box5">
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
                                                    <span id="box1" class="cases"> </span> </br><span
                                                        id="text1" class="case-title"> </span>
                                                </div>

                                                <div class="box">
                                                    <span class="user-icon">
                                                        <i class="fa fa-users" aria-hidden="true"></i>
                                                    </span>
                                                    <span id="box2" class="cases"> </span> <br><span id="text2"
                                                        class="case-title"> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- /.row -->
                                    <div class="card-body p-0 my-5">
                                        <div class="row bg-white">


                                            <div class="col-md-6 pr-4">
                                                <div class="country-map dashboard-filter" id="country-map">
                                                    <div class="case-type">
                                                        <select class="form-control w-auto" name="type"
                                                            id="type">
                                                            <option value="0">Cases</option>
                                                            <option value="1">Deaths</option>
                                                        </select>
                                                        <select class="form-control" id="l-dropdown"
                                                            onChange="handleFilterValue(); getLFormData();">
                                                            <option value="">Select test type</option>
                                                            <option value="person_tested">Person Tested</option>
                                                            <option value="sample_tested">Sample Tested</option>
                                                            <option value="positive_tested">Positive</option>
                                                        </select>
                                                    </div>
                                                    <div class="year-selector p-3"> </div>
                                                    <div id="container" class="map"></div>
                                                    <div id="stateMap"><img class="stateImage" src=""></div>
                                                </div>


                                            </div>

                                            <div class="col-md-6 pl-4">
                                                <div class="dashboard-filter">
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
                                                                    <th colspan='2'>Presumptive </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>Cases</th>
                                                                    <th>deaths</th>
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

                                    <!-- /.row -->
                                    <!-- graph start-->
                                    <div id="graphical_view">
                                        <div class="row">
                                            <div class="col-md-6 pr-4">
                                                <div id="piechart" class="piechart dashboard-filter" height="400">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl-4">
                                                <div id="piecharts" class="piechart dashboard-filter " height="400">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 pr-4">
                                                <div id="chart" class="dashboard-filter mt-5"></div>
                                            </div>

                                            <div class="col-md-6 pl-4">
                                                <div class="dashboard-filter mt-5">
                                                    {{-- <h1>Cases by Age Group in India (Based on Male and Female)</h1> --}}
                                                    <div id="chartContainer" style="height: 400px;"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr-4">
                                                <div class="dashboard-filter mt-5">
                                                   
                                                    <div id="barchart_materialcase" style="width: 410px; height: 250px;"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl-4">
                                                <div class="dashboard-filter mt-5">
                                                    {{-- <h1></h1> --}}
                                                    <div id="barchart_materialdeath" style="width: 410px; height: 250px;"></div>
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
            </div>
        @endsection
