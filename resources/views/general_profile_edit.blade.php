@extends('layouts.main') 
@section('title')
{{__('General Laboratory Edit')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                            <form  action="{{ route('general-update') }}" method="post" class="" id="general_profile_submit">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id" value="{{$general_profile->id}}" >
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="state">State<span class="star">*</span></label>
                                            <input type="text" name="state" id="state" value="{{$general_profile->state}}" class="form-control" />
                                            @error('state') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="district">Hospital<span class="star">*</span></label>
                                            <input type="text" name="hospital" id="hospital" value="{{$general_profile->hospital}}" class="form-control" />
                                            @error('hospital') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="fromYear">Nodal Officer<span class="star">*</span></label>
                                            <input type="text" name="designation" id="designation" value="{{$general_profile->designation}}" class="form-control"/>
                                            <small id="designation-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="toYear">Contact Number<span class="star">*</span></label>
                                            <input type="number" name="contact_number" id="contact_number" value="{{$general_profile->contact_number}}" class="form-control"/>
                                            <small id="contact_number-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="diseasesSyndromes">Mou<span class="star">*</span></label>
                                            <select class="form-control" aria-label="Default select example" name="mou" id="mou" onChange="handleFilterValue()">
                                                <option value=""> Select </option>
                                                <option value="yes" <?php if($general_profile->mou == 'yes'){ echo 'selected'; }else{ echo ''; } ?>>Yes</option>
                                                <option value="no" <?php if($general_profile->mou == 'yes'){ echo 'selected'; }else{ echo ''; } ?>>No</option>
                                            </select>
                                            <small id="mou-error" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="formType">Joining Date of NRCP<span class="star">*</span></label>
                                            <input type="date" name="date_of_joining" id="date_of_joining" value="{{$general_profile->date_of_joining}}" class="form-control"/>
                                            <small id="date_of_joining-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                        <div class="apply-filter mt-4 pt-1">
                                            <button type="submit" class="btn bg-primary mr-3">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection