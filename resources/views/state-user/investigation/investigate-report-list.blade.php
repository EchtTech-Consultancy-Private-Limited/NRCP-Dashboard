@extends('layouts.main') 
@section('title') {{ 'NRCP State Dashboard | Suspected List' }} 
@endsection 
@section('content') 
<div class="container-fluid">
    <a href="{{ route('state.line-suspected-export') }}" class="btn btn-primary">Export</a><br><br>
    <table id="general_profiles_TABLE2" class=" table-responsive">
        <thead>
          <tr>
            <th>Sl#</th>
            <th>Name of interviewer</th>
            <th>Date of Interview</th>
            <th>Designation</th>
            <th>Contact number</th>
            <th>Gender</th>
            <th>Age</th>
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
            <td>{{$investigateReport->suspect_age}}</td>
            <td>{{$investigateReport->suspected_gender}}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
    </table>        
</div>     
@endsection