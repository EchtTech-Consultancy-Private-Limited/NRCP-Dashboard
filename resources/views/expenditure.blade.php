@extends('layouts.main')
@section('title')
{{__('Finance Form')}}
@endsection
@section('content')

<div class="container-fluid">

    <div class="dashboard">
        <div class="dashboard-filter finance-form mb-4">
            <form action="{{ route('expenditure-add') }}" method="post" class="" id="rabies_detail_test">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="state">Financial Year<span class="star">*</span></label>
                            <!-- <select class="form-select" aria-label="Default select example" name="financial_year" id="financial_year">
                                            <option value=""> Select</option>
                                            <option value='yes'>Yes</option>
                                            <option value='no'>No</option>
                                        </select> -->
                            <input type="text" class="form-control" value="{{ old('financial_year') }}"
                                aria-label="Default select example" data-date="date" name="financial_year"
                                id="financial_year" placeholder="DD-MM-YYYY">
                            @error('financial_year')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="district">Fund Received<span class="star">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="fund_recieved"
                                id="fund_recieved">
                                <option value="">Select Your Fund Received</option>
                                @if(old('fund_recieved'))
                                <option value="{{ old('fund_recieved') }}" selected>
                                    {{ old('fund_recieved') }}
                                </option> @endif
                                <option value='Yes'>Yes</option>
                                <option value='No'>No</option>
                            </select>
                            @error('fund_recieved')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fromYear">Equipment Purchase(Financial Year Wise)<span
                                    class="star">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="equipment_purchase"
                                id="equipment_purchase">
                                <option value=""> Select </option>
                                @foreach($equipment_purchase_masters as $equipment_purchase_master)
                                <option value='{{$equipment_purchase_master->name}}'
                                    {{ ($equipment_purchase_master->name == old('equipment_purchase') ? 'selected' : '') }}>
                                    {{$equipment_purchase_master->name}}</option>
                                @endforeach
                            </select>
                            @error('equipment_purchase')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col search-reset">
                        <div class="apply-filter mt-4 pt-1">
                            <button type="submit" class="btn bg-primary search-patient-btn mt-0 mr-3">Save</button>
                            <button type="reset" class="btn bg-danger">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="dashboard">
        <div class="dashboard-filter mb-4">
        <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                                <table id="general_profiles_TABLE" class="display ">
                                    <thead>
                                        <tr>
                                            <th>Sr.No.</th>
                                            <th>Financial Year</th>
                                            <th>Fund Received</th>
                                            <th>Equipment Purchase</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expenditure as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d-m-Y',strtotime($data->financial_year))}}</td>
                                            <td>{{$data->fund_recieved}}</td>
                                            @foreach($equipment_purchase_masters as $equipment_purchase_master)
                                            @if($data->equipment_purchase == $equipment_purchase_master->name)
                                            <td>{{$equipment_purchase_master->name}}</td>
                                            @endif
                                            @endforeach
                                            <td class="text-nowrap">
                                                <a href="{{ url('expenditure-edit',$data->id) }}"
                                                    class="btn btn-primary editbtn btn-sm" title="Edit"><i
                                                        class="fa fa-pencil"></i> </a>
                                                <a href="javascript:void(0)"
                                                    data-url="{{ route('expenditure-destroy', $data->id) }}"
                                                    class="btn btn-danger deletebtn btn-sm delete-user"
                                                    title="Delete" id="delete">
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
@endsection