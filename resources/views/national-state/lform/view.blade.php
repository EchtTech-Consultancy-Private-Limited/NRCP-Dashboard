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
            <div class="signature">
                <div class="row">
                    <div class="col-md-12">
                        <p class="float-right">
                            <strong>Date:</strong>
                            {{ @$stateUserLForm->current_date }}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="emailBlock">
                            <p>
                                Name of Nodal Person: <span class="td-value">  {{@$stateUserLForm->name_nodal_person}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="emailBlock">
                            <p>
                                Designation of Nodal Person:  <span class="td-value">  {{@$stateUserLForm->designation_nodal_person}}</span>
                               
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="emailBlock">
                            <p>
                                Contact Number: <span class="td-value"> {{ @$stateUserLForm->phone_number}} </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="emailBlock">
                            <p>
                                Email ID:  <span class="td-value"> {{  @$stateUserLForm->email}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="emailBlock">
                            <p>
                                Aadhar Number:  <span class="td-value">  {{ @$stateUserLForm->aadhar_number }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="emailBlock">
                            <p>
                                Institute Name:  <span class="td-value"> {{@$stateUserLForm->institute_name}}</span> 
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
                                <p class="text-center justify-content-center">
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
                                <input readonly type="hidden" name="l_form_count_id[]"
                                    value="{{ $statelFormCase->id }}">
                            </td>
                            <td>{{ @$statelFormCase->fname }}</td>
                            <td>{{ @$statelFormCase->mname }}</td>
                            <td>{{ @$statelFormCase->lname }}</td>
                            <td>{{ @$statelFormCase->age }}</td>
                            <td>{{ @$statelFormCase->sex }}</td>
                            <td>{{ @$statelFormCase->contact_number }}</td>
                            <td>{{ @$statelFormCase->states->name }}</td>
                            <td>{{ @$statelFormCase->city->name }}</td>
                            <td>{{@$statelFormCase->lform_subdistrict}}  </td>
                            <td>{{ @$statelFormCase->lform_village }}</td>
                            <td>{{@$statelFormCase->lform_biting_animal}}  </td>
                            <td>{{@$statelFormCase->lform_speciman_type}} </td>
                            <td>{{@$statelFormCase->lform_speciman_detail}}   </td>
                            <td>{{ @$statelFormCase->lform_sample_collection_date }}</td>
                            <td>{{@$statelFormCase->number_of_test_performed}}   </td>
                            <td>{{ @$statelFormCase->lform_result }}</td>
                            <td>{{ @$statelFormCase->lform_result_declaration_date }}</td>
                            <td>{{ @$statelFormCase->lform_remark }}</td>
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