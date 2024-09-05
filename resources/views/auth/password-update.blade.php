@extends('layouts.main')
@section('title')
{{__('User List')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='dashboard'>
        <div class="dashboard-filter mb-4 general-profile-filter">
            <form method="POST" action="{{ route('change-password', Auth::user()->id) }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">Old Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="oldpassword" id="oldpassword" placeholder="Old Password">
                        @error('oldpassword')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="inputAddress2">New Password<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                        @error('newpassword')
                            <span class="form-text text-muted">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>   
            </form>
        </div>
    </div>
</div>
@endsection