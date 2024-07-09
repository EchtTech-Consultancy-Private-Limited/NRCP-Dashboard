@extends('layouts.main')
@section('title') {{ 'NRCP State Dashboard | Line Suspected' }}
@endsection
@section('content')
<div class="container-fluid dashboard investigate-report">
    <div class="ncdc-container form-tab">
        <div class="dashboard-filter lform_create">
            <form action="{{ route('state.lform-store') }}" method="post" id="lform-store">
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
                                <input type="text" data-date="date" placeholder="dd-mm-yyyy" name="current_date">
                            </p>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Name of Nodal Person <span class="text-danger">*</span>
                                    <input type="text" name="name_nodal_person" value="{{ old('name_nodal_person') }}">
                                    @if ($errors->has('name_nodal_person'))
                                    <span class="form-text text-muted">{{ $errors->first('name_nodal_person') }}</span>
                                    @endif
                                </p>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Designation of Nodal Person<span class="text-danger">*</span> 
                                    <input type="text" name="designation_nodal_person" value="{{ old('designation_nodal_person') }}">
                                    @if ($errors->has('designation_nodal_person'))
                                    <span class="form-text text-muted">{{ $errors->first('designation_nodal_person') }}</span>
                                    @endif
                                </p>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Contact Number<span class="text-danger">*</span>
                                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" maxlength="10" oninput="validateInput(this)">
                                    @if ($errors->has('phone_number'))
                                    <span class="form-text text-muted">{{ $errors->first('phone_number') }}</span>
                                    @endif

                                </p>
                              
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                    Email ID<span class="text-danger">*</span> <br>
                                    <input type="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                    <span class="form-text text-muted">{{ $errors->first('email') }}</span>
                                    @endif

                                </p>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p >
                                    Aadhar Number<span class="text-danger">*</span> <br>
                                    <input type="text" name="aadhar_number" value="{{ old('aadhar_number') }}" maxlength="12" oninput="validateInput(this)">
                                    @if ($errors->has('aadhar_number')) 
                                        <span class="form-text text-muted">{{ $errors->first('aadhar_number') }}</span> 
                                    @endif
                                </p>
                              
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="emailBlock">
                                <p>
                                Institute Name<span class="text-danger">*</span> <br>
                                    <input type="text" name="institute_name" value="{{ old('institute_name') }}">
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
                            @foreach(old('fname', ['']) as $index => $oldValue)
                            <tr id="row{{ $index + 1 }}">
                                <td>
                                    {{ $index + 1 }}
                                    <input type="hidden" name="row_count[]">
                                </td>
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
                                        value="{{ old('contact_number')[$index] ?? '' }}" maxlength="10" oninput="validateInput(this)">
                                </td>
                                <td>
                                    <select class="form-select lform_state" aria-label="Default select" name="lform_state[]" id="lform_state">
                                        <option value="">Please Select</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}" @if((old('lform_state')[$index] ?? '') == $state->id) selected @endif>
                                                {{ ucwords($state->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select lform_district" aria-label="Default select "
                                        name="lform_district[]" id="lform_district">
                                        <option value="">Please Select</option>
                                        @if(isset(old('lform_district')[$index]))
                                        @foreach ($cities as $citie)
                                            <option value="{{ $citie->id }}" @if((old('lform_district')[$index] ?? '') == $citie->id) selected @endif>
                                                {{ ucwords($citie->name) }}
                                            </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select" name="lform_subdistrict[]" id="lform_subdistrict">
                                        <option value="">Please Select</option>
                                        <option value="Sub District" @if((old('lform_subdistrict')[$index] ?? '') == 'Sub District') selected @endif>Sub District</option>
                                        <option value="Taluk" @if((old('lform_subdistrict')[$index] ?? '') == 'Taluk') selected @endif>Taluk</option>
                                        <option value="Block" @if((old('lform_subdistrict')[$index] ?? '') == 'Block') selected @endif>Block</option>
                                        <option value="Mandal" @if((old('lform_subdistrict')[$index] ?? '') == 'Mandal') selected @endif>Mandal</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="lform_village[]"
                                        value="{{ old('lform_village')[$index] ?? '' }}">
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select" name="lform_biting_animal[]" id="lform_biting_animal">
                                        <option value="">Please Select</option>
                                        <option value="Suspected" @if((old('lform_biting_animal')[$index] ?? '') == 'Suspected') selected @endif>Dog</option>
                                        <option value="Confirmed" @if((old('lform_biting_animal')[$index] ?? '') == 'Confirmed') selected @endif>Other(input)</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select" name="lform_speciman_type[]" id="lform_speciman_type">
                                        <option value="">Please Select</option>
                                        <option value="Antemortem" @if((old('lform_speciman_type')[$index] ?? '') == 'Antemortem') selected @endif>Antemortem</option>
                                        <option value="Postmortem" @if((old('lform_speciman_type')[$index] ?? '') == 'Postmortem') selected @endif>Postmortem</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select" name="lform_speciman_detail[]" id="lform_speciman_detail">
                                        <option value="">Please Select</option>
                                        <option value="Serum" @if((old('lform_speciman_detail')[$index] ?? '') == 'Serum') selected @endif>Serum</option>
                                        <option value="CSF" @if((old('lform_speciman_detail')[$index] ?? '') == 'CSF') selected @endif>CSF</option>
                                        <option value="Nuchal skin" @if((old('lform_speciman_detail')[$index] ?? '') == 'Nuchal skin') selected @endif>Nuchal skin</option>
                                        <option value="Skin" @if((old('lform_speciman_detail')[$index] ?? '') == 'Skin') selected @endif>Skin</option>
                                    </select>
                                </td>                                                                
                               <td>
                                <input type="text" data-date="date" placeholder="dd-mm-yyyy" name="lform_sample_collection_date[]" value="{{ old('lform_sample_collection_date')[$index] ?? '' }}" id="lform_sample_collection_date">
                               </td>
                               <td>
                                    <select class="form-select" aria-label="Default select" name="number_of_test_performed[]" id="lform_speciman_type">
                                        <option value="">Please Select</option>
                                        <option value="RFFIT (CSF,Serum)" @if((old('number_of_test_performed')[$index] ?? '') == 'RFFIT (CSF,Serum)') selected @endif>RFFIT (CSF,Serum)</option>
                                        <option value="Real-time PCR (CSF,Saliva, Nuchal skin)" @if((old('number_of_test_performed')[$index] ?? '') == 'Real-time PCR (CSF,Saliva, Nuchal skin)') selected @endif>Real-time PCR (CSF,Saliva, Nuchal skin)</option>
                                        <option value="Rabies Immunohistochemistry" @if((old('number_of_test_performed')[$index] ?? '') == 'Rabies Immunohistochemistry') selected @endif>Rabies Immunohistochemistry</option>
                                        <option value="Other(insert)" @if((old('number_of_test_performed')[$index] ?? '') == 'Other(insert)') selected @endif>Other(insert)</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="lform_result[]" value="{{ old('lform_result')[$index] ?? '' }}" id="lform_result">
                                </td>
                                <td>
                                    <input type="text" data-date="date" placeholder="dd-mm-yyyy" name="lform_result_declaration_date[]" value="{{ old('lform_result_declaration_date')[$index] ?? '' }}" id="lform_result_declaration_date">
                                </td>
                                <td>
                                    <input type="text" name="lform_remark[]" value="{{ old('lform_remark')[$index] ?? '' }}" id="lform_remark">
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
        '<tr id="row' + i + '"><td>' + i + '<input type="hidden" name="row_count[]"></td>' +
        '<td><input type="text" name="fname[]" value="{{ old('fname')[$index] ?? '' }}"></td>' +
        '<td><input type="text" name="mname[]" value="{{ old('mname')[$index] ?? '' }}"></td>' +
        '<td><input type="text" name="lname[]" value="{{ old('lname')[$index] ?? '' }}"></td>' +
        '<td><input type="text" name="age[]" value="{{ old('age')[$index] ?? '' }}"></td>' +
        '<td><input type="text" name="sex[]" value="{{ old('sex')[$index] ?? '' }}"></td>' +
        '<td><input type="text" name="contact_number[]" value="{{ old('contact_number')[$index] ?? '' }}" maxlength="10" oninput="validateInput(this)"></td>' +
        '<td><select class="form-select lform_state" aria-label="Default select " name="lform_state[]" id="lform_state"><option value="">Please Select</option>' +
        '@foreach ($states as $key => $state)<option value="{{ $state->id }}" {{ $state->id == old('lform_state') ? 'selected' : '' }}>{{ ucwords($state->name) }}</option>@endforeach</select></td>' +
        '<td><select class="form-select lform_district" aria-label="Default select " name="lform_district[]" id="lform_district"><option value="">Please Select</option>' +
        '<option value="district name" @if(old('suspected_probable')[$index] ?? '' == "Suspected") selected @endif>district name</option></select></td>' +
        '<td><select class="form-select" aria-label="Default select " name="lform_subdistrict[]" id="lform_subdistrict"><option value="">Please Select</option>' +
        '<option value="Sub District" @if(old('suspected_probable')[$index] ?? '' == "Suspected") selected @endif>Sub District</option>' +
        '<option value="Taluk" @if(old('suspected_probable')[$index] ?? '' == "Probable") selected @endif>Taluk</option>' +
        '<option value="Block" @if(old('suspected_probable')[$index] ?? '' == "Confirmed") selected @endif>Block</option>' +
        '<option value="Mandal" @if(old('suspected_probable')[$index] ?? '' == "Confirmed") selected @endif>Mandal</option></select></td>' +
        '<td><input type="text" name="lform_village[]" value="{{ old('lform_village')[$index] ?? '' }}"></td>' +
        '<td><select class="form-select" aria-label="Default select " name="lform_biting_animal[]" id="lform_biting_animal"><option value="">Please Select</option>' +
        '<option value="Dog" @if(old('suspected_probable')[$index] ?? '' == "Suspected") selected @endif>Dog</option>' +
        '<option value="Other(input)" @if(old('suspected_probable')[$index] ?? '' == "Confirmed") selected @endif>Other(input)</option></select></td>' +
        '<td><select class="form-select" aria-label="Default select " name="lform_speciman_type[]" id="lform_speciman_detail"><option value="">Please Select</option>' +
        '<option value="Antemortem" @if(old('suspected_probable')[$index] ?? '' == "Suspected") selected @endif>Antemortem</option>' +
        '<option value="Postmortem" @if(old('suspected_probable')[$index] ?? '' == "Confirmed") selected @endif>Postmortem</option></select></td>' +
        '<td><select class="form-select" aria-label="Default select " name="lform_speciman_detail[]" id="lform_speciman_type"><option value="">Please Select</option>' +
        '<option value="Serum" @if(old('suspected_probable')[$index] ?? '' == "Suspected") selected @endif>Serum</option>' +
        '<option value="CSF" @if(old('suspected_probable')[$index] ?? '' == "Confirmed") selected @endif>CSF</option>' +
        '<option value="Nuchal skin" @if(old('suspected_probable')[$index] ?? '' == "Confirmed") selected @endif>Nuchal skin</option>' +
        '<option value="Skin" @if(old('suspected_probable')[$index] ?? '' == "Confirmed") selected @endif>Skin</option></select></td>' +
        '<td><input type="text" data-date="date" placeholder="dd-mm-yyyy" name="lform_sample_collection_date[]" value="" id="lform_sample_collection_date"></td>' +
        '<td><select class="form-select" aria-label="Default select " name="number_of_test_performed[]" id="number_of_test_performed"><option value="">Please Select</option>' +
        '<option value="RFFIT (CSF,Serum)">RFFIT (CSF,Serum)</option>' +
        '<option value="Real-time PCR (CSF,Saliva, Nuchal skin)">Real-time PCR (CSF,Saliva, Nuchal skin)</option>' +
        '<option value="Rabies Immunohistochemistry">Rabies Immunohistochemistry</option>' +
        '<option value="Other(insert)">Other(insert)</option></select></td>' +
        '<td><input type="text" name="lform_result[]" value="" id="lform_result"></td>' +
        '<td><input type="text" data-date="date" placeholder="dd-mm-yyyy" name="lform_result_declaration_date[]" value="" id="lform_result_declaration_date"></td>' +
        '<td><input type="text" name="lform_remark[]" value="" id="lform_remark"></td>' +
        '<td class="text-nowrap">' +
        '<button type="button" name="add" id="add" class="btn btn-success add_more mr-1"><i class="fa fa-plus" style="font-size:16px"></i></button>' +
        '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-trash" aria-hidden="true"></i></button>' +
        '</td></tr>';

        $('#suspected_field').append(rowHtml);


        
let selectBox = $('select');
selectBox.each(function () {
    let valueArr = $(this).find(':selected').text().trim().split(' ');
    if (valueArr.includes('select') || valueArr.includes('Select')) {
        $(this).css('color', 'grey');
    } else {
        $(this).css('color', '#000');
    }
    
});

let selectBoxes = $("select");

selectBoxes.each((index, element) => {
    let select = $(element);
    let selectedText = select.find(':selected').text();
    let selectWords = selectedText.split(' ');

    select.on('change', function () {
        let selectedValue = $(this).find(':selected').text();
        let selectedWords = selectedValue.split(' ');
        if (selectedWords.includes('select') || selectedWords.includes('Select')) {
            $(this).css('color', 'grey');
        } else {
            $(this).css('color', '#000');
        }
    });
});
            });
        });

        // get district
        $(document).on('change', '.lform_state', function() {
            const state_id = $(this).val();
            let option = "<option value=''>Select district</option>";
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: BASE_URL + "get-city",
                type: "get",
                data: {
                    state_id: state_id,
                },
                success: function(result) {
                    if (result) {
                        const districtDropdown = $(this).closest('tr').find('.lform_district');
                        districtDropdown.html("");
                        districtDropdown.append(result); // Append the new options
                    } else {
                        $(this).closest('tr').find('.lform_district').html(""); // Clear if no result
                    }
                }.bind(this), // Bind 'this' to ensure the correct context in the success callback
                error: function(xhr, status, error) {
                    console.error('An error occurred:', error);
                }
            });
        });
    </script>
@endsection