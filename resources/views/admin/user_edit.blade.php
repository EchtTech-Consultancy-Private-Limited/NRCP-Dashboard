@extends('layouts.main')
@section('title')
{{__('User List')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='dashboard'>
        <div class="dashboard-filter mb-4 general-profile-filter">
            <form method="post" action="{{ route('admin.update', $user->id) }}">
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
                        <input type="text" class="form-control" name="password" value="{{ old('password') }}" maxlength="12" id="password" placeholder="Enter Password">
                        @error('password')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">State Name<span class="text-danger">*</span></label>
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
                    <div class="col-md-4">
                        <label class="form-label" for="institute_name">Institute Name </label>
                        <select id="institute_name" class="form-control" name="institute_id">
                            <option>Select Institute Name</option>
                            @foreach ($institutes as $institute)
                                @if ($institute->id == $user->lab_id)
                                  <option value="{{ $institute->id }}" {{ $institute->id == $user->lab_id ? 'selected' : '' }} >{{ $institute->name }}</option> 
                                @endif
                            @endforeach
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
                            <option value="">Select status</option>
                            <option value="1" {{ old('status', $user->status ?? '') == 1 ? 'selected' : '' }}>Enable</option>
                            <option value="0" {{ old('status', $user->status ?? '') == 0 ? 'selected' : '' }}>Disable</option>
                        </select>
                        @error('status')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-danger w-auto ml-2">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection