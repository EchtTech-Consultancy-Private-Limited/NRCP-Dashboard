@extends('layouts.main')
@section('title') {{ 'NRCP State Dashboard | Line Suspected' }}
@endsection
@section('content')
<div class="container-fluid dashboard">
    <div class="ncdc-container form-tab">
        <div class="dashboard-filter lform_create">
            <form action="{{ route('state.line-suspected-store') }}" method="post" id="line-suspected-store">
                @csrf
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
                               <span class="date"> 17-05-2024</span>
                            </p>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Name of Nodal Person:
                                    <input type="text" name="name_of_health" value="{{ old('name_of_health') }}">
                                    @if ($errors->has('name_of_health'))
                                    <span class="form-text text-muted">{{ $errors->first('name_of_health') }}</span>
                                    @endif
                                </p>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Designation of Nodal Person :
                                    <input type="text" name="address_hospital" value="{{ old('address_hospital') }}">
                                    @if ($errors->has('address_hospital'))
                                    <span class="form-text text-muted">{{ $errors->first('address_hospital') }}</span>
                                    @endif
                                </p>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>

                                    Contact Number:

                                    <input type="text" name="contact_number" value="">
                                    <span class="form-text text-muted"></span>

                                </p>
                              
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Email ID: <br>
                                    <input type="email" name="email" value="{{ old('email') }}">

                                    <span class="form-text text-muted"></span>

                                </p>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                Institute Name: <br>
                                    <input type="text" name="Institute Name" value="">
                                    <span class="form-text text-muted"></span>
                                </p>
                                <p>
                              
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
                                <td rowspan="2">
                                    <p>
                                        <strong>Action</strong>
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
                            @foreach(old('name', ['']) as $index => $oldValue)
                            <tr id="row{{ $index + 1 }}">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <input type="text" name="fname[]" value="{{ $oldValue }}">
                                </td>
                                <td>
                                    <input type="text" name="mname[]" value="{{ $oldValue }}">
                                </td>
                                <td>
                                    <input type="text" name="lname[]" value="{{ $oldValue }}">
                                </td>
                               
                                <td>
                                    <input type="text" name="age[]" value="{{ old('age')[$index] ?? '' ?? '' }}">
                                </td>
                                <td>
                                    <input type="text" name="sex[]" value="{{ old('sex')[$index] ?? '' ?? '' }}">
                                </td>
                                <td>
                                    <input type="text" name="contact_number[]"
                                        value="{{ old('contact_number')[$index] ?? '' }}">
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select "
                                        name="lform_state[]" id="lform_state">
                                        <option value="">Please Select</option>
                                        <option value="Suspected" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>up</option>
                                        <option value="Probable" @if(old('suspected_probable')[$index] ?? ''=='Probable'
                                            ) selected @endif>Probable</option>
                                        <option value="Confirmed" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>mp</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select "
                                        name="lform_district[]" id="lform_district">
                                        <option value="">Please Select</option>
                                        <option value="district name" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>district name</option>
                                      
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select "
                                        name="lform_subdistrict[]" id="lform_subdistrict">
                                        <option value="">Please Select</option>
                                        <option value="Sub District" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>Sub District</option>
                                        <option value="Taluk" @if(old('suspected_probable')[$index] ?? ''=='Probable'
                                            ) selected @endif>Taluk</option>
                                        <option value="Block" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Block</option>
                                        <option value="Block" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Mandal</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="lform_village[]"
                                        value="{{ old('bit_incidence_village')[$index] ?? '' }}">
                                </td>
                                <td>
                                <select class="form-select" aria-label="Default select "
                                        name="lform_biting_animal[]" id="lform_biting_animal">
                                        <option value="">Please Select</option>
                                        <option value="Suspected" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>Dog</option>
                                     
                                        <option value="Confirmed" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Other(input)</option>
                                    </select>
                                </td>
                                <td>
                                <select class="form-select" aria-label="Default select "
                                        name="lform_speciman_type[]" id="lform_speciman_detail">
                                        <option value="">Please Select</option>
                                        <option value="Antemortem" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>Antemortem</option>
                                        <option value="Postmortem" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Postmortem</option>
                                       
                                    </select>
                                </td>
                                <td>
                                <select class="form-select" aria-label="Default select "
                                        name="lform_speciman_detail[]" id="lform_speciman_type">
                                        <option value="">Please Select</option>
                                        <option value="Antemortem" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>Serum</option>
                                        <option value="Postmortem" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>CSF</option>
                                        <option value="Postmortem" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Nuchal skin</option>
                                        <option value="Postmortem" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Skin</option>
                                    </select>
                                </td>
                               <td>
                                <input type="date" name="lform_sample_collection_date" value="" id="lform_sample_collection_date">
                               </td>
                                <td>
                                <select class="form-select" aria-label="Default select "
                                        name="lform_speciman_type[]" id="lform_speciman_type">
                                        <option value="">Please Select</option>
                                        <option value="RFFIT (CSF,Serum)">  RFFIT (CSF,Serum)</option>
                                        <option value="Real-time PCR (CSF,Saliva, Nuchal skin)">Real-time PCR (CSF,Saliva, Nuchal skin) </option>
                                        <option value="Rabies Immunohistochemistry"> Rabies Immunohistochemistry</option>
                                        <option value="Other(insert)"> Other(insert)</option>
                                    </select>
                                    
                                </td>
                               
                                <td>
                                  <input type="text" name="lform_result" value="" id="lform_result">
                               </td>
                                <td>
                                  <input type="text" name="lform_result_declaration_date" value="" id="lform_result_declaration_date">
                               </td>
                                <td>
                                  <input type="text" name="lform_remark" value="" id="lform_remark">
                               </td>
                               <td class="text-nowrap">
                                    <button type="button" name="add" id="add" class="btn btn-success add_more"><i class="fa fa-plus" style="font-size:16px"></i></button>
                                    </button><button type="button" name="remove" id="{{ $index + 1 }}" class="btn btn-danger btn_remove"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center my-4">
                        <button type="submit" class="btn search-patient-btn mr-3 bg-primary text-light">save</button>
                        <button type="reset" class="btn search-patient-btn bg-danger text-light">Reset</button>
                    </div>
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
    <script>
    $(document).ready(function() {
        var i = 1;
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr('id');
            $('#row' + button_id + '').remove();
        });

        // Handle cloned add buttons
        $(document).on('click', '.add_more', function() {
            i++;

            var rowHtml =
                '<tr id="row' +
                i +
                '"><td>' +
                i +
                '<td><input type="text" name="fname[]" value="{{ $oldValue}}"></td><td><input type="text" name="mname[]" value="{{ $oldValue}}"></td><td><input type="text" name="lname[]" value="{{ $oldValue}}"></td><td><input type="text" name="age[]" value="{{ old('age')[$index] ?? '' ?? ''}}"></td><td><input type="text" name="sex[]" value="{{ old('sex')[$index] ?? '' ?? ''}}"></td><td><input type="text" name="contact_number[]" value="{{ old('contact_number')[$index] ?? ''}}"></td><td><select class="form-select" aria-label="Default select " name="lform_state[]" id="lform_state"><option value="">Please Select</option><option value="Suspected" @if(old('suspected_probable')[$index] ?? ''=='Suspected' ) selected @endif>up</option><option value="Probable" @if(old('suspected_probable')[$index] ?? ''=='Probable' ) selected @endif>Probable</option><option value="Confirmed" @if(old('suspected_probable')[$index] ?? ''=='Confirmed' ) selected @endif>mp</option></select></td><td><select class="form-select" aria-label="Default select " name="lform_district[]" id="lform_district"><option value="">Please Select</option><option value="district name" @if(old('suspected_probable')[$index] ?? ''=='Suspected' ) selected @endif>district name</option></select></td><td><select class="form-select" aria-label="Default select " name="lform_subdistrict[]" id="lform_subdistrict"><option value="">Please Select</option><option value="Sub District" @if(old('suspected_probable')[$index] ?? ''=='Suspected' ) selected @endif>Sub District</option><option value="Taluk" @if(old('suspected_probable')[$index] ?? ''=='Probable' ) selected @endif>Taluk</option><option value="Block" @if(old('suspected_probable')[$index] ?? ''=='Confirmed' ) selected @endif>Block</option><option value="Block" @if(old('suspected_probable')[$index] ?? ''=='Confirmed' ) selected @endif>Mandal</option></select></td><td><input type="text" name="lform_village[]" value="{{ old('bit_incidence_village')[$index] ?? ''}}"></td><td><select class="form-select" aria-label="Default select " name="lform_biting_animal[]" id="lform_biting_animal"><option value="">Please Select</option><option value="Suspected" @if(old('suspected_probable')[$index] ?? ''=='Suspected' ) selected @endif>Dog</option><option value="Confirmed" @if(old('suspected_probable')[$index] ?? ''=='Confirmed' ) selected @endif>Other(input)</option></select></td><td><select class="form-select" aria-label="Default select " name="lform_speciman_type[]" id="lform_speciman_detail"><option value="">Please Select</option><option value="Antemortem" @if(old('suspected_probable')[$index] ?? ''=='Suspected' ) selected @endif>Antemortem</option><option value="Postmortem" @if(old('suspected_probable')[$index] ?? ''=='Confirmed' ) selected @endif>Postmortem</option></select></td><td><select class="form-select" aria-label="Default select " name="lform_speciman_detail[]" id="lform_speciman_type"><option value="">Please Select</option><option value="Antemortem" @if(old('suspected_probable')[$index] ?? ''=='Suspected' ) selected @endif>Serum</option><option value="Postmortem" @if(old('suspected_probable')[$index] ?? ''=='Confirmed' ) selected @endif>CSF</option><option value="Postmortem" @if(old('suspected_probable')[$index] ?? ''=='Confirmed' ) selected @endif>Nuchal skin</option><option value="Postmortem" @if(old('suspected_probable')[$index] ?? ''=='Confirmed' ) selected @endif>Skin</option></select></td><td><input type="date" name="lform_sample_collection_date" value="" id="lform_sample_collection_date"></td><td><select class="form-select" aria-label="Default select " name="lform_speciman_type[]" id="lform_speciman_type"><option value="">Please Select</option><option value="RFFIT (CSF,Serum)">RFFIT (CSF,Serum)</option><option value="Real-time PCR (CSF,Saliva, Nuchal skin)">Real-time PCR (CSF,Saliva, Nuchal skin) </option><option value="Rabies Immunohistochemistry">Rabies Immunohistochemistry</option><option value="Other(insert)">Other(insert)</option></select></td><td><input type="text" name="lform_result" value="" id="lform_result"></td><td><input type="text" name="lform_result_declaration_date" value="" id="lform_result_declaration_date"></td><td><input type="text" name="lform_remark" value="" id="lform_remark"></td><td class="text-nowrap"><button type="button" name="add" id="add" class="btn btn-success add_more mr-1"><i class="fa fa-plus" style="font-size:16px"></i></button></button><button type="button" name="remove" id="{{ $index + 1}}" class="btn btn-danger btn_remove"><i class="fa fa-trash" aria-hidden="true"></i></button></tr>'

            $('#suspected_field').append(rowHtml);
        });
    });
    </script>
    @endsection