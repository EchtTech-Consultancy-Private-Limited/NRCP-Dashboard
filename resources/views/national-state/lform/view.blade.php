@extends('layouts.main')
@section('title') {{ 'NRCP State Dashboard | Line Suspected' }}
@endsection
@section('content')
<div class="container-fluid dashboard">
    <div class="ncdc-container form-tab">
        <div class="dashboard-filter lform_create">
                <div class="header lform-create-header d-flex align-items-center justify-content-between">
                    <div>
                        <img src="{{ asset('state-assets/images/undp.png') }}" />
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('state-assets/images/emblem.jpg') }}" />
                        <p>
                            <strong>National Centre for Disease Control
                                <br> Ministry of Health and Family Welfare <br>Government of India
                            </strong>
                        </p>
                        <div class="content">

                            <p>Laboratory Confirmed Human Rabies Case*</p>
                            <P class="fw-bold">State: State Name (Data base)</P>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('state-assets/images/nrcpLogo.png') }}" />
                    </div>
                </div>
                <div class="signature" >
                    <div class="row">
                        <div class="col-md-12">
                            <p class="float-right">
                                <strong>Date:</strong>
                                <input readonly type="date" name="current_date" value="{{ old('current_date',$stateUserLForm->current_date) }}">
                            </p>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Name of Nodal Person:
                                    <input readonly type="text" name="name_nodal_person" value="{{ old('name_nodal_person',$stateUserLForm->name_nodal_person) }}">
                                    @if ($errors->has('name_nodal_person'))
                                    <span class="form-text text-muted">{{ $errors->first('name_nodal_person') }}</span>
                                    @endif
                                </p>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Designation of Nodal Person :
                                    <input readonly type="text" name="designation_nodal_person" value="{{ old('designation_nodal_person',$stateUserLForm->designation_nodal_person) }}">
                                    @if ($errors->has('designation_nodal_person'))
                                    <span class="form-text text-muted">{{ $errors->first('designation_nodal_person') }}</span>
                                    @endif
                                </p>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Contact Number:
                                    <input readonly type="text" name="phone_number" value="{{ old('phone_number',$stateUserLForm->phone_number) }}" maxlength="10" oninput="validateInput(this)">
                                    @if ($errors->has('phone_number'))
                                    <span class="form-text text-muted">{{ $errors->first('phone_number') }}</span>
                                    @endif

                                </p>
                              
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Email ID: <br>
                                    <input readonly type="email" name="email" value="{{ old('email',$stateUserLForm->email) }}">
                                    @if ($errors->has('email'))
                                    <span class="form-text text-muted">{{ $errors->first('email') }}</span>
                                    @endif

                                </p>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p >
                                    Aadhar Number: <br>
                                    <input readonly type="text" name="aadhar_number" value="{{ old('aadhar_number',$stateUserLForm->aadhar_number) }}" maxlength="12" oninput="validateInput(this)">
                                    @if ($errors->has('aadhar_number')) 
                                        <span class="form-text text-muted">{{ $errors->first('aadhar_number') }}</span> 
                                    @endif
                                </p>
                              
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                Institute Name: <br>
                                    <input readonly type="text" name="institute_name" value="{{ old('institute_name',$stateUserLForm->institute_name) }}">
                                    @if ($errors->has('institute_name'))
                                    <span class="form-text text-muted">{{ $errors->first('institute_name') }}</span>
                                    @endif
                                </p>
                              
                            </div>
                        </div>
                    </div>

                </div>
                <div>

                    <table class="table-responsive" id="suspected_field">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="border-left-0">
                                    <p>
                                        <strong>S.No</strong>
                                    </p>
                                </td>
                                <td colspan="3">
                                    <p class="text-center justify-content-center" >
                                        <strong>Name</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Age</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Sex</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Contact Number</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>State</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>District</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Sub District/ Taluk/Block/ Mandal</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Village</strong>
                                    </p>
                                </td>
                               
                                <td rowspan="2">
                                    <p>
                                        <strong>Biting Animal</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Specimen Type (antemortem/ Postmortem)</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Specimen Detail (Serum/CSF/ Nuchal skin/ Skin)</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Date of Sample Collection </strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Name of Test performed</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Result</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Date of Result Declaration</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Remarks</strong>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                        <strong>First Name</strong>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <strong>Middle Name</strong>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <strong>Last Name</strong>
                                    </p>
                                </td>
                               
                            </tr>
                            @foreach($stateUserLForm->stateUserLFormCountCase as $index => $statelFormCase)
                            <tr id="row{{ $index + 1 }}">
                                <td>
                                    {{ $index + 1 }}
                                    <input readonly type="hidden" name="row_count[]">
                                    <input readonly type="hidden" name="l_form_count_id[]" value="{{ $statelFormCase->id }}">
                                </td>
                                <td>
                                    <input readonly type="text" name="fname[]" value="{{ @$statelFormCase->fname }}">
                                </td>
                                <td>
                                    <input readonly type="text" name="mname[]" value="{{ @$statelFormCase->mname }}">
                                </td>
                                <td>
                                    <input readonly type="text" name="lname[]" value="{{ @$statelFormCase->lname }}">
                                </td>
                               
                                <td>
                                    <input readonly type="text" name="age[]" value="{{ @$statelFormCase->age }}">
                                </td>
                                <td>
                                    <input readonly type="text" name="sex[]" value="{{ @$statelFormCase->sex }}">
                                </td>
                                <td>
                                    <input readonly type="text" name="contact_number[]"
                                        value="{{ @$statelFormCase->contact_number }}" maxlength="10" oninput="validateInput(this)">
                                </td>
                                <td>
                                    {{$statelFormCase->states->name}}
                                </td>
                                <td>
                                    {{$statelFormCase->city->name}}
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select" name="lform_subdistrict[]" id="lform_subdistrict">
                                        <option value="">Please Select</option>
                                        <option value="Sub District" @if($statelFormCase->lform_subdistrict == 'Sub District') selected @endif>Sub District</option>
                                        <option value="Taluk" @if($statelFormCase->lform_subdistrict == 'Taluk') selected @endif>Taluk</option>
                                        <option value="Block" @if($statelFormCase->lform_subdistrict == 'Block') selected @endif>Block</option>
                                        <option value="Mandal" @if($statelFormCase->lform_subdistrict == 'Mandal') selected @endif>Mandal</option>
                                    </select>
                                </td>
                                <td>
                                    <input readonly type="text" name="lform_village[]"
                                        value="{{ @$statelFormCase->lform_village }}">
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select" name="lform_biting_animal[]" id="lform_biting_animal">
                                        <option value="">Please Select</option>
                                        <option value="Suspected" @if($statelFormCase->lform_biting_animal == 'Suspected') selected @endif>Dog</option>
                                        <option value="Confirmed" @if($statelFormCase->lform_biting_animal == 'Confirmed') selected @endif>Other(input)</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select" name="lform_speciman_type[]" id="lform_speciman_type">
                                        <option value="">Please Select</option>
                                        <option value="Antemortem" @if($statelFormCase->lform_speciman_type == 'Antemortem') selected @endif>Antemortem</option>
                                        <option value="Postmortem" @if($statelFormCase->lform_speciman_type == 'Postmortem') selected @endif>Postmortem</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select" name="lform_speciman_detail[]" id="lform_speciman_detail">
                                        <option value="">Please Select</option>
                                        <option value="Serum" @if($statelFormCase->lform_speciman_detail == 'Serum') selected @endif>Serum</option>
                                        <option value="CSF" @if($statelFormCase->lform_speciman_detail == 'CSF') selected @endif>CSF</option>
                                        <option value="Nuchal skin" @if($statelFormCase->lform_speciman_detail == 'Nuchal skin') selected @endif>Nuchal skin</option>
                                        <option value="Skin" @if($statelFormCase->lform_speciman_detail == 'Skin') selected @endif>Skin</option>
                                    </select>
                                </td>                                                                
                               <td>
                                <input readonly type="date" name="lform_sample_collection_date[]" value="{{ @$statelFormCase->lform_sample_collection_date }}" id="lform_sample_collection_date">
                               </td>
                               <td>
                                    <select class="form-select" aria-label="Default select" name="number_of_test_performed[]" id="lform_speciman_type">
                                        <option value="">Please Select</option>
                                        <option value="RFFIT (CSF,Serum)" @if($statelFormCase->number_of_test_performed == 'RFFIT (CSF,Serum)') selected @endif>RFFIT (CSF,Serum)</option>
                                        <option value="Real-time PCR (CSF,Saliva, Nuchal skin)" @if($statelFormCase->number_of_test_performed == 'Real-time PCR (CSF,Saliva, Nuchal skin)') selected @endif>Real-time PCR (CSF,Saliva, Nuchal skin)</option>
                                        <option value="Rabies Immunohistochemistry" @if($statelFormCase->number_of_test_performed == 'Rabies Immunohistochemistry') selected @endif>Rabies Immunohistochemistry</option>
                                        <option value="Other(insert)" @if($statelFormCase->number_of_test_performed == 'Other(insert)') selected @endif>Other(insert)</option>
                                    </select>
                                </td>
                                <td>
                                    <input readonly type="text" name="lform_result[]" value="{{ @$statelFormCase->lform_result }}" id="lform_result">
                                </td>
                                <td>
                                    <input readonly type="date" name="lform_result_declaration_date[]" value="{{ @$statelFormCase->lform_result_declaration_date }}" id="lform_result_declaration_date">
                                </td>
                                <td>
                                    <input readonly type="text" name="lform_remark[]" value="{{ @$statelFormCase->lform_remark }}" id="lform_remark">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>To be <strong>
                            reported by Health facilities to District Nodal Officer, State Nodal Officer &amp; National
                            Program Division (Delhi) at
                            <a href="mailto:nrcp.ncdc@gmail.com">nrcp.ncdc@gmail.com</a> every month before 5th day
                        </strong>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection