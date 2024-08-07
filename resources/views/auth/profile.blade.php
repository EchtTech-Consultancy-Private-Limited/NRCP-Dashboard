@extends('layouts.main')
@section('title')
{{__('User List')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='dashboard'>
        <div class="dashboard-filter mb-4 general-profile-filter">
            <form>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress">Name<span class="text-danger">*</span></label>
                        <input disabled type="text" name="name" value="{{ old('name', @$user->name ?? '') }}" class="form-control" placeholder="Enter Name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress">Email<span class="text-danger">*</span></label>
                        <input disabled type="text" name="email" value="{{ old('email', @$user->email ?? '') }}" class="form-control" placeholder="Enter Email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> 
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">State Name<span class="text-danger">*</span></label>
                        <select id="state_name" class="form-control" name="state_id" disabled>
                            <option value="">Select State Name</option>
                            @foreach($states as $statelist)
                                <option value="{{ $statelist->id }}" {{ old('state_id', @$user->state_id ?? '') == $statelist->id ? 'selected' : '' }}>
                                    {{ ucfirst(@$statelist->state_name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('state_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="institute_name">Institute Name <span class="text-danger">*</span></label>
                        <select id="institute_name" class="form-control" name="institute_id" disabled>
                            <option>Select Institute Name</option>
                            @foreach ($institutes as $institute)
                                @if ($institute->id == $user->lab_id)
                                  <option value="{{ @$institute->id }}" {{ @$institute->id == $user->lab_id ? 'selected' : '' }} >{{ $institute->name }}</option> 
                                @endif
                            @endforeach
                        </select>
                        @error('institute_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 pe-1">
                        <label class="form-label" for="inputAddress2">Assign Role<span class="text-danger">*</span></label>
                        <select id="inputState" class="form-control" name="user_type" disabled>
                            <option value="">Select Assign Role</option>
                            <option value="1" {{ old('user_type', @$user->user_type ?? '') == 1 ? 'selected' : '' }}>National User</option>
                            <option value="2" {{ old('user_type', @$user->user_type ?? '') == 2 ? 'selected' : '' }}>Laboratory user</option>
                            <option value="3" {{ old('user_type', @$user->user_type ?? '') == 3 ? 'selected' : '' }}>State user</option>
                        </select>
                        @error('user_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 pe-1">
                        <label class="form-label" for="inputAddress2">Status<span class="text-danger">*</span></label>
                        <select id="inputState" class="form-control" name="status" disabled>
                            <option value="">Select status</option>
                            <option value="1" {{ old('status', @$user->status ?? '') == 1 ? 'selected' : '' }}>Enable</option>
                            <option value="0" {{ old('status', @$user->status ?? '') == 0 ? 'selected' : '' }}>Disable</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection