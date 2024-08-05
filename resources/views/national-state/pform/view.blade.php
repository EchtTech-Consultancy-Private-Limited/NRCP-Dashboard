@extends('layouts.main')
@section('title') {{ 'NRCP State Dashboard | Line Suspected' }}
@endsection
@section('content')
<div class="container-fluid dashboard">
    <div class="ncdc-container form-tab">
        <div class="dashboard-filter">
            <div class="header d-flex align-items-center justify-content-between">
                <div>
                    <img src="{{ asset('state-assets/images/undp.png') }}" />
                </div>
                <div class="text-center">
                    <img src="{{ asset('state-assets/images/emblem.jpg') }}" />
                    <p>
                        <strong class="fw-bold">National Centre for Disease Control
                            <br> Ministry of Health and Family Welfare <br>Government of India
                        </strong>
                    </p>
                    <div class="content">

                        <p>Line List of Suspected/ Probable/ Confirmed Rabies Cases/ Deaths*</p>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('state-assets/images/nrcpLogo.png') }}" />
                </div>
            </div>
            <div class="signature">
                <div class="row">
                    <div class="col-md-12">
                        <p class="fw-bold float-right mr-3">
                            {{ @$stateUserpForm->suspected_date }}
                        </p>
                    </div>
                </div>
                <div class="row" style="display: flex;justify-content: space-around;">
                    <div class="col-md-4">
                        <div class="addressBlock">

                            <p>
                                <strong>Name of the Health Facility/Block/District/State:</strong>
                                <span class="td-value">
                                    {{ @$stateUserpForm->name_of_health }}
                                </span>

                            </p>                           
                            <p>
                               <strong> Name &amp; Designation of Nodal Person :</strong> <span
                                    class="td-value">{{@$stateUserpForm->designation_name}}</span>

                            </p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="emailBlock">
                            <p>
                                <strong>Type of Health Facility/Block/District/State:</strong> <span class="td-value">
                                    {{@$stateUserpForm->type_of_health}}</span>

                                @if ($errors->has('type_of_health'))
                                <span class="form-text text-muted">{{ $errors->first('type_of_health') }}</span>
                                @endif
                            </p>
                            <p>
                                <strong>Email ID:</strong> <br> <span class="td-value">{{@$stateUserpForm->email}}</span>

                            </p>
                           
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="addressBlock">
                            <p>
                                <strong>Address of the Hospital :</strong>
                                <span class="td-value">{{@$stateUserpForm->address_hospital}}</span>
                                <span class="td-value"></span>

                            </p>
                            <p>
                                <strong>Contact Number:</strong> <br> <span class="td-value"> {{@$stateUserpForm->contact_number}}</span>

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
                            <td rowspan="2" class="border-left-0">
                                <p>
                                    <strong>Aadhar</strong>
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
                                    <strong>Village</strong>
                                </p>
                            </td>
                            <td rowspan="2">
                                <p>
                                    <strong>Sub District/ Taluk/Block/ Mandal</strong>
                                </p>
                            </td>
                            <td rowspan="2">
                                <p>
                                    <strong>District</strong>
                                </p>
                            </td>
                            <td rowspan="2">
                                <p>
                                    <strong>Biting Animal</strong>
                                </p>
                            </td>
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
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    <strong>Village</strong>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <strong>Sub District/ Taluk/Block</strong>
                                </p>
                            </td>
                            <td>
                                <p>
                                    <strong>District</strong>
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
                        @foreach($stateUserpForm->lineSuspectedCalculate as $index => $lineSuspectedCount)
                        <tr id="row{{ $index + 1 }}">
                            <td>
                                {{ $index + 1 }}
                            </td>
                            <td>{{ $lineSuspectedCount->aadhar_number }}</td>
                            <td>{{ $lineSuspectedCount->name }}</td>
                            <td>{{ $lineSuspectedCount->age }}</td>
                            <td>{{ $lineSuspectedCount->sex }}</td>
                            <td>{{ $lineSuspectedCount->contact_number }}</td>
                            <td>{{ $lineSuspectedCount->village }}</td>
                            <td>{{ $lineSuspectedCount->sub_district_mandal }}</td>
                            <td>{{ $lineSuspectedCount->district }}</td>
                            <td>{{ $lineSuspectedCount->biting_animal }}</td>
                            <td>{{@$lineSuspectedCount->suspected_probable}}
                                  </td>
                            <td>{{ $lineSuspectedCount->bit_incidence_village }}</td>
                            <td>{{ $lineSuspectedCount->bit_incidence_sub_district }}</td>
                            <td>{{ $lineSuspectedCount->bit_incidence_district }}</td>
                            <td>{{@$lineSuspectedCount->category_of_bite}} </td>
                            <td>{{@$lineSuspectedCount->status_of_pep}}  </td>
                            <td>{{ $lineSuspectedCount->health_facility_name_institute }}</td>
                            <td>{{ $lineSuspectedCount->health_facility_district }}</td>
                            <td>{{@$lineSuspectedCount->outcome_of_patient}} </td>
                            <td>{{@$lineSuspectedCount->bite_from_stray}}    </td>
                            <td>{{ $lineSuspectedCount->mobile_number }}</td>
                            <td>{{ $lineSuspectedCount->date }}</td>
                           
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