@extends('layouts.main') 
@section('title') {{ 'NRCP State Dashboard | L Form' }} 
@endsection 
@section('content') 
<div class="container-fluid dashboard">
  <div class="dashboard-filter">
  <table id="general_profiles_TABLE2" class="w-100">
        <thead>
          <tr>
            <th>Sl#</th>
            <th>Name of Nodal Person</th>
            <th>Designation of Nodal Person</th>
            <th>Email ID</th>
            <th>Contact Number</th>
            <th>Institute Name</th>
          </tr>
        </thead>
        <tbody> 
          @if($stateUserLForms) 
          @foreach($stateUserLForms as $stateUserLForm) 
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$stateUserLForm->name_nodal_person}}</td>
            <td>{{$stateUserLForm->designation_nodal_person}}</td>
            <td>{{$stateUserLForm->email}}</td>            
            <td>{{$stateUserLForm->phone_number}}</td>
            <td> {{ $stateUserLForm->institute_name }}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
    </table>  
  </div>
         
</div>     
@endsection