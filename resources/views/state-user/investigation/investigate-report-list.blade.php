@extends('layouts.main') 
@section('title') {{ 'NRCP State Dashboard | Investigate List' }} 
@endsection 
@section('content') 
<div class="container-fluid dashboard">
  <div class="form-tab">
    <div class="dashboard-filter">
    <table id="general_profiles_TABLE2" class="w-100  ">
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Name of interviewer</th>
            <th>Date of Interview</th>
            <th>Designation</th>
            <th>Contact number</th>
            <th>Gender</th>
            {{-- <th>Age</th> --}}
          </tr>
        </thead>
        <tbody> 
          @if($investigateReports) 
          @foreach($investigateReports as $investigateReport) 
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$investigateReport->interviewer_name}}</td>
            <td> {{date('d-m-Y',strtotime($investigateReport->interview_date))}}</td>
            <td>{{$investigateReport->interviewer_designation}}</td>
            <td>{{$investigateReport->interviewer_contact_number}}</td>
            {{-- <td>{{$investigateReport->suspect_age}}</td> --}}
            <td>{{$investigateReport->suspected_gender}}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
    </table>        
    
    </div>
  </div>
</div>
   
@endsection