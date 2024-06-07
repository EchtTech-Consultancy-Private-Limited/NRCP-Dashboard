@extends('layouts.main') 
@section('title') {{ 'P Form' }} 
@endsection 
@section('content') 
<div class="container-fluid">
    <table id="general_profiles_TABLE2" class="w-100">
        <thead>
          <tr>
            <th>Sl#</th>
            <th>Name of the Health Facility</th>
            <th>Address of the Hospital</th>
            <th>Email ID</th>
            <th>Type of Health Facility</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody> 
          @if($stateUserpForms) 
          @foreach($stateUserpForms as $stateUserpForm) 
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$stateUserpForm->name_of_health}}</td>
            <td>{{$stateUserpForm->address_hospital}}</td>
            <td>{{$stateUserpForm->email}}</td>            
            <td>{{$stateUserpForm->type_of_health}}</td>
            <td> {{date('d-m-Y',strtotime($stateUserpForm->suspected_date))}}</td>
            <td>
                <a href= "{{route('national.p-form-edit',$stateUserpForm->id)}}" id="edit_2" class="btn bg-success action-btn pformEdit" data-id="2" title="Edit">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{route('national.p-form-view',$stateUserpForm->id)}}" class="btn bg-danger action-btn" title="Delete">
                    <i class="fa fa-eye"></i>
                  </a>
                <a href="{{route('national.p-form-delete',$stateUserpForm->id)}}" class="btn bg-danger action-btn" title="Delete" onclick="return confirmDelete()">
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