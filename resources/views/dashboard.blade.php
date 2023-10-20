@extends('layouts.main')
@section("content")
<div class="container-fluid">
<!-- Info boxes -->
<div class="row">
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
                              <option value="" disabled selected> Select Your State </option>
                              @foreach (state_list() as $state)
                              <option value="{{ $state->state_name }}" state-id="{{$state->id}}">
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
                              <option value="yyyy" disabled>yyyy</option>
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
                     {{--
                     <div class="col-lg-3 col-md-3 col-6">
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
                     </div>
                     --}}
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
                              <option value='human_rabies' selected>Human Rabies</option>
                              <option value='animal_bite'>Animal Bite - Dog Bite</option>
                           </select>
                           <small id="diseasesSyndromes-error"
                              class="form-text text-muted"> </small>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-6">
                        <div class="button apply-filter">
                           <label for=""><span
                              class="star"></span></label>
                           <button id="apply_filter" class="btn search-patient-btn bg-primary text-light apply-filter">Search</button>

                        </div>

                        <input type="hidden" value="" id="filter_state">
                        <input type="hidden" value="" id="filter_district">
                        <input type="hidden" value="2022" id="filter_from_year">
                        <input type="hidden" value="" id="filter_to_year">
                        <input type="hidden" value="2" id="filter_form_type">
                        <input type="hidden" value="" id="filter_diseases">
                        <input type="hidden" value={{ session('type')??0 }} id="session_value">
                        <!-- </form> -->
                     </div>
                     <div class="col-lg-3 col-md-3 col-6">
                        <div class="button apply-filter">
                        <label for=""><span
                              class="star"></span></label>
                              <button id="reset_button" class="btn search-patient-btn bg-warning text-light apply-filter">Reset</button>
                        </div>
                     </div>
                  </div>



                  <h1 id="map-text" class="map-text">Human Rabies (Presumptive Cases) in India</h1>
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
                           <select class="form-control" id="l-dropdown" onChange="handleFilterValue(); getLFormData();">
                              <option value="">Select test type</option>
                              <option value="person_tested">Person Tested</option>
                              <option value="sample_tested">Sample Tested</option>
                              <option value="positive_tested">Positive</option>
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
                              <table class='table table-bordered s-p-form-map'>
                                 <thead>
                                    <tr>
                                       <th rowspan='2'>State</th>
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
                                       <th rowspan='2'>State</th>
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



                  <div class="row lform">
                        <div class="col-4 d-flex justify-content-center">
                            <div class="box"><span id="box3">
                                </span></br><span id="text3">
                                    <strong>Laboratory Cases</strong></br> Persons Tested
                              </span></div>
                        </div>
                        <div class="col-4 d-flex justify-content-center">
                            <div class="box"><span id="box4">
                                </span></br><span id="text4">
                                <strong>Laboratory Cases</strong></br> Samples Tested
                              </span></div>
                        </div>
                        <div class="col-4 d-flex justify-content-center">
                            <div class="box"><span id="box5">
                                </span></br><span id="text5">
                                <strong>Laboratory Cases</strong></br> Positive
                              </span></div>
                        </div>
                    </div>



                    <div class="row defaultform">
                        <div class="col 6 d-flex justify-content-center">
                            <div class="box"><span id="box1">
                                </span></br><span id="text1"> </span></div>
                        </div>
                        <div class="col 6 d-flex justify-content-center">
                            <div class="box"><span id="box2">
                                </span></br><span id="text2"> </span></div>
                        </div>
                    </div>
                  <!-- /.row -->
<!-- graph start-->
      <div id="graphical_view">
         <div class="row">
            <div class="col-md-6">
                  <div id="piechart" style="width: 100%; height: 500px;"></div>
            </div>

            <div class="col-md-6">
                  <div id="piecharts" style="width: 100%; height: 500px;"></div>
            </div>
         </div>
<!-- end here -->
         <div class="row">
            <div class="col-md-12">
               <div id="chart"></div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
                  <h1>Cases by Age Group in India (Based on Male and Female)</h1>
                  <div id="chartContainer" style="height: 400px;"></div>
            </div>
         </div>
      </div>


               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- /.card -->
</div>

@endsection
