@extends('layouts.main')
@section('title')
{{ __('NRCP Dashboard') }}
@endsection
@section('content')
<div class="container-fluid dashboard">

<!-- Info boxes -->
<div class="row">
    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>
    {{-- <div class="col-md-12 pr-5">
        <button class="float-right generate-report" onclick="printDiv('report_national')">Generate Report </button>
    </div> --}}
    <div class="col-md-12">

        <!-- general form elements -->
        <div class="card-primary dashboard" id="report_national">
            @if (Auth::user()->user_type == 1)
            <div class="form-tab m-0">
                <div class="bootstrap-tab">
                    <div class="tab-content" id="myTabContent">

                        <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                            <div class="dashboard-filter mb-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="box-heading pb-1 justify-content-center">
                                            <h1 class="main-heading">Report Generate</h1>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <form action="{{url('national-mis-report-export')}}" method="post">
                                            @csrf
                                            <div class="row align-items-center report-generate justify-content-center">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="district" class="mr-3 text-nowrap ">State
                                                            <span class="star">*</span></label>
                                                        <select name="state" id="month" class="form-control"
                                                            style="color: grey;">
                                                            <option value="">Select State</option>
                                                            @foreach ($states as $state)
                                                              <option value="{{$state->id}}">{{$state->state_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="district" class="mr-3 text-nowrap ">Month
                                                            <span class="star">*</span></label>
                                                        <select name="month" id="month" class="form-control"
                                                            style="color: grey;">
                                                            <option value="">Select Month</option>
                                                            @foreach ($months as $key => $month)
                                                                <option value="{{ $key+1 }}">
                                                                    {{ $month }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="formType" class="mr-3 text-nowrap ">Year
                                                            <span class="star">*</span></label>
                                                        <select name="year" id="year" class="form-control"
                                                            style="color: grey;">
                                                            <option value="">Select Year</option>
                                                            @for ($i = date("Y")-10; $i <= date("Y")+10; $i++)
                                                                <option value="{{$i}}">{{$i}} - {{$i+1}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3 mt-4">
                                                    <div class="">
                                                        <button type="submit" class="btn bg-primary button">Export
                                                            Excel</button>
                                                        <button type="reset"
                                                            class="btn bg-danger me-3">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center">
                                                <div class="col-md-12 mt-4">
                                                    <table id="general_profiles_TABLE2" class="w-100 ">
                                                        <thead>
                                                            <tr>
                                                                <th>State</th>
                                                                <th>Month Year</th>
                                                                <th>Nodal Office</th>
                                                                <th>Office Address</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                             @foreach ($stateMonthlyReports as $stateMonthlyReport)
                                                                <tr>
                                                                    <td>{{@$stateMonthlyReport->states->state_name}}</td>
                                                                    <td>{{date('F Y', strtotime(@$stateMonthlyReport->reporting_month_year))}}</td>
                                                                    <td>{{@$stateMonthlyReport->state_nodal_office}}</td>
                                                                    <td>{{@$stateMonthlyReport->office_address}}</td>
                                                                    <td>
                                                                        {{-- <a href= "{{route('national.state-monthly-edit',$stateMonthlyReport->id)}}" id="edit_2" class="btn bg-success action-btn pformEdit" data-id="2" title="Edit">
                                                                          <i class="fa fa-edit"></i>
                                                                        </a> --}}
                                                                        <a href="{{route('national.state-monthly-view',$stateMonthlyReport->id)}}" class="btn bg-danger action-btn" title="Delete">
                                                                            <i class="fa fa-eye"></i>
                                                                          </a>
                                                                        {{-- <a href="{{route('national.state-monthly-delete',$stateMonthlyReport->id)}}" class="btn bg-danger action-btn" title="Delete" onclick="return confirmDelete()">
                                                                          <i class="fa fa-trash-o"></i>
                                                                        </a> --}}
                                                                      </td>
                                                                </tr>
                                                             @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
        @endif
    </div>
</div>
@endsection