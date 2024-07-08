@extends('layouts.main') 
@section('title') {{'State Monthly Report' }} 
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody> 
          @if($stateMonthlyReports) 
          @foreach($stateMonthlyReports as $stateMonthlyReport) 
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$stateMonthlyReport->state_name}}</td>
            <td>{{$stateMonthlyReport->state_nodal_office}}</td>
            <td>{{$stateMonthlyReport->office_address}}</td>
            <td> {{date('d-m-Y',strtotime($stateMonthlyReport->reporting_month_year))}}</td>
            <td>
              <a href= "{{route('national.state-monthly-edit',$stateMonthlyReport->id)}}" id="edit_2" class="btn bg-success action-btn pformEdit" data-id="2" title="Edit">
                <i class="fa fa-edit"></i>
              </a>
              <a href="{{route('national.state-monthly-view',$stateMonthlyReport->id)}}" class="btn bg-danger action-btn" title="Delete">
                  <i class="fa fa-eye"></i>
                </a>
              <a href="{{route('national.state-monthly-delete',$stateMonthlyReport->id)}}" class="btn bg-danger action-btn" title="Delete" onclick="return confirmDelete()">
                <i class="fa fa-trash-o"></i>
              </a>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
    </table> 
    </div>
  </div>
</div>
       
@endsection