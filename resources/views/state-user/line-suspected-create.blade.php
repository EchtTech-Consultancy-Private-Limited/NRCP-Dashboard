@extends('layouts.main')
@section('title') {{ 'NRCP State Dashboard | Line Suspected' }}
@endsection
@section('content')
<div class="container-fluid dashboard investigate-report">
    <div class="ncdc-container form-tab">
        <div class="dashboard-filter">
            <form action="{{ route('state.line-suspected-store') }}" method="post" id="line-suspected-store">
                @csrf
                <div class="header d-flex align-items-center justify-content-between">
                    <div>
                        <img src="{{ asset('state-assets/images/undp.png') }}" />
                    </div>
                    <div style="text-align: center;">
                        <img src="{{ asset('state-assets/images/emblem.jpg') }}" />
                        <p>
                            <strong style="font-size: 14px; font-weight: 500 !important; line-height: 1.7;">National
                                Centre for Disease Control
                                <br> Ministry of Health and Family Welfare <br>Government of India
                            </strong>
                        </p>
                        <div class="content">

                            <p style="color: #023c6e; font-weight: 600;">Line List of Suspected/ Probable/ Confirmed
                                Rabies Cases/ Deaths*</p>
                        </div>
                    </div>
                    <div>
                        <img src="{{ asset('state-assets/images/nrcpLogo.png') }}" />
                    </div>
                </div>
                <div class="signature">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="float-right mr-2">
                                <span class="d-block">Date:</span>
                                <input type="date" name="suspected_date" value="{{ old('suspected_date') }}" class="form-control">
                            </p>
                        </div>
                    </div>
                    <div class="row line-suspected-form mb-3" class="justify-content-between">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name_of_health">Name of the Health Facility/Block/District/State <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name_of_health" class="form-control"
                                    value="{{ old('name_of_health') }}">
                                @if ($errors->has('name_of_health'))
                                <span class="form-text text-muted">{{ $errors->first('name_of_health') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="type_of_health"> Type of Health Facility/Block/District/State <span
                                        class="text-danger">*</span> </label>
                                <select name="type_of_health" class="form-control" id="type_of_health">
                                    <option value=""> Select state</option>
                                    @foreach ($states as $key => $state)
                                    <option value="{{ ucwords($state->name) }}"
                                        {{ $state->name == old('type_of_health') ? 'selected' : '' }}>
                                        {{ ucwords($state->name) }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type_of_health'))
                                <span class="form-text text-muted">{{ $errors->first('type_of_health') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="address_hospital"> Address of the Hospital <span
                                        class="text-danger">*</span>
                                </label>
                                <input type="text" name="address_hospital" class="form-control"
                                    value="{{ old('address_hospital') }}">
                                @if ($errors->has('address_hospital'))
                                <span class="form-text text-muted">{{ $errors->first('address_hospital') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="designation_name">Name Designation of Nodal Person <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="designation_name" class="form-control"
                                    value="{{ old('designation_name') }}">
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contact_number">Contact Number<span class="text-danger">*</span></label>
                                <input type="text" name="main_contact_number" class="form-control" value="{{ old('main_contact_number') }}" maxlength="12" oninput="validateInput(this)">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email ID<span class="text-danger">*</span></label>
                                <input readonly type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                @if ($errors->has('email'))
                                <span class="form-text text-muted">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="aadhar_number">Aadhar Number<span class="text-danger">*</span></label>
                                <input type="text" name="aadhar_number" value="{{ old('aadhar_number') }}"
                                    maxlength="12" oninput="validateInput(this)">
                                @if ($errors->has('aadhar_number'))
                                <span class="form-text text-muted">{{ $errors->first('aadhar_number') }}</span>
                                @endif
                            </div>
                        </div> --}}



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
                                <td rowspan="2">
                                    <p>
                                        <strong>Aadhar Number</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
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
                               
                                {{-- <td rowspan="2">
                                    <p>
                                        <strong>Biting Animal</strong>
                                    </p>
                                </td> --}}
                                <td rowspan="2">
                                    <p>
                                        <strong>Suspected / probable/ Confirmed</strong>
                                    </p>
                                </td>
                                <td colspan="3">
                                    <p>
                                        <strong>Place of bite incidence</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Category of Bite</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Status of PEP (Complete/ Partial/ Nil/NA)</strong>
                                    </p>
                                </td>
                                <td colspan="2">
                                    <p>
                                        <strong>Details of reporting health facility</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Outcome of patient (Death in Hospital/ LAMA/ Alive)</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Bite from Stray Dog/ Pet Dog</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Mobile Number</strong>
                                    </p>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <strong>Date Of Bite</strong>
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
                                        <strong>District</strong>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <strong>Sub District/ Taluk/Block</strong>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <strong>Village</strong>
                                    </p>
                                </td>                                
                                <td>
                                    <p>
                                        <strong>Name of Institute</strong>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <strong>District</strong>
                                    </p>
                                </td>
                            </tr>
                            @foreach(old('name', ['']) as $index => $oldValue)
                            <tr id="row{{ $index + 1 }}">
                                <td>
                                    {{ $index + 1 }}
                                    <input type="hidden" name="row_count[]">
                                </td>
                                <td>
                                    <input type="text" name="aadhar_no[]" value="{{ old('aadhar_no')[$index] ?? '' ?? '' }}" maxlength="12" oninput="validateInput(this)">
                                </td>
                                <td>
                                    <input type="text" name="name[]" value="{{ $oldValue }}">
                                </td>
                                <td>
                                    <input type="text" name="age[]" value="{{ old('age')[$index] ?? '' ?? '' }}">
                                </td>
                                <td>
                                    <input type="text" name="sex[]" value="{{ old('sex')[$index] ?? '' ?? '' }}">
                                </td>
                                <td>
                                    <input type="text" name="contact_number[]"
                                        value="{{ old('contact_number')[$index] ?? '' }}" maxlength="10"
                                        oninput="validateInput(this)">
                                </td>
                                <td>
                                    {{-- <input type="text" name="district[]" value="{{ old('district')[$index] ?? '' }}"> --}}
                                    <select class="form-select form_district" aria-label="Default select "
                                        name="district[]" id="form_district" subId="pform_subdistrict">
                                        <option value="">Please Select</option>
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}" @if((old('district')[$index] ?? '') == $citie->id) selected @endif>
                                                {{ ucwords($citie->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    {{-- <input type="text" name="sub_district_mandal[]" value="{{ old('sub_district_mandal')[$index] ?? '' }}"> --}}
                                    <select class="form-select pform_subdistrict" aria-label="Default select" name="sub_district_mandal[]" id="pform_subdistrict">
                                        <option value="">Please Select</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="village[]" value="{{ old('village')[$index] ?? '' }}">
                                </td>                               
                                
                                {{-- <td>
                                    <input type="text" name="biting_animal[]"
                                        value="{{ old('biting_animal')[$index] ?? '' }}">
                                </td> --}}
                                <td>
                                    <select class="form-select" aria-label="Default select example"
                                        name="suspected_probable[]" id="suspected_probable">
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
                                    {{-- <input type="text" name="district[]" value="{{ old('district')[$index] ?? '' }}"> --}}
                                    <select class="form-select form_district" aria-label="Default select"
                                        name="bit_incidence_district[]" id="form_district" subId="bit_incidence_subdistrict">
                                        <option value="">Please Select</option>
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}" @if((old('bit_incidence_district')[$index] ?? '') == $citie->id) selected @endif>
                                                {{ ucwords($citie->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select bit_incidence_subdistrict" aria-label="Default select" name="bit_incidence_sub_district[]" id="bit_incidence_subdistrict">
                                        <option value="">Please Select</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="bit_incidence_village[]"
                                        value="{{ old('bit_incidence_village')[$index] ?? '' }}">
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example"
                                        name="category_of_bite[]" id="category_of_bite">
                                        <option value="">Please Select</option>
                                        <option value="First" @if(old('category_of_bite')=='First' ) selected @endif>
                                            First</option>
                                        <option value="Second" @if(old('category_of_bite')=='Second' ) selected @endif>
                                            Second</option>
                                        <option value="Third" @if(old('category_of_bite')=='Third' ) selected @endif>
                                            Third</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example"
                                        name="status_of_pep[]" id="status_of_pep">
                                        <option value="">Please Select</option>
                                        <option value="Complete" @if(old('status_of_pep')[$index] ?? ''=='Complete' )
                                            selected @endif>Complete</option>
                                        <option value="Partial" @if(old('status_of_pep')[$index] ?? ''=='Partial' )
                                            selected @endif>Partial</option>
                                        <option value="Nil" @if(old('status_of_pep')[$index] ?? ''=='Nil' ) selected
                                            @endif>Nil</option>
                                        <option value="NA" @if(old('status_of_pep')[$index] ?? ''=='NA' ) selected
                                            @endif>NA</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="health_facility_name_institute[]"
                                        value="{{ old('health_facility_name_institute')[$index] ?? '' }}">
                                </td>
                                <td>
                                    <select class="form-select health_facility_district" aria-label="Default select "
                                        name="health_facility_district[]" id="health_facility_district">
                                        <option value="">Please Select</option>
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}" @if((old('health_facility_district')[$index] ?? '') == $citie->id) selected @endif>
                                                {{ ucwords($citie->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example"
                                        name="outcome_of_patient[]" id="outcome_of_patient">
                                        <option value="">Please Select</option>
                                        <option value="Death in Hospital" @if(old('outcome_of_patient')[$index]
                                            ?? ''=='Death in Hospital' ) selected @endif>Death in Hospital</option>
                                        <option value="LAMA" @if(old('outcome_of_patient')[$index] ?? ''=='LAMA' )
                                            selected @endif>LAMA</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example"
                                        name="bite_from_stray[]" id="bite_from_stray">
                                        <option value="">Please Select</option>
                                        <option value="Stary Dog" @if((old('bite_from_stray')[$index] ?? '') == 'Stary Dog') selected @endif>Stary Dog</option>
                                        <option value="Pet Dog" @if((old('bite_from_stray')[$index] ?? '') == 'Pet Dog') selected @endif>Pet Dog</option>
                                        <option value="Cat" @if((old('bite_from_stray')[$index] ?? '') == 'Cat') selected @endif>Cat</option>
                                        <option value="Other" @if((old('bite_from_stray')[$index] ?? '') == 'Other') selected @endif>Other</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="mobile_number[]"
                                        value="{{ old('mobile_number')[$index] ?? '' }}" maxlength="10"
                                        oninput="validateInput(this)">
                                </td>
                                <td>
                                    <input type="date" name="date[]" value="{{ old('date')[$index] ?? '' }}">
                                </td>
                                <td class="text-nowrap">
                                    <button type="button" name="add" id="add" class="btn btn-success add_more"><i
                                            class="fa fa-plus" style="font-size:16px"></i></button>
                                    </button><button type="button" name="remove" id="{{ $index + 1 }}"
                                        class="btn btn-danger btn_remove">X</button>
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
                '"><td><input type="hidden" name="row_count[]">' +
                i +
                '</td><td><input type="text" name="aadhar_no[]" class="name_list" maxlength="12" oninput="validateInput(this)"></td><td><input type="text" name="name[]" class="name_list"></td><td><input type="text" name="age[]" class="name_list"></td><td><input type="text" name="sex[]" class="name_list"></td><td><input type="text" name="contact_number[]"  class="name_list" maxlength="10" oninput="validateInput(this)"></td>' +
                '<td><select class="form-select form_district" aria-label="Default select" name="district[]" id="form_district" subId="pform_subdistrict"><option value="">Please Select</option>' +
                '@foreach ($cities as $key => $citie)<option value="{{ $citie->id }}">{{ $citie->name }}</option>@endforeach</select></td>' +
                '<td><select class="form-select pform_subdistrict" aria-label="Default select" name="sub_district_mandal[]" id="pform_subdistrict"><option value="">Please Select</option></select></td>' +
                '<td><input type="text" name="village[]" class="name_list"></td></td><td><select class="form-select" aria-label="Default select example" name="suspected_probable[]" id="suspected_probable' +
                i +
                '"><option value="">Please Select</option><option value="Suspected">Suspected</option><option value="Probable">Probable</option><option value="Confirmed">Confirmed</option></select></td>' +
                '<td><select class="form-select form_district" aria-label="Default select" name="bit_incidence_district[]" id="form_district" subId="bit_incidence_subdistrict"><option value="">Please Select</option>' +
                '@foreach ($cities as $key => $citie)<option value="{{ $citie->id }}">{{ $citie->name }}</option>@endforeach</select></td>' +
                '<td><select class="form-select bit_incidence_subdistrict" aria-label="Default select" name="bit_incidence_sub_district[]" id="bit_incidence_subdistrict"><option value="">Please Select</option></select></td>' +
                '<td><input type="text" name="bit_incidence_village[]" class="name_list"></td><td><select class="form-select" aria-label="Default select example" name="category_of_bite[]" id="category_of_bite' +
                i +
                '"><option value="">Please Select</option><option value="First">First</option><option value="Second">Second</option><option value="Third">Third</option></select></td><td><select class="form-select" aria-label="Default select example" name="status_of_pep[]" id="status_of_pep' +
                i +
                '"><option value="">Please Select</option><option value="Complete">Complete</option><option value="Partial">Partial</option><option value="Nil">Nil</option><option value="NA">NA</option></select></td><td><input type="text" name="health_facility_name_institute[]" class="name_list"></td>' +
                '<td><select class="form-select health_facility_district" aria-label="Default select " name="health_facility_district[]" id="health_facility_district"><option value="">Please Select</option>' +
                '@foreach ($cities as $key => $citie)<option value="{{ $citie->id }}">{{ $citie->name }}</option>@endforeach</select></td>' +
                '<td><select class="form-select" aria-label="Default select example" name="outcome_of_patient[]" id="outcome_of_patient' +
                i +
                '"><option value="">Please Select</option><option value="Death in Hospital">Death in Hospital</option><option value="LAMA">LAMA</option></select></td><td><select class="form-select" aria-label="Default select example" name="bite_from_stray[]" id="bite_from_stray' +
                i +
                '"><option value="">Please Select</option><option value="Stary Dog" @if((old('bite_from_stray')[$index] ?? '') == 'Stary Dog') selected @endif>Stary Dog</option>' +
                '<option value="Pet Dog" @if((old('bite_from_stray')[$index] ?? '') == 'Pet Dog') selected @endif>Pet Dog</option>' +
                '<option value="Cat" @if((old('bite_from_stray')[$index] ?? '') == 'Cat') selected @endif>Cat</option>' +
                '<option value="Other" @if((old('bite_from_stray')[$index] ?? '') == 'Other') selected @endif>Other</option></select></td><td><input type="text" name="mobile_number[]" class="name_list" maxlength="10" oninput="validateInput(this)"></td><td><input type="date" name="date[]" class="name_list"></td><td><button type="button" name="add" id="add' +
                i +
                '" class="btn btn-success add_more"><i class="fa fa-plus" style="font-size:16px"></i></button><button type="button" name="remove" id="' +
                i +
                '" class="btn btn-danger btn_remove">X</button></td></tr>';

            $('#suspected_field').append(rowHtml);
        });
    });
    </script>
    @endsection