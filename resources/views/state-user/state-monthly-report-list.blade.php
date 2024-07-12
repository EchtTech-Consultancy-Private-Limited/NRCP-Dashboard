@extends('layouts.main') 
@section('title') {{ 'NRCP State Dashboard | Monthly Report' }} 
@endsection 
@section('content') 
<div class="container-fluid dashboard">
  <div class="form-tab">
    <div class="dashboard-filter">
    <table id="general_profiles_TABLE2" class="w-100">
        <thead>
          <tr>
            <th>Sl#</th>
            <th>State Name</th>
            <th>Name of State Nodal Office</th>
            <th>Office Address</th>
            <th>Reporting Month & Year</th>
            <th>Total districts in the state</th>
          </tr>
        </thead>
        <tbody> 
          @if($stateMonthlyReports) 
          @foreach($stateMonthlyReports as $stateMonthlyReport) 
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$stateMonthlyReport->states->state_name}}</td>
            <td>{{$stateMonthlyReport->state_nodal_office}}</td>
            <td>{{$stateMonthlyReport->office_address}}</td>
            <td> {{date('d-m-Y',strtotime($stateMonthlyReport->reporting_month_year))}}</td>
            <td>{{$stateMonthlyReport->total_districts}}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
    </table> 
    </div>
  </div>
</div>
       
@endsection