@extends('layouts.main') 
@section('title') {{ 'L Form' }} 
@endsection 
@section('content') 
<div class="container-fluid dashboard">
  <div class="dashboard-filter table-responsive">
  <table id="general_profiles_TABLE2" class="datatable w-100">
        <thead>
          <tr>
            <th>Sl#</th>
            <th>Name of Nodal Person</th>
            <th>Designation of Nodal Person</th>
            <th>Email ID</th>
            <th>Contact Number</th>
            <th>Institute Name</th>
            <th>Action</th>
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
            <td class="text-nowrap text-center">
                <a href= "{{route('national.l-form-edit',$stateUserLForm->id)}}" id="edit_2" class="btn bg-success action-btn pformEdit" data-id="2" title="Edit">
                  <i class="fa fa-edit"></i>
                </a>
                <a href="{{route('national.l-form-view',$stateUserLForm->id)}}" class="btn bg-danger action-btn" title="Delete">
                    <i class="fa fa-eye"></i>
                  </a>
                <a href="{{route('national.l-form-delete',$stateUserLForm->id)}}" class="btn bg-danger action-btn" title="Delete" onclick="return confirmDelete()">
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
@endsection