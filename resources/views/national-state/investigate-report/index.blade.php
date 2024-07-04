@extends('layouts.main') 
@section('title') {{ 'Investigate Report' }} 
@endsection 
@section('content') 
<div class="container-fluid">
    <table id="general_profiles_TABLE2" class="w-100">
        <thead>
          <tr>
            <th>Sl#</th>
            <th>Name of interviewer</th>
            <th>Date of Interview</th>
            <th>Designation</th>
            <th>Contact number</th>
            <th>Gender</th>
            {{-- <th>Age</th> --}}
            <th>Action</th>
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
            <td>{{$investigateReport->suspected_gender}}</td>
            {{-- <td>{{$investigateReport->suspect_age}}</td> --}}
            <td>
                <a href= "{{route('national.investigate-report-edit',$investigateReport->id)}}" id="edit_2" class="btn bg-success action-btn pformEdit" data-id="2" title="Edit">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{route('national.investigate-report-view',$investigateReport->id)}}" class="btn bg-danger action-btn" title="Delete">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a href="{{route('national.investigate-report-delete',$investigateReport->id)}}" class="btn bg-danger action-btn" title="Delete" onclick="return confirmDelete()">
                    <i class="fa fa-trash-o"></i>
                </a>
              </td>
          </tr>
          @endforeach
          @endif
        </tbody>
    </table>        
</div>     
@endsection