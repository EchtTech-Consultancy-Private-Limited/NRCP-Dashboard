@extends('layouts.main')
@section("content")
@section('title')
{{__('PForm')}}
@endsection

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary p-form-card">
                    <div class="form-tab">
                        <div class="bootstrap-tab">
                            <nav>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-add-patient-record" type="button" role="tab"
                                        aria-controls="nav-add-patient-record" aria-selected="true">Add Patient Record
                                    </li>
                                    <li class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-add-death-record" type="button" role="tab"
                                        aria-controls="nav-add-death-record" aria-selected="false">Add Death
                                        Record</li>
                                    <li class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-record-aggregate-data" type="button" role="tab"
                                        aria-controls="nav-record-aggregate-data" aria-selected="false">Record Aggregate
                                        Data</li>
                                    <li class="nav-link" id="nav-submit-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-submit-null-report" type="button" role="tab"
                                        aria-controls="nav-submit-null-report" aria-selected="false">Submit Null
                                        Report</li>
                                </ul>
                            </nav>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="nav-add-patient-record" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="note"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Enter Data
                                        Accurately and Completely
                                    </div>

                                    <form action="{{ route('pform.store') }}" method="post"
                                        enctype="multipart/form-data" class="myPForm">
                                        @csrf
                                        <div class="row bg-c-gray">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="label-title"><b>1. Patient Details:</b></div>
                                            </div>
                                            <div class="col-lg-4 col-md-4">
                                                <label for="search-patient" class="label mb-0 mt-2">Contact
                                                    Number:</label>
                                                <div class="form-group d-flex">
                                                    <div class="w-100 mr-3">
                                                        <select name="country_code" id="country_code"
                                                            class="form-control mt-0">
                                                            <option value="">Select Country</option>
                                                            @foreach ($countryes as $key => $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ $country->id == old('country_code') ? 'selected' : '' }}>
                                                                {{ $country->abbreviation }} +{{ $country->dial_code }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('country_code'))
                                                        <span
                                                            class="form-text text-muted">{{ $errors->first('country_code') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="w-100">
                                                        <input type="text" name="mobile_number"
                                                            value="{{ old('mobile_number') }}" maxlength="10"
                                                            oninput="validateInput(this)" id="mobile_number"
                                                            class="form-control" placeholder="Enter Your Mobile Number">
                                                        @if ($errors->has('mobile_number'))
                                                        <span
                                                            class="form-text text-muted">{{ $errors->first('mobile_number') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-8 col-md-8">
                                                <a href="{{ url('patient_records_form') }}"
                                                    class="search-patient-btn bg-info text-light"
                                                    id="search-patient-btn">Search Patient</a>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="first-name">First Name<span
                                                            class="star">*</span></label>
                                                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                                                        id="first-name" class="form-control"
                                                        placeholder="Enter Your First Name" maxlength="30" required>
                                                    @if ($errors->has('first_name'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="middle-name">Middle Name</label>
                                                    <input type="text" name="middle_name"
                                                        value="{{ old('middle_name') }}" maxlength="30" id="middle-name"
                                                        class="form-control" placeholder="Enter Your Middle Name">
                                                    @if ($errors->has('middle_name'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('middle_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="last-name">Last Name<span class="star">*</span></label>
                                                    <input type="text" name="last_name" value="{{ old('last_name') }}"
                                                        id="last-name" class="form-control" maxlength="30" required
                                                        placeholder="Enter Your Last Name">
                                                    @if ($errors->has('last_name'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('last_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="date-b" class="mr-5">Date of Birth<span
                                                            class="star">*</span></label>
                                                    <input type="date" name="birth_of_date"
                                                        value="{{ old('birth_of_date') }}" id="birth_of_date"
                                                        class="form-control" required>
                                                    @if ($errors->has('birth_of_date'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('birth_of_date') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="gander">Gender<span class="star">*</span></label>
                                                    <select class="form-select" name="gender"
                                                        aria-label="Default select example" id="gender" required>
                                                        <option value=""> Select Your Gender</option>
                                                        @if(old('gender'))
                                                        <option value="{{ old('gender') }}" selected>{{ old('gender') }}
                                                        </option>
                                                        @endif
                                                        <option value="Male"> Male</option>
                                                        <option value="Famale"> Famale</option>
                                                        <option value="Other"> Other</option>
                                                    </select>
                                                    @if ($errors->has('gender'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('gender') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="id-type">Id Type<span class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="id_type" id="id-type" required>
                                                        <option value="">Select Your id-type</option>
                                                        @if(old('id_type'))
                                                        <option value="{{ old('id_type') }}" selected>
                                                            {{ old('id_type') }}</option>
                                                        @endif
                                                        <option value="1">First</option>
                                                        <option value="2">Second</option>
                                                        <option value="3">Third</option>
                                                    </select>
                                                    @if ($errors->has('id_type'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('id_type') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="identification">Identification Number<span
                                                            class="star">*</span></label>
                                                    <input type="text" class="form-control" name="identification_number"
                                                        id="identification_number"
                                                        value="{{ old('identification_number') }}"
                                                        aria-describedby="Identification"
                                                        placeholder="Enter Your Identification Number" maxlength="16"
                                                        required>
                                                    @if ($errors->has('identification_number'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('identification_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="citizenship">Citizenship</label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="citizenship" id="citizenship">
                                                        <option value=""> Select Your Citizenship
                                                        </option>
                                                        @foreach ($countryes as $key => $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ $country->id == old('country_code') ? 'selected' : '' }}>
                                                            {{ $country->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    <small id="citizenship-error" class="form-text text-muted"> </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="label-title"><b>Present Adderess:</b></div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="state">State<span class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="pform_state" id="pform_state" required>
                                                        <option value=""> Select Your state</option>
                                                        @foreach ($states as $key => $state)
                                                        <option value="{{ $state->id }}"
                                                            {{ $state->id == old('state') ? 'selected' : '' }}>
                                                            {{ $state->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('pform_state'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('pform_state') }}</span>
                                                    @endif
                                                    <small id="state-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="district">District<span class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="pform_city" id="pform_city" required>
                                                        <option value=""> Select Your district
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('pform_city'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('pform_city') }}</span>
                                                    @endif
                                                    <small id="district-error" class="form-text text-muted"> </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="taluka">Taluka<span class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="taluka" id="taluka" required>
                                                        <option value=""> Select Your taluka</option>
                                                        @if(old('taluka'))
                                                        <option value="{{ old('taluka') }}" selected>{{ old('taluka') }}
                                                        </option>
                                                        @endif
                                                        <option value="1"> Taluka one</option>
                                                        <option value="2"> Taluka two</option>
                                                        <option value="3"> Taluka three</option>
                                                    </select>
                                                    @if ($errors->has('taluka'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('taluka') }}</span>
                                                    @endif
                                                    <small id="taluka-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="village">Village<span class="star">*</span></label>
                                                    <input type="text" class="form-control" name="village" id="village"
                                                        value="{{ old('village') }}" aria-describedby="Identification"
                                                        placeholder="Enter Your Identification Number" maxlength="16"
                                                        required>
                                                    @if ($errors->has('village'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('village') }}</span>
                                                    @endif
                                                    <small id="village-error" class="form-text text-muted"> </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="house-no">House No</label>
                                                    <input type="text" class="form-control" name="house_no"
                                                        id="house_no" value="{{ old('house_no') }}"
                                                        aria-describedby="house_no" placeholder="Enter Your House No"
                                                        maxlength="20">
                                                    @if ($errors->has('house_no'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('house_no') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="street-name">Street Name</label>
                                                    <input type="text" class="form-control" name="street_name"
                                                        id="street-name" value="{{ old('street_name') }}"
                                                        aria-describedby="street-name"
                                                        placeholder="Enter Your Street Name" maxlength="40">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="landmark">Landmark </label>
                                                    <input type="text" class="form-control" name="landmark"
                                                        id="landmark" aria-describedby="landmark"
                                                        placeholder="Enter Your Landmark" value="{{ old('landmark') }}"
                                                        maxlength="40">
                                                    <small id="landmark-error" class="form-text text-muted"> </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="pin-code">PIN Code</label>
                                                    <input type="text" class="form-control" name="pincode" id="pincode"
                                                        value="{{ old('pincode') }}" oninput="validateInput(this)"
                                                        placeholder="Enter Your PIN Code" maxlength="8">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="note"><i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                            Enter Data Accurately and Completely
                                        </div>

                                        <div class="row bg-c-gray">

                                            <div class="col-lg-12 col-md-12">
                                                <div class="label-title"><b>2. Clinical Details:</b> </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="provisinal-diagnosis">Provisinal Diagnosis <span
                                                            class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="provisinal_diagnosis" id="provisinal_diagnosis" required>
                                                        <option value=""> Select Your Diagnosis</option>
                                                        @if(old('provisinal_diagnosis'))
                                                        <option value="{{ old('provisinal_diagnosis') }}" selected>
                                                            {{ old('provisinal_diagnosis') }}</option>
                                                        @endif
                                                        <option value="Anthrax">Anthrax</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                    @if ($errors->has('provisinal_diagnosis'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('provisinal_diagnosis') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="date-of-onset">Date of Onset<span
                                                            class="star">*</span></label>
                                                    <input type="date" name="date_of_onset" class="form-control"
                                                        id="date_of_onset" aria-describedby="Date of Onset"
                                                        placeholder="Enter Your Date of Onset" required>
                                                    @if ($errors->has('date_of_onset'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('date_of_onset') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="OPD-IPD">OPD/IPD<span class="star">*</span></label>
                                                    <select class="form-select" name="opd_ipd"
                                                        aria-label="Default select example" id="opd_ipd" required>
                                                        <option value=""> Select Your OPD-IPD
                                                        </option>
                                                        @if(old('opd_ipd'))
                                                        <option value="{{ old('opd_ipd') }}" selected>
                                                            {{ old('opd_ipd') }}</option>
                                                        @endif
                                                        <option value="OPD">OPD</option>
                                                        <option value="IPD">IPD</option>
                                                    </select>
                                                    @if ($errors->has('opd_ipd'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('opd_ipd') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="note"><i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                            Enter Data Accurately and Completely
                                        </div>

                                        <div class="row bg-c-gray">

                                            <div class="col-lg-12 col-md-12">
                                                <div class="label-title"><b>3. Laboratory Details:</b> </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="provisinal-diagnosis">Test Suspected For <span
                                                            class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="test_suspected" id="test_suspected" required>
                                                        <option value=""> Select Test Suspectes</option>
                                                        @if(old('test_suspected'))
                                                        <option value="{{ old('test_suspected') }}" selected>
                                                            {{ old('test_suspected') }}</option>
                                                        @endif
                                                        <option value="Anthrax">Anthrax</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                    @if ($errors->has('test_suspected'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('test_suspected') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="provisinal-diagnosis">Type of Sample <span
                                                            class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="type_of_sample" id="type_of_sample" required>
                                                        <option value=""> Select Sample</option>
                                                        @if(old('type_of_sample'))
                                                        <option value="{{ old('type_of_sample') }}" selected>
                                                            {{ old('type_of_sample') }}</option>
                                                        @endif
                                                        <option label="Aspirate" value="Aspirate">Aspirate</option>
                                                        <option label="Blood" value="Blood">Blood</option>
                                                        <option label="Serum" value="Serum">Serum</option>
                                                        <option label="Others" value="Others">Others</option>
                                                    </select>
                                                    @if ($errors->has('type_of_sample'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('type_of_sample') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="OPD-IPD">Test Requested<span
                                                            class="star">*</span></label>
                                                    <select class="form-select" name="test_resquested"
                                                        aria-label="Default select example" id="test_resquested">
                                                        <option value=""> Select Test</option>
                                                        @if(old('test_resquested'))
                                                        <option value="{{ old('test_resquested') }}" selected>
                                                            {{ old('test_resquested') }}</option>
                                                        @endif
                                                        <option label="Microscopy- Gram Stain"
                                                            value="Microscopy- Gram Stain">
                                                            Microscopy- Gram Stain</option>
                                                        <option label="Gamma Phage Lysis" value="Gamma Phage Lysis">
                                                            Gamma
                                                            Phage Lysis</option>
                                                        <option label="Culture" value="Culture">Culture</option>
                                                        <option label="PCR -Toxin/Capsule/Direct clinical sample"
                                                            value="PCR -Toxin/Capsule/Direct clinical sample">PCR
                                                            -Toxin/Capsule/Direct clinical
                                                            sample</option>
                                                    </select>
                                                    @if ($errors->has('test_resquested'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('test_resquested') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="OPD-IPD">Sample Collection Date (If Collected)<span
                                                            class="star">*</span></label>
                                                    <input type="date" name="sample_date"
                                                        value="{{ old('sample_date') }}" class="form-control"
                                                        id="sample_date" aria-describedby="Date of Sample Collection"
                                                        required>
                                                    @if ($errors->has('sample_date'))
                                                    <span
                                                        class="form-text text-muted">{{ $errors->first('sample_date') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="button d-flex justify-content-center mt-3">
                                            <button type="submit"
                                                class="btn search-patient-btn mr-3 bg-primary text-light">save</button>
                                            <button class="btn search-patient-btn bg-danger text-light">Reset</button>
                                        </div>
                                    </form>
                                    <div class="row bg-c-gray bg-white p-0 mt-3">

                                        <div class="col-lg-12 col-md-12">
                                            <div class="label-title"><b>6. Line Listing Of Patient</b> </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="table-responsive" id="nav-add-patient-record" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <table id="general_profiles_TABLE2" class="display ">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl#</th>
                                                            <th>Action</th>
                                                            <th>Person Name
                                                                <span>
                                                                    <a class="btn-arrow">
                                                                        <span
                                                                            class="fa fa-long-arrow-right printhide arrow-r"></span>
                                                                        <span
                                                                            class="fa fa-long-arrow-left printhide arrow-l d-none"></span>
                                                                    </a>
                                                                </span>
                                                            </th>
                                                            <th>Contact Number</th>
                                                            <th class="hide-th">Age </th>
                                                            <th class="hide-th">Gender</th>
                                                            <th class="hide-th">ID Type/Id No</th>
                                                            <th class="hide-th">State</th>
                                                            <th class="hide-th">District</th>
                                                            <th class="hide-th">Sub District</th>
                                                            <th class="hide-th">Village</th>
                                                            <th class="hide-th">Address</th>
                                                            <th>Provisional Diagnosis</th>
                                                            <th>Date of Onset</th>
                                                            <th>OPD/IPD</th>
                                                            <th>Test Suspected</th>
                                                            <th>Type of Sample</th>
                                                            <th>Date of Sample Collection</th>
                                                            <th>Test Requested</th>
                                                            <th class="none"></th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        @if($pForms)
                                                        @foreach($pForms as $pForm)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td class="text-nowrap ">
                                                                <a href="javascript:void();"
                                                                    id="edit_{{$loop->iteration}}"
                                                                    class="btn bg-success action-btn pformEdit"
                                                                    data-id="{{$loop->iteration}}" title="Edit"> <i
                                                                        class="fa fa-edit"></i> </a>
                                                                <a href="{{ route('pform.delete',$pForm->id) }}"
                                                                    class="btn bg-danger action-btn" title="Delete"> <i
                                                                        class="fa fa-trash-o"></i> </a>
                                                            </td>
                                                            <td>{{$pForm->first_name}}</td>
                                                            <td>{{$pForm->mobile_number}}</td>
                                                            <td class="hide-th">31</td>
                                                            <td class="hide-th">Female</td>
                                                            <td class="hide-th">Not Available</td>
                                                            <td class="hide-th">Maharashtra </td>
                                                            <td class="hide-th">Raigad</td>
                                                            <td class="hide-th"></td>
                                                            <td class="hide-th"></td>
                                                            <td class="hide-th"></td>
                                                            <td>{{$pForm->provisinal_diagnosis}}</td>
                                                            <td>{{date('d-m-Y',strtotime($pForm->date_of_onset))}}</td>
                                                            <td>{{$pForm->opd_ipd}}</td>
                                                            <td>{{$pForm->test_suspected}}</td>
                                                            <td>{{$pForm->type_of_sample}}</td>
                                                            <td>{{date('d-m-Y',strtotime($pForm->sample_date))}}</td>
                                                            <td>{{$pForm->test_resquested}}</td>
                                                            <td >
            <div>
              <div class="card card-primary p-form-card">
                <div class="form-tab m-0 ">
                  <div class="bootstrap-tab">
                    <div class="tab-content" id="myTabContent">
                      <div class="note">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i> Enter Data Accurately and Completely
                      </div>
                      <form action="{{ url('/patient-Record') }}" method="post" class="myForm"> @csrf <div class="row bg-c-gray">
                          <div class="col-lg-12 col-md-12">
                            <div class="label-title">
                              <b>1. Patient Details:</b>
                            </div>
                          </div>
                          <div class="col-lg-4 col-md-4">
                            <label for="search-patient" class="label mb-0 mt-2">Contact Number:</label>
                            <div class="form-group d-flex">
                              <div class="w-140 mr-3">
                                <select name="" id="" class="form-control mt-0">
                                  <option value="India"> India +91 </option>
                                  <option value="India"> India +91 </option>
                                  <option value="India"> India +91 </option>
                                </select>
                              </div>
                              <div class="w-100">
                                <input type="text" name="fname" id="search-patient" class="form-control" placeholder="Enter Your Mobile Number">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-8 col-md-8">
                            <a href="{{ url('patient_records_form') }}" class="search-patient-btn bg-info text-light" id="search-patient-btn">Search Patient</a>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="first-name">First Name <span class="star">*</span>
                              </label>
                              <input type="text" name="first_name" id="first-name" class="form-control" placeholder="Enter Your First Name" maxlength="30" required>
                              <small id="first-name-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="middle-name">Middle Name</label>
                              <input type="text" name="middle_name" id="middle-name" class="form-control" placeholder="Enter Your Middle Name">
                              <small id=" " class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="last-name">Last Name <span class="star">*</span>
                              </label>
                              <input type="text" name="last_name" id="last-name" class="form-control" maxlength="30" required placeholder="Enter Your Last Name">
                              <small id="last-name-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <div class="lable-box-text">
                                <input type="radio" id="date-b" name="dob" value="date-b" checked>
                                <label for="date-b" class="mr-5">Date of Birth</label>
                                <input type="radio" id="age-b" name="dob" value="age-b">
                                <label for="age-b">Age</label>
                                <span class="star">*</span>
                              </div>
                              <input type="date" name="birth_date" id="dob" class="form-control" required>
                              <div class="date-box d-none" id="Age-inputs">
                                <input type="text" name="year" id="year" class="form-control mr-2" placeholder="Year" required>
                                <input type="text" name="Months" id="Months" class="form-control mr-2" placeholder="Months" required>
                                <input type="text" name="Days" id="Days" class="form-control" placeholder="Days" required>
                              </div>
                              <small id="dob-eror" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="gander">Gender <span class="star">*</span>
                              </label>
                              <select class="form-select" name="gender" aria-label="Default select example" id="gender" required>
                                <option value=""> Select Your Gender </option>
                                <option value="1"> Male </option>
                                <option value="2"> Famale </option>
                                <option value="3"> Other </option>
                              </select>
                              <small id="gander-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="id-type">Id Type <span class="star">*</span>
                              </label>
                              <select class="form-select" aria-label="Default select example" name="id_type" id="id-type" required>
                                <option value=""> Select Your id-type </option>
                                <option value="1"> Male </option>
                                <option value="2"> Famale </option>
                                <option value="3"> Other </option>
                              </select>
                              <small id="id-type-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="identification">Identification Number <span class="star">*</span>
                              </label>
                              <input type="text" class="form-control" name="identification_number" id="identification" aria-describedby="Identification" placeholder="Enter Your Identification Number" maxlength="12" required>
                              <small id="identification-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="citizenship">Citizenship</label>
                              <select class="form-select" aria-label="Default select example" name="citizenship" id="citizenship">
                                <option value=""> Select Your Citizenship </option>
                                <option value="1"> India </option>
                                <option value="2"> US</option>
                                <option value="3"> Japan </option>
                              </select>
                              <small id="citizenship-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-12 col-md-12">
                            <div class="label-title">
                              <b>Present Adderess:</b>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="state">State <span class="star">*</span>
                              </label>
                              <select class="form-select" aria-label="Default select example" name="state" id="state" required>
                                <option value=""> Select Your state </option>
                                <option value="1"> UP</option>
                                <option value="2"> MP</option>
                                <option value="3"> DL</option>
                              </select>
                              <small id="state-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="district">District <span class="star">*</span>
                              </label>
                              <select class="form-select" aria-label="Default select example" name="district" id="district" required>
                                <option value=""> Select Your district </option>
                                <option value="1"> UP</option>
                                <option value="2"> MP</option>
                                <option value="3"> DL</option>
                              </select>
                              <small id="district-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="taluka">Taluka <span class="star">*</span>
                              </label>
                              <select class="form-select" aria-label="Default select example" name="taluka" id="taluka" required>
                                <option value=""> Select Your taluka </option>
                                <option value="1"> UP</option>
                                <option value="2"> MP</option>
                                <option value="3"> DL</option>
                              </select>
                              <small id="taluka-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="village">Village <span class="star">*</span>
                              </label>
                              <select class="form-select" aria-label="Default select example" name="village" id="village" required>
                                <option value=""> Select Your village </option>
                                <option value="1"> UP</option>
                                <option value="2"> MP</option>
                                <option value="3"> DL</option>
                              </select>
                              <small id="village-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="house-no">House No</label>
                              <input type="text" class="form-control" name="house_no" id="house-no" aria-describedby="house-no" placeholder="Enter Your House No" maxlength="20">
                              <small id="house-no-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="street-name">Street Name</label>
                              <input type="text" class="form-control" name="street_name" id="street-name" aria-describedby="street-name" placeholder="Enter Your Street Name" maxlength="40">
                              <small id="street-name-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="landmark">Landmark </label>
                              <input type="text" class="form-control" name="landmark" id="landmark" aria-describedby="landmark" placeholder="Enter Your Landmark" maxlength="40">
                              <small id="landmark-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="pin-code">PIN Code</label>
                              <input type="text" class="form-control" name="Pincode" id="pin-code" aria-describedby=" " placeholder="Enter Your PIN Code" maxlength="6">
                              <small id="pin-code-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-12 col-md-12">
                            <div class="label-title"> Permanent address same as present address <input type="checkbox" name="permanent_address" value="1">
                            </div>
                          </div>
                        </div>
                        <div class="note">
                          <i class="fa fa-hand-o-right" aria-hidden="true"></i> Enter Data Accurately and Completely
                        </div>
                        <div class="row bg-c-gray">
                          <div class="col-lg-12 col-md-12">
                            <div class="label-title">
                              <b>2. Clinical Details:</b>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="provisinal-diagnosis">Provisinal Diagnosis <span class="star">*</span>
                              </label>
                              <select class="form-select" aria-label="Default select example" name="provisinal_diagnosis" id="provisinal-diagnosis" required>
                                <option value=""> Select Your Diagnosis </option>
                                <option value="1"> Others </option>
                                <option value="2"> Anthrax </option>
                              </select>
                              <small id="provisinal-diagnosis-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="date-of-onset">Date of Onset <span class="star">*</span>
                              </label>
                              <input type="date" name="date_of_onset" class="form-control" id="date-of-onset" aria-describedby="Date of Onset" placeholder="Enter Your Date of Onset" required>
                              <small id="date-of-onset-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="OPD-IPD">OPD/IPD <span class="star">*</span>
                              </label>
                              <select class="form-select" name="opd_ipd" aria-label="Default select example" name="OPD-IPD" id="OPD-IPD" required>
                                <option value=""> Select Your OPD-IPD </option>
                                <option value="1"> OPD</option>
                                <option value="2"> IPD</option>
                              </select>
                              <small id="opd-ipd-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                        </div>
                        <div class="note">
                          <i class="fa fa-hand-o-right" aria-hidden="true"></i> Enter Data Accurately and Completely
                        </div>
                        <div class="row bg-c-gray">
                          <div class="col-lg-12 col-md-12">
                            <div class="label-title">
                              <b>3. Laboratory Details:</b>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="provisinal-diagnosis">Test Suspected For <span class="star">*</span>
                              </label>
                              <select class="form-select" aria-label="Default select example" name="provisinal_diagnosis" id="provisinal-diagnosis" required>
                                <option value=""> Select Test Suspectes </option>
                                <option value="1"> Others </option>
                                <option value="2"> Anthrax </option>
                              </select>
                              <small id="provisinal-diagnosis-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="provisinal-diagnosis">Type of Sample <span class="star">*</span>
                              </label>
                              <select class="form-select" aria-label="Default select example" name="provisinal_diagnosis" id="provisinal-diagnosis" required>
                                <option value=""> Select Sample </option>
                                <option label="Aspirate" value="object:2171"> Aspirate </option>
                                <option label="Blood" value="object:2172"> Blood </option>
                                <option label="Serum" value="object:2173"> Serum </option>
                                <option label="Others" value="object:2174"> Others </option>
                              </select>
                              <small id="provisinal-diagnosis-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="OPD-IPD">Test Requested <span class="star">*</span>
                              </label>
                              <select class="form-select" name="opd_ipd" aria-label="Default select example" name="OPD-IPD" id="OPD-IPD" required>
                                <option value=""> Select Test </option>
                                <option label="Microscopy- Gram Stain" value="object:2167"> Microscopy- Gram Stain </option>
                                <option label="Gamma Phage Lysis" value="object:2168"> Gamma Phage Lysis </option>
                                <option label="Culture" value="object:2169"> Culture </option>
                                <option label="PCR -Toxin/Capsule/Direct clinical sample" value="object:2170"> PCR -Toxin/Capsule/Direct clinical sample </option>
                              </select>
                              <small id="opd-ipd-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <label for="OPD-IPD">Sample Collection Date (If Collected) <span class="star">*</span>
                              </label>
                              <input type="date" name="date_of_onset" class="form-control" id="date-of-onset" aria-describedby="Date of Onset" placeholder="Enter Your Date of Onset" required>
                              <small id="date-of-onset-error" class="form-text text-muted"></small>
                            </div>
                          </div>
                        </div>
                        <div class="button d-flex justify-content-center mt-3">
                          <button class="btn search-patient-btn mr-3 bg-primary text-light">save</button>
                          <button class="btn search-patient-btn bg-danger text-light">Reset</button>
                        </div>
                        <div class="button d-flex justify-content-center mt-3">
                          <button class="btn search-patient-btn mr-3 bg-primary text-light">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
                                                        </tr>
                                                       

                                            @endforeach
                                            @endif
                                            </tbody>
                                            </table>
                                        </div>

       
                                        </div>
                                    </div>

                                </div>

                                <div class="row bg-c-gray bg-white p-0 mt-3">

                                    <div class="col-lg-12 col-md-12">
                                        <div class="label-title"><b>7. List of Reported Deaths</b> </div>
                                    </div>

                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sl#</th>
                                                    <th>Person Name
                                                        <span>
                                                            <a class="btn-arrow3">
                                                                <span
                                                                    class="fa fa-long-arrow-right printhide arrow-r1"></span>
                                                                <span
                                                                    class="fa fa-long-arrow-left printhide arrow-l1 d-none"></span>
                                                            </a>
                                                        </span>
                                                    </th>
                                                    <th class="hide-th1">Age </th>
                                                    <th class="hide-th1">Gender</th>
                                                    <th class="hide-th1">ID Type/Id No</th>
                                                    <th class="hide-th1">State</th>
                                                    <th class="hide-th1">District</th>
                                                    <th class="hide-th1">Sub District</th>
                                                    <th class="hide-th1">Village</th>
                                                    <th class="hide-th1">Address</th>
                                                    <th>Probable Cause Of Death</th>
                                                    <th>Date of Death</th>
                                                    <th>Remark</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Manish</td>
                                                    <td class="hide-th1"></td>
                                                    <td class="hide-th1"></td>
                                                    <td class="hide-th1"></td>
                                                    <td class="hide-th1"></td>
                                                    <td class="hide-th1"></td>
                                                    <td class="hide-th1"></td>
                                                    <td class="hide-th1"></td>
                                                    <td class="hide-th1"></td>
                                                    <td>Dengue (A97)</td>
                                                    <td>27/02/2024</td>
                                                    <td></td>
                                                    <td class="text-nowrap">
                                                        <a href="javascript:void();" class="btn bg-danger action-btn"
                                                            title="Delete"> <i class="fa fa-trash-o"></i> </a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                                <div class="row bg-c-gray bg-white p-0 mt-3">

                                    <div class="col-md-12 accordian-pform">
                                        <div id="accordion">
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <a href="javascript:void();" class="btn btn-link collapsed"
                                                            data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="false" aria-controls="collapseOne">
                                                            8. Syndromes: (Click to View)
                                                        </a>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                    data-parent="#accordion">
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td rowspan="3"></td>
                                                                    <td colspan="6"><b>Number of cases</b></td>
                                                                    <td rowspan="3"><b>Grand Total</b></td>
                                                                    <td colspan="3" rowspan="2"><b
                                                                            class="text-danger">Number of cases of
                                                                            deaths <br></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><b>Male</b></td>
                                                                    <td colspan="3"><b>Female</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>&lt;= 5 Yr</b></td>
                                                                    <td><b>&gt; 5Yr</b></td>
                                                                    <td><b>Total</b></td>
                                                                    <td><b>&lt;=5 Yr</b></td>
                                                                    <td><b>&gt; 5Yr</b></td>
                                                                    <td><b>Total</b></td>
                                                                    <td><b>Male</b></td>
                                                                    <td><b>Female</b></td>
                                                                    <td><b>Total<br>Death</b></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Only Fever &gt;= 7 days</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>8</td>
                                                                    <td>8</td>
                                                                    <td>8</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <a href="javascript:void();" class="btn btn-link collapsed"
                                                            data-toggle="collapse" data-target="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            9. Diseases: (Click to View)
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                    data-parent="#accordion">
                                                    <div class="card-body">

                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td rowspan="3"></td>
                                                                    <td colspan="6"><b>Number of cases</b></td>
                                                                    <td rowspan="3"><b>Grand Total</b></td>
                                                                    <td colspan="3" rowspan="2"><b
                                                                            class="text-danger">Number of cases of
                                                                            deaths <br></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="3"><b>Male</b></td>
                                                                    <td colspan="3"><b>Female</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><b>&lt;= 5 Yr</b></td>
                                                                    <td><b>&gt; 5 Yr</b></td>
                                                                    <td><b>Total</b></td>
                                                                    <td><b>&lt;=5 Yr</b></td>
                                                                    <td><b>&gt; 5 Yr</b></td>
                                                                    <td><b>Total</b></td>
                                                                    <td><b>Male</b></td>
                                                                    <td><b>Female</b></td>
                                                                    <td><b>Total<br>Death</b></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Chickenpox (B01)</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>1</td>
                                                                    <td>1</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Dengue (A97)</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>1</td>
                                                                    <td></td>
                                                                    <td>1</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Malaria (B54)</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>2</td>
                                                                    <td>2</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Measles (B05)</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>1</td>
                                                                    <td>1</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="11"><b>OTHERS</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Others</td>
                                                                    <td></td>
                                                                    <td>1
                                                                    </td>
                                                                    <td>1</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>1</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                {{-- <div class="button d-flex justify-content-center mt-3">
                                            <button class="btn search-patient-btn mr-3 bg-primary text-light">Submit</button>
                                        </div> --}}
                            </div>
                            <div class="tab-pane fade" id="nav-add-death-record" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                nav add death record profile tab TAB 2 Lorem ipsum dolor sit amet.
                            </div>
                            <div class="tab-pane fade" id="nav-record-aggregate-data" role="tabpanel"
                                aria-labelledby="nav-contact-tab">nav-record-aggregate-data Lorem ipsum
                                dolor sit amet consectetur
                                adipisicing elit. Fugit, consequuntur. Laborum, placeat.
                            </div>
                            <div class="tab-pane fade" id="nav-submit-null-report" role="tabpanel"
                                aria-labelledby="nav-submit-tab">nav submit null report lorem ipsum dolor
                                sit amet consectetur
                                adipisicing elit. Fugit, consequuntur. Laborum, placeat.
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-8">
                        <a href="{{ url('patient_records_form') }}" class="search-patient-btn bg-info text-light" id="search-patient-btn">Search Patient</a>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="first-name">First Name <span class="star">*</span>
                          </label>
                          <input type="text" name="first_name" value="{{ old('first_name') }}" id="first-name" class="form-control" placeholder="Enter Your First Name" maxlength="30" required> @if ($errors->has('first_name')) <span class="form-text text-muted">{{ $errors->first('first_name') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="middle-name">Middle Name</label>
                          <input type="text" name="middle_name" value="{{ old('middle_name') }}" maxlength="30" id="middle-name" class="form-control" placeholder="Enter Your Middle Name"> @if ($errors->has('middle_name')) <span class="form-text text-muted">{{ $errors->first('middle_name') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="last-name">Last Name <span class="star">*</span>
                          </label>
                          <input type="text" name="last_name" value="{{ old('last_name') }}" id="last-name" class="form-control" maxlength="30" required placeholder="Enter Your Last Name"> @if ($errors->has('last_name')) <span class="form-text text-muted">{{ $errors->first('last_name') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="date-b" class="mr-5">Date of Birth <span class="star">*</span>
                          </label>
                          <input type="date" name="birth_of_date" value="{{ old('birth_of_date') }}" id="birth_of_date" class="form-control" required> @if ($errors->has('birth_of_date')) <span class="form-text text-muted">{{ $errors->first('birth_of_date') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="gander">Gender <span class="star">*</span>
                          </label>
                          <select class="form-select" name="gender" aria-label="Default select example" id="gender" required>
                            <option value=""> Select Your Gender</option> @if (old('gender')) <option value="{{ old('gender') }}" selected>
                              {{ old('gender') }}
                            </option> @endif <option value="Male"> Male</option>
                            <option value="Famale"> Famale</option>
                            <option value="Other"> Other</option>
                          </select> @if ($errors->has('gender')) <span class="form-text text-muted">{{ $errors->first('gender') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="id-type">Id Type <span class="star">*</span>
                          </label>
                          <select class="form-select" aria-label="Default select example" name="id_type" id="id-type" required>
                            <option value="">Select Your id-type</option> @if (old('id_type')) <option value="{{ old('id_type') }}" selected>
                              {{ old('id_type') }}
                            </option> @endif <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                          </select> @if ($errors->has('id_type')) <span class="form-text text-muted">{{ $errors->first('id_type') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="identification">Identification Number <span class="star">*</span>
                          </label>
                          <input type="text" class="form-control" name="identification_number" id="identification_number" value="{{ old('identification_number') }}" aria-describedby="Identification" placeholder="Enter Your Identification Number" maxlength="16" required> @if ($errors->has('identification_number')) <span class="form-text text-muted">{{ $errors->first('identification_number') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="citizenship">Citizenship</label>
                          <select class="form-select" aria-label="Default select example" name="citizenship" id="citizenship">
                            <option value=""> Select Your Citizenship </option> @foreach ($countryes as $key => $country) <option value="{{ $country->id }}" {{ $country->id == old('country_code') ? 'selected' : '' }}>
                              {{ $country->name }}
                            </option> @endforeach
                          </select>
                          <small id="citizenship-error" class="form-text text-muted"></small>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="label-title">
                          <b>Present Adderess:</b>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="state">State <span class="star">*</span>
                          </label>
                          <select class="form-select" aria-label="Default select example" name="pform_state" id="pform_state" required>
                            <option value=""> Select Your state</option> @foreach ($states as $key => $state) <option value="{{ $state->id }}" {{ $state->id == old('state') ? 'selected' : '' }}>
                              {{ $state->name }}
                            </option> @endforeach
                          </select> @if ($errors->has('pform_state')) <span class="form-text text-muted">{{ $errors->first('pform_state') }}</span> @endif <small id="state-error" class="form-text text-muted"></small>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="district">District <span class="star">*</span>
                          </label>
                          <select class="form-select" aria-label="Default select example" name="pform_city" id="pform_city" required>
                            <option value=""> Select Your district </option>
                          </select> @if ($errors->has('pform_city')) <span class="form-text text-muted">{{ $errors->first('pform_city') }}</span> @endif <small id="district-error" class="form-text text-muted"></small>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="taluka">Taluka <span class="star">*</span>
                          </label>
                          <select class="form-select" aria-label="Default select example" name="taluka" id="taluka" required>
                            <option value=""> Select Your taluka</option> @if (old('taluka')) <option value="{{ old('taluka') }}" selected>
                              {{ old('taluka') }}
                            </option> @endif <option value="1"> Taluka one</option>
                            <option value="2"> Taluka two</option>
                            <option value="3"> Taluka three</option>
                          </select> @if ($errors->has('taluka')) <span class="form-text text-muted">{{ $errors->first('taluka') }}</span> @endif <small id="taluka-error" class="form-text text-muted"></small>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="village">Village <span class="star">*</span>
                          </label>
                          <input type="text" class="form-control" name="village" id="village" value="{{ old('village') }}" aria-describedby="Identification" placeholder="Enter Your Identification Number" maxlength="16" required> @if ($errors->has('village')) <span class="form-text text-muted">{{ $errors->first('village') }}</span> @endif <small id="village-error" class="form-text text-muted"></small>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="house-no">House No</label>
                          <input type="text" class="form-control" name="house_no" id="house_no" value="{{ old('house_no') }}" aria-describedby="house_no" placeholder="Enter Your House No" maxlength="20"> @if ($errors->has('house_no')) <span class="form-text text-muted">{{ $errors->first('house_no') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="street-name">Street Name</label>
                          <input type="text" class="form-control" name="street_name" id="street-name" value="{{ old('street_name') }}" aria-describedby="street-name" placeholder="Enter Your Street Name" maxlength="40">
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="landmark">Landmark </label>
                          <input type="text" class="form-control" name="landmark" id="landmark" aria-describedby="landmark" placeholder="Enter Your Landmark" value="{{ old('landmark') }}" maxlength="40">
                          <small id="landmark-error" class="form-text text-muted"></small>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="pin-code">PIN Code</label>
                          <input type="text" class="form-control" name="pincode" id="pincode" value="{{ old('pincode') }}" oninput="validateInput(this)" placeholder="Enter Your PIN Code" maxlength="8">
                        </div>
                      </div>
                    </div>
                    <div class="note">
                      <i class="fa fa-hand-o-right" aria-hidden="true"></i> Enter Data Accurately and Completely
                    </div>
                    <div class="row bg-c-gray">
                      <div class="col-lg-12 col-md-12">
                        <div class="label-title">
                          <b>2. Clinical Details:</b>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="provisinal-diagnosis">Provisinal Diagnosis <span class="star">*</span>
                          </label>
                          <select class="form-select" aria-label="Default select example" name="provisinal_diagnosis" id="provisinal_diagnosis" required>
                            <option value=""> Select Your Diagnosis</option> @if (old('provisinal_diagnosis')) <option value="{{ old('provisinal_diagnosis') }}" selected>
                              {{ old('provisinal_diagnosis') }}
                            </option> @endif <option value="Anthrax">Anthrax</option>
                            <option value="Others">Others</option>
                          </select> @if ($errors->has('provisinal_diagnosis')) <span class="form-text text-muted">{{ $errors->first('provisinal_diagnosis') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="date-of-onset">Date of Onset <span class="star">*</span>
                          </label>
                          <input type="date" name="date_of_onset" class="form-control" id="date_of_onset" aria-describedby="Date of Onset" placeholder="Enter Your Date of Onset" required> @if ($errors->has('date_of_onset')) <span class="form-text text-muted">{{ $errors->first('date_of_onset') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="OPD-IPD">OPD/IPD <span class="star">*</span>
                          </label>
                          <select class="form-select" name="opd_ipd" aria-label="Default select example" id="opd_ipd" required>
                            <option value=""> Select Your OPD-IPD </option> @if (old('opd_ipd')) <option value="{{ old('opd_ipd') }}" selected>
                              {{ old('opd_ipd') }}
                            </option> @endif <option value="OPD">OPD</option>
                            <option value="IPD">IPD</option>
                          </select> @if ($errors->has('opd_ipd')) <span class="form-text text-muted">{{ $errors->first('opd_ipd') }}</span> @endif
                        </div>
                      </div>
                    </div>
                    <div class="note">
                      <i class="fa fa-hand-o-right" aria-hidden="true"></i> Enter Data Accurately and Completely
                    </div>
                    <div class="row bg-c-gray">
                      <div class="col-lg-12 col-md-12">
                        <div class="label-title">
                          <b>3. Laboratory Details:</b>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="provisinal-diagnosis">Test Suspected For <span class="star">*</span>
                          </label>
                          <select class="form-select" aria-label="Default select example" name="test_suspected" id="test_suspected" required>
                            <option value=""> Select Test Suspectes</option> @if (old('test_suspected')) <option value="{{ old('test_suspected') }}" selected>
                              {{ old('test_suspected') }}
                            </option> @endif <option value="Anthrax">Anthrax</option>
                            <option value="Others">Others</option>
                          </select> @if ($errors->has('test_suspected')) <span class="form-text text-muted">{{ $errors->first('test_suspected') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="provisinal-diagnosis">Type of Sample <span class="star">*</span>
                          </label>
                          <select class="form-select" aria-label="Default select example" name="type_of_sample" id="type_of_sample" required>
                            <option value=""> Select Sample</option> @if (old('type_of_sample')) <option value="{{ old('type_of_sample') }}" selected>
                              {{ old('type_of_sample') }}
                            </option> @endif <option label="Aspirate" value="Aspirate">Aspirate</option>
                            <option label="Blood" value="Blood">Blood</option>
                            <option label="Serum" value="Serum">Serum</option>
                            <option label="Others" value="Others">Others</option>
                          </select> @if ($errors->has('type_of_sample')) <span class="form-text text-muted">{{ $errors->first('type_of_sample') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="OPD-IPD">Test Requested <span class="star">*</span>
                          </label>
                          <select class="form-select" name="test_resquested" aria-label="Default select example" id="test_resquested">
                            <option value=""> Select Test</option> @if (old('test_resquested')) <option value="{{ old('test_resquested') }}" selected>
                              {{ old('test_resquested') }}
                            </option> @endif <option label="Microscopy- Gram Stain" value="Microscopy- Gram Stain"> Microscopy- Gram Stain</option>
                            <option label="Gamma Phage Lysis" value="Gamma Phage Lysis"> Gamma Phage Lysis</option>
                            <option label="Culture" value="Culture">Culture</option>
                            <option label="PCR -Toxin/Capsule/Direct clinical sample" value="PCR -Toxin/Capsule/Direct clinical sample">PCR -Toxin/Capsule/Direct clinical sample</option>
                          </select> @if ($errors->has('test_resquested')) <span class="form-text text-muted">{{ $errors->first('test_resquested') }}</span> @endif
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <label for="OPD-IPD">Sample Collection Date (If Collected) <span class="star">*</span>
                          </label>
                          <input type="date" name="sample_date" value="{{ old('sample_date') }}" class="form-control" id="sample_date" aria-describedby="Date of Sample Collection" required> @if ($errors->has('sample_date')) <span class="form-text text-muted">{{ $errors->first('sample_date') }}</span> @endif
                        </div>
                      </div>
                    </div>
                    <div class="button d-flex justify-content-center mt-3">
                      <button type="submit" class="btn search-patient-btn mr-3 bg-primary text-light">save</button>
                      <button class="btn search-patient-btn bg-danger text-light">Reset</button>
                    </div>
                  </form>
                  <div class="row bg-c-gray bg-white p-0 mt-3">
                    <div class="col-lg-12 col-md-12">
                      <div class="label-title">
                        <b>6. Line Listing Of Patient</b>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="table-responsive" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                        <table id="general_profiles_TABLE" class="display ">
                          <thead>
                            <tr>
                              <th>Sl#</th>
                              <th>Action</th>
                              <th>Person Name <span>
                                  <a class="btn-arrow">
                                    <span class="fa fa-long-arrow-right printhide arrow-r"></span>
                                    <span class="fa fa-long-arrow-left printhide arrow-l d-none"></span>
                                  </a>
                                </span>
                              </th>
                              <th>Contact Number</th>
                              <th class="hide-th">Age </th>
                              <th class="hide-th">Gender</th>
                              <th class="hide-th">ID Type/Id No</th>
                              <th class="hide-th">State</th>
                              <th class="hide-th">District</th>
                              <th class="hide-th">Sub District</th>
                              <th class="hide-th">Village</th>
                              <th class="hide-th">Address</th>
                              <th>Provisional Diagnosis</th>
                              <th>Date of Onset</th>
                              <th>OPD/IPD</th>
                              <th>Test Suspected</th>
                              <th>Type of Sample</th>
                              <th>Date of Sample Collection</th>
                              <th>Test Requested</th>
                            </tr>
                          </thead>
                          <tbody> 
                            @if ($pForms) 
                            @foreach ($pForms as $pForm) 
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td class="text-nowrap ">
                                <a href="javascript:void();" id="edit_{{ $loop->iteration }}" class="btn bg-success action-btn pformEdit" data-id="{{ $loop->iteration }}" title="Edit">
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('pform.delete', $pForm->id) }}" class="btn bg-danger action-btn" title="Delete">
                                  <i class="fa fa-trash-o"></i>
                                </a>
                              </td>
                              <td>{{ $pForm->first_name }}</td>
                              <td>{{ $pForm->mobile_number }}</td>
                              <td class="hide-th">31</td>
                              <td class="hide-th">Female</td>
                              <td class="hide-th">Not Available</td>
                              <td class="hide-th">Maharashtra </td>
                              <td class="hide-th">Raigad</td>
                              <td class="hide-th"></td>
                              <td class="hide-th"></td>
                              <td class="hide-th"></td>
                              <td>{{ $pForm->provisinal_diagnosis }}</td>
                              <td>{{ date('d-m-Y', strtotime($pForm->date_of_onset)) }}
                              </td>
                              <td>{{ $pForm->opd_ipd }}</td>
                              <td>{{ $pForm->test_suspected }}</td>
                              <td>{{ $pForm->type_of_sample }}</td>
                              <td>{{ date('d-m-Y', strtotime($pForm->sample_date)) }}
                              </td>
                              <td>{{ $pForm->test_resquested }}</td>
                            </tr> 
                        @endforeach 
                        @endif 
                    </tbody>
                    </table>
                      </div>
                    </div>
                  </div>
                  <div class="row bg-c-gray bg-white p-0 mt-3">
                    <div class="col-lg-12 col-md-12">
                      <div class="label-title">
                        <b>7. List of Reported Deaths</b>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Sl#</th>
                            <th>Person Name <span>
                                <a class="btn-arrow3">
                                  <span class="fa fa-long-arrow-right printhide arrow-r1"></span>
                                  <span class="fa fa-long-arrow-left printhide arrow-l1 d-none"></span>
                                </a>
                              </span>
                            </th>
                            <th class="hide-th1">Age </th>
                            <th class="hide-th1">Gender</th>
                            <th class="hide-th1">ID Type/Id No</th>
                            <th class="hide-th1">State</th>
                            <th class="hide-th1">District</th>
                            <th class="hide-th1">Sub District</th>
                            <th class="hide-th1">Village</th>
                            <th class="hide-th1">Address</th>
                            <th>Probable Cause Of Death</th>
                            <th>Date of Death</th>
                            <th>Remark</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Manish</td>
                            <td class="hide-th1"></td>
                            <td class="hide-th1"></td>
                            <td class="hide-th1"></td>
                            <td class="hide-th1"></td>
                            <td class="hide-th1"></td>
                            <td class="hide-th1"></td>
                            <td class="hide-th1"></td>
                            <td class="hide-th1"></td>
                            <td>Dengue (A97)</td>
                            <td>27/02/2024</td>
                            <td></td>
                            <td class="text-nowrap">
                              <a href="javascript:void();" class="btn bg-danger action-btn" title="Delete">
                                <i class="fa fa-trash-o"></i>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row bg-c-gray bg-white p-0 mt-3">
                    <div class="col-md-12 accordian-pform">
                      <div id="accordion">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                              <a href="javascript:void();" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> 8. Syndromes: (Click to View) </a>
                            </h5>
                          </div>
                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <td rowspan="3"></td>
                                    <td colspan="6">
                                      <b>Number of cases</b>
                                    </td>
                                    <td rowspan="3">
                                      <b>Grand Total</b>
                                    </td>
                                    <td colspan="3" rowspan="2">
                                      <b class="text-danger">Number of cases of deaths <br>
                                      </b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3">
                                      <b>Male</b>
                                    </td>
                                    <td colspan="3">
                                      <b>Female</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <b>&lt;= 5 Yr</b>
                                    </td>
                                    <td>
                                      <b>&gt; 5Yr</b>
                                    </td>
                                    <td>
                                      <b>Total</b>
                                    </td>
                                    <td>
                                      <b>&lt;=5 Yr</b>
                                    </td>
                                    <td>
                                      <b>&gt; 5Yr</b>
                                    </td>
                                    <td>
                                      <b>Total</b>
                                    </td>
                                    <td>
                                      <b>Male</b>
                                    </td>
                                    <td>
                                      <b>Female</b>
                                    </td>
                                    <td>
                                      <b>Total <br>Death </b>
                                    </td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Only Fever &gt;= 7 days</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>8</td>
                                    <td>8</td>
                                    <td>8</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                              <a href="javascript:void();" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 9. Diseases: (Click to View) </a>
                            </h5>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <td rowspan="3"></td>
                                    <td colspan="6">
                                      <b>Number of cases</b>
                                    </td>
                                    <td rowspan="3">
                                      <b>Grand Total</b>
                                    </td>
                                    <td colspan="3" rowspan="2">
                                      <b class="text-danger">Number of cases of deaths <br>
                                      </b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td colspan="3">
                                      <b>Male</b>
                                    </td>
                                    <td colspan="3">
                                      <b>Female</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <b>&lt;= 5 Yr</b>
                                    </td>
                                    <td>
                                      <b>&gt; 5 Yr</b>
                                    </td>
                                    <td>
                                      <b>Total</b>
                                    </td>
                                    <td>
                                      <b>&lt;=5 Yr</b>
                                    </td>
                                    <td>
                                      <b>&gt; 5 Yr</b>
                                    </td>
                                    <td>
                                      <b>Total</b>
                                    </td>
                                    <td>
                                      <b>Male</b>
                                    </td>
                                    <td>
                                      <b>Female</b>
                                    </td>
                                    <td>
                                      <b>Total <br>Death </b>
                                    </td>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>Chickenpox (B01)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>Dengue (A97)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                  </tr>
                                  <tr>
                                    <td>Malaria (B54)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td>Measles (B05)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                  <tr>
                                    <td colspan="11">
                                      <b>OTHERS</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>Others</td>
                                    <td></td>
                                    <td>1 </td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- <div class="button d-flex justify-content-center mt-3">
																											<button class="btn search-patient-btn mr-3 bg-primary text-light">Submit</button>
																										</div> --}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
    </div>
    <!-- /.row -->
    <!-- /.row -->
  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

 
@endsection
