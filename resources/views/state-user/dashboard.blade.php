@extends('layouts.main')
@section('title')
{{ 'Monthly Report Form' }}
@endsection
@section('content')
<div class="container-fluid state-user-dashboard dashboard mt-4">

    <div class="dashboard-filter mb-4">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="state" class="mr-3 text-nowrap ">State <span class="star">*</span></label>
                    <select name="state-id" id="state-id" class="form-control state_dashboard_filter">
                        <option value="">Select State</option>
                        @foreach ($states as $state)
                            <option value="{{$state->id}}">{{$state->state_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="district" class="mr-3 text-nowrap ">Month <span class="star">*</span></label>
                    <select name="state-month" id="state-month" class="form-control state_dashboard_filter">
                        <option value="">Select Month</option>
                        @foreach ($months as $key => $month)
                            <option value="{{ $key+1 }}">
                                {{ $month }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="formType" class="mr-3 text-nowrap ">Year <span class="star">*</span></label>
                    <select name="state-year" id="state-year" class="form-control state_dashboard_filter">
                        <option value="">Select Year</option>
                        @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                            <option value="{{$i}}">{{$i}} - {{$i+1}}</option>
                        @endfor
                    </select>

                </div>
            </div>
        </div>

        <div class="row card-mm">
            <div class="col-md-2 col-md-n">
                <div class="single_crm border-line-1 p-0">
                    <div class="crm_body">
                        <h4 id="sum_total_health_animal">{{$total->sum_total_health_animal}}</h4>
                        <p>Total No. of Health Facilities Providing Animal Bite Management in The State </p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-md-n">
                <div class="single_crm border-line-2 p-0">
                    <div class="crm_body">
                        <h4 id="total_health_facilities_submitted">{{$total->total_health_facilities_submitted}}
                        </h4>
                        <p>Total Number of Facilities Submitted Monthly Report Under NRCP </p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-md-n">
                <div class="single_crm border-line-3 p-0">
                    <div class="crm_body">
                        <h4 id="total_patients">{{$total->total_patients}}</h4>
                        <p>Total No. of Patients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-md-n">
                <div class="single_crm border-line-4 p-0">
                    <div class="crm_body">
                        <h4 id="suspected_death_reports">{{$total->suspected_death_reports}}</h4>
                        <p>Suspected / Probable / Confirmed Rabies Cases / Deaths Reported </p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-md-n">
                <div class="single_crm border-line-5 p-0">
                    <div class="crm_body">
                        <h4 id="availability_arv">{{$total->availability_arv}}</h4>
                        <p>Availability of ARV</p>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-md-n">
                <div class="single_crm border-line-6 p-0">
                    <div class="crm_body">
                        <h4 id="availability_ars">{{$total->availability_ars}}</h4>
                        <p>Availability of ARS</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="dashboard-filter mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="box-heading">
                    <h1 class="main-heading">Yearly wise Monthly Report</h1>
                    <select name="year" id="year" class="form-control">
                        <option value="">Select Year</option>
                        @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                            <option value="{{$i}}">{{$i}} - {{$i+1}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white_card_body">
                    <div id="state-dashboard-data"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="dashboard-filter mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="box-heading pb-1 justify-content-center">
                    <h1 class="main-heading">Monthly Report Generate</h1>
                </div>
            </div>

            <div class="col-md-12">
                <form action="{{ route('national-mis-report-export') }}" method="post">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <div class="form-group =">
                                <label for="district" class="mr-3 text-nowrap ">Month <span
                                        class="star">*</span></label>
                                <select name="month" id="month" class="form-control">
                                    <option value="">Select Month</option>
                                    @foreach ($months as $key => $month)
                                        <option value="{{ $key+1 }}">
                                            {{ $month }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group =">
                                <label for="formType" class="mr-3 text-nowrap ">Year <span
                                        class="star">*</span></label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">Select Year</option>
                                    @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                        <option value="{{$i}}">{{$i}} - {{$i+1}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mt-4">
                                <button type="submit" class="btn bg-primary button">Export Excel</button>
                                <button type="reset" class="btn bg-danger me-3">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="row defaultform justify-content-center mt-4">
        <div class="col-md-3">
            <div class="box box1">
                <span class="user-icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </span>
                <div class="cases">
                    <div class="d-inline-block ml-2">
                        <span id="rabiestext1" class="">Total No. of Investigation Report </span>
                        </br><span id="rabiesbox1" class="case-title">
                            {{ @$investigateReport }}
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="box box2">
                <span class="user-icon">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>                    
                </span>
                <div class="cases">
                    <div class="d-inline-block ml-2">
                        <span id="rabietext2" class="">Total No. of State Monthly Report </span>
                        <br><span id="rabiesbox2" class="case-title">{{ @$stateMonthlyReport }}
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="box box3">
                <span class="user-icon">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </span>
                <div class="cases">
                    <div class="d-inline-block ml-2">
                        <span id="rabiestext3" class="">Total No. of Line List Suspected </span>
                        <br><span id="rabiesbox3" class="case-title">
                            {{ @$lineSuspected }}
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-3">
            <div class="box box4">
                <span class="user-icon">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </span>
                <div class="cases">
                    <div class="d-inline-block ml-2">
                        <span id="rabiestext3" class="">Total No. of L Form </span>
                        <br><span id="rabiesbox3" class="case-title">
                            <!-- {{ @$LForm }} -->
                            5
                        </span>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
@endsection