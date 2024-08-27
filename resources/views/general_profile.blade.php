@extends('layouts.main')
@section('title')
{{__('General Laboratory Form')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='dashboard'>
        <div class="dashboard-filter mb-4 general-profile-filter">
            <form action="{{ route('general-save') }}" method="post" class="" id="general_profile">
                @csrf
                <div class="row ">
                    <div class="col">
                        <div class="form-group">
                            <label for="state">State<span class="star">*</span></label>
                            <select class="form-select state click-function" aria-label="Default select example"
                                id="state" name="state" onChange="handleFilterValue();handleDistrict()">
                                <option value="" selected state-name=""> Select
                                    State
                                </option>
                                @foreach (state_list() as $state)
                                <option value="{{ $state->state_name }}"
                                    {{ ($state->state_name == old('state')) ? 'selected' : ''}}>
                                    {{ ucfirst($state->state_name) ?? '' }}
                                </option>
                                @endforeach
                            </select>
                            @error('state')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="district">Hospital<span class="star">*</span></label>
                            <input type="text" name="hospital" value="{{ old('hospital') }}" id="hospital"
                                maxlength="45" class="form-control" placeholder="Enter Hospital Name"/>
                            @error('hospital')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fromYear">Nodal Officer</label>
                            <input type="text" name="designation" value="{{ old('designation') }}" id="designation"
                                maxlength="45" class="form-control" placeholder="Enter Nodal Officer Name"/>
                            <small id="designation-error" class="form-text text-muted"> </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="toYear">Contact Number</label>
                            <input type="text" name="contact_number" value="{{ old('contact_number') }}"
                                id="contact_number" minlength="10" maxlength="10" oninput="validateInput(this)"   class="form-control" placeholder="Enter Contact Number"/>
                            <small id="contact_number-error" class="form-text text-muted"> </small>
                            @error('contact_number')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col">
                                        <div class="form-group">
                                            <label for="diseasesSyndromes">Mou</label>
                                            <select class="form-control" aria-label="Default select example" name="mou" id="mou" onChange="handleFilterValue()">
                                                <option value=""> Select </option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            <small id="mou-error" class="form-text text-muted"></small>
                                        </div>
                                    </div> --}}
                    <div class="col">
                        <div class="form-group">
                            <label for="formType">Joining Date of NRCP</label>
                            <input type="date" name="date_of_joining" value="{{ old('date_of_joining') }}"
                                id="date_of_joining" class="form-control" placeholder="DD-MM-YYYY" />
                            <small id="date_of_joining-error" class="form-text text-muted"> </small>
                        </div>
                    </div>
                    <div class="col  search-reset">
                        <div class="apply-filter mt-4 pt-1">
                            <button type="submit" class="btn bg-primary search-patient-btn mr-3 mt-0">Save</button>
                            <button type="reset" class="btn bg-danger" onClick="window.location.reload();">Reset</button>
                        </div>
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
                            <th>State</th>
                            <th>Hospital</th>
                            <th>Nodal Officer</th>
                            <th>Contact Number</th>
                            <th>Joining Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($general_profile as $general_profiles)
                        <tr id="tr_{{$general_profiles->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td class="text-nowrap">{{ucfirst($general_profiles->state)}}</td>
                            <td>{{@$general_profiles->hospital}}</td>
                            <td>{{@$general_profiles->designation}}</td>
                            <td>{{@$general_profiles->contact_number}}</td>
                            <td>{{ $general_profiles->date_of_joining ? date('d-m-Y',strtotime($general_profiles->date_of_joining)) : ''}}
                            </td>
                            <td class="text-nowrap">
                                <a href="{{ url('general-edit',$general_profiles->id) }}" class="btn btn-primary btn-sm"
                                    title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                <a href="javascript:void(0)"
                                    data-url="{{ route('general-laboratory-destroy', $general_profiles->id) }}"
                                    class="btn btn-danger deletebtn btn-sm delete-user" title="Delete Data" id="delete">
                                    <i class="fa fa-trash"></i>
                                </a>
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