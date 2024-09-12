@extends('layouts.main')
@section('title')
{{__('User List')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='dashboard'>
        <div class="dashboard-filter mb-4 general-profile-filter">
            <form method="post" action="{{ route('admin.save') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" maxlength="200" class="form-control" placeholder="Enter Name">
                        @error('name')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress">Email<span class="text-danger">*</span></label>
                        <input type="text" name="email" value="{{ old('email', $user->email ?? '') }}" maxlength="200" class="form-control" placeholder="Enter Email">
                        @error('email')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div> 
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">Password<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="password" value="{{ old('password', $user->password ?? '') }}" maxlength="10" id="password" placeholder="Enter Password">
                        @error('password')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    
                    <div class="col-md-4">
                        <label class="form-label" for="state_name">State Name <span class="text-danger">*</span></label>
                        <select id="state_name" class="form-control" name="state_id">
                            <option value="">Select State Name</option>
                            @foreach($states as $statelist)
                                <option value="{{ $statelist->id }}" {{ old('state_id', $user->state_id ?? '') == $statelist->id ? 'selected' : '' }}>
                                    {{ ucfirst($statelist->state_name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('state_id')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="institute_name">Institute Name </label>
                        <select id="institute_name" class="form-control" name="institute_id">
                            <option value="">Select Institute Name</option>
                        </select>
                        @error('institute_id')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 pe-1">
                        <label class="form-label" for="inputAddress2">Assign Role<span class="text-danger">*</span></label>
                        <select id="inputState" class="form-control" name="user_type">
                            <option value="">Select Assign Role</option>
                            <option value="1" {{ old('user_type', $user->user_type ?? '') == 1 ? 'selected' : '' }}>National User</option>
                            <option value="2" {{ old('user_type', $user->user_type ?? '') == 2 ? 'selected' : '' }}>Laboratory user</option>
                            <option value="3" {{ old('user_type', $user->user_type ?? '') == 3 ? 'selected' : '' }}>State user</option>
                        </select>
                        @error('user_type')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 pe-1">
                        <label class="form-label" for="inputAddress2">Status<span class="text-danger">*</span></label>
                        <select id="inputState" class="form-control" name="status">
                            <option value="" {{ old('status', $user->status ?? '') === null ? 'selected' : '' }}>Select status</option>
                            <option value="1" {{ old('status', $user->status ?? '') == 1 ? 'selected' : '' }}>Enable</option>
                            <option value="0" {{ old('status', $user->status ?? '') === '0' ? 'selected' : '' }}>Disable</option>
                        </select>
                        @error('status')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                        
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">

                        <button type="submit" class="btn btn-primary w-auto">Save</button>
                        <button type="reset" class="btn btn-danger w-auto ml-2">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="dashboard">
        <div class="dashboard-filter mb-4">
            <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                <div id="general_profile_success"></div>

                <div class="table-responsive">
                <table id="general_profiles_TABLE" class="display general ">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr id="tr_{{$user->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td class="text-nowrap">{{ucfirst($user->name)}}</td>
                            <td>{{@$user->email}}</td>
                            <td>{{(@$user->user_type == '1') ? 'National User' : ((@$user->user_type == '2') ? 'Laboratory User' : 'State User') }}</td>
                            <td>@php if($user->status ==1){ echo 'Active'; }else{ echo 'Deactive'; } @endphp</td>
                            <td>
                                <a href="{{route('admin.edit',$user->id)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{route('admin.delete',$user->id)}}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                
            </div>
        </div>
    </div>

</div>

@endsection