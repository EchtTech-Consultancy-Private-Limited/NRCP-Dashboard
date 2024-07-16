@extends('layouts.main') 
@section('title') {{ 'NRCP State Dashboard | Suspected List' }} 
@endsection 
@section('content') 
<div class="container-fluid dashboard">
  <div class="dashboard-filter">
  <table id="general_profiles_TABLE2" class="w-100">
        <thead>
          <tr>
            <th>Sl#</th>
            <th>Name of the Health Facility</th>
            <th>Address of the Hospital</th>
            <th>Email ID</th>
            <th>Type of Health Facility</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody> 
          @if($lineSuspecteds) 
          @foreach($lineSuspecteds as $lineSuspected) 
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$lineSuspected->name_of_health}}</td>
            <td>{{$lineSuspected->address_hospital}}</td>
            <td>{{$lineSuspected->email}}</td>            
            <td>{{$lineSuspected->type_of_health}}</td>
            <td> {{date('d-m-Y',strtotime($lineSuspected->suspected_date))}}</td>
          </tr>
          @endforeach
          @endif
        </tbody>
    </table>  
  </div>
        
</div>     
@endsection