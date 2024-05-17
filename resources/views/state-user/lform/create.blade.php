@extends('layouts.main')
@section('title') {{ 'NRCP State Dashboard | Line Suspected' }}
@endsection
@section('content')
<div class="container-fluid dashboard">
    <div class="ncdc-container form-tab">
        <div class="dashboard-filter">
            <form action="{{ route('state.line-suspected-store') }}" method="post" id="line-suspected-store">
                @csrf
                <div class="header lform-create-header d-flex align-items-center justify-content-between">
                    <div>
                        <img src="{{ asset('state-assets/images/undp.png') }}" />
                    </div>
                    <div style="text-align: center;">
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
                <div class="signature">
                    <div class="row">
                        <div class="col-md-12">
                            <p style="text-align: right; margin-right: 15%; font-size: 14px; margin-top: 5px;">
                                <strong>Date:</strong>
                                <input type="date" name="suspected_date" value="{{ old('suspected_date') }}">
                            </p>
                        </div>
                    </div>
                    <div class="row" style="display: flex;justify-content: space-around;">
                        <div class="col-md-4">
                            <div class="emailBlock">

                                <p>
                                    Name of Nodal Person:
                                    <input type="text" name="name_of_health" value="{{ old('name_of_health') }}">
                                    @if ($errors->has('name_of_health'))
                                    <span class="form-text text-muted">{{ $errors->first('name_of_health') }}</span>
                                    @endif
                                </p>
                                <p>
                                    Designation of Nodal Person :
                                    <input type="text" name="address_hospital" value="{{ old('address_hospital') }}">
                                    @if ($errors->has('address_hospital'))
                                    <span class="form-text text-muted">{{ $errors->first('address_hospital') }}</span>
                                    @endif
                                </p>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="emailBlock">
                                <p>

                                    Contact Number:

                                    <input type="text" name="contact_number" value="">
                                    <span class="form-text text-muted"></span>

                                </p>
                                <p>
                                    Email ID:
                                    <input type="email" name="email" value="{{ old('email') }}">

                                    <span class="form-text text-muted"></span>

                                </p>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="emailBlock">
                                <p>
                                Institute Name:
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
                                        <option value="Suspected" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>Suspected</option>
                                        <option value="Probable" @if(old('suspected_probable')[$index] ?? ''=='Probable'
                                            ) selected @endif>Probable</option>
                                        <option value="Confirmed" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Confirmed</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select "
                                        name="lform_subdistrict[]" id="lform_subdistrict">
                                        <option value="">Please Select</option>
                                        <option value="Suspected" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>Suspected</option>
                                        <option value="Probable" @if(old('suspected_probable')[$index] ?? ''=='Probable'
                                            ) selected @endif>Probable</option>
                                        <option value="Confirmed" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Confirmed</option>
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
                                        name="lform_speciman_detail[]" id="lform_speciman_detail">
                                        <option value="">Please Select</option>
                                        <option value="Suspected" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>Other (Input)</option>
                                       
                                    </select>
                                </td>
                                <td>
                                <select class="form-select" aria-label="Default select "
                                        name="lform_speciman_type[]" id="lform_speciman_type">
                                        <option value="">Please Select</option>
                                        <option value="Suspected" @if(old('suspected_probable')[$index]
                                            ?? ''=='Suspected' ) selected @endif>Suspected</option>
                                        <option value="Probable" @if(old('suspected_probable')[$index] ?? ''=='Probable'
                                            ) selected @endif>Probable</option>
                                        <option value="Confirmed" @if(old('suspected_probable')[$index]
                                            ?? ''=='Confirmed' ) selected @endif>Confirmed</option>
                                    </select>
                                </td>
                               <td>
                                <input type="date" name="lform_sample_collection_date" value="" id="lform_sample_collection_date">
                               </td>
                                <td>
                                    <ul>
                                        <li>  RFFIT (CSF,Serum)</li>
                                        <li>Real-time PCR (CSF,Saliva, Nuchal skin) </li>
                                        <li> Rabies Immunohistochemistry</li>
                                        <li> Other(insert)</li>
                                    </ul>
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
                '</td><td><input type="text" name="name[]" class="name_list"></td><td><input type="text" name="age[]" class="name_list"></td><td><input type="text" name="sex[]" class="name_list"></td><td><input type="text" name="contact_number[]"  class="name_list"></td><td><input type="text" name="village[]" class="name_list"></td><td><input type="text" name="sub_district_mandal[]" class="name_list"></td><td><input type="text" name="district[]" class="name_list"></td><td><input type="text" name="biting_animal[]" class="name_list"></td><td><select class="form-select" aria-label="Default select example" name="suspected_probable[]" id="suspected_probable' +
                i +
                '"><option value="">Please Select</option><option value="Suspected">Suspected</option><option value="Probable">Probable</option><option value="Confirmed">Confirmed</option></select></td><td><input type="text" name="bit_incidence_village[]" class="name_list"></td><td><input type="text" name="bit_incidence_sub_district[]" class="name_list"></td><td><input type="text" name="bit_incidence_district[]" class="name_list"></td><td><select class="form-select" aria-label="Default select example" name="category_of_bite[]" id="category_of_bite' +
                i +
                '"><option value="">Please Select</option><option value="First">First</option><option value="Second">Second</option><option value="Third">Third</option></select></td><td><select class="form-select" aria-label="Default select example" name="status_of_pep[]" id="status_of_pep' +
                i +
                '"><option value="">Please Select</option><option value="Complete">Complete</option><option value="Partial">Partial</option><option value="Nil">Nil</option><option value="NA">NA</option></select></td><td><input type="text" name="health_facility_name_institute[]" class="name_list"></td><td><input type="text" name="health_facility_district[]" class="name_list"></td><td><select class="form-select" aria-label="Default select example" name="outcome_of_patient[]" id="outcome_of_patient' +
                i +
                '"><option value="">Please Select</option><option value="Death in Hospital">Death in Hospital</option><option value="LAMA">LAMA</option></select></td><td><select class="form-select" aria-label="Default select example" name="bite_from_stray[]" id="bite_from_stray' +
                i +
                '"><option value="">Please Select</option><option value="Bite from Stray Dog">Bite from Stray Dog</option><option value="Pet Dog">Pet Dog</option></select></td><td><input type="text" name="mobile_number[]" class="name_list"></td><td><input type="date" name="date[]" class="name_list"></td><td><button type="button" name="add" id="add' +
                i +
                '" class="btn btn-success add_more"><i class="fa fa-plus" style="font-size:16px"></i></button><button type="button" name="remove" id="' +
                i +
                '" class="btn btn-danger btn_remove">X</button></td></tr>';

            $('#suspected_field').append(rowHtml);
        });
    });
    </script>
    @endsection