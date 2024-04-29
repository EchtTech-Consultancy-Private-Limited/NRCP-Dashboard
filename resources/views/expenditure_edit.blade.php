@extends('layouts.main')
@section('title')
{{__('Finance Edit')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                           <form action="{{ route('expenditure-update') }}" method="post" class="" id="rabies_detail_test">
                              @csrf
                              <div class="row">
                              <input type="hidden" name="id" value="{{$expenditure->id}}" >
                                <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                        <label for="state">Financial Year<span class="star">*</span></label>
                                        <input type="date" class="form-control" aria-label="Default select example" name="financial_year" id="financial_year" value="{{$expenditure->financial_year}}">
                                        @error('financial_year') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                        <label for="district">Fund Recieved<span
                                            class="star">*</span></label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="fund_recieved" id="fund_recieved">
                                            <option value=""> Select
                                            </option>
                                            <option value='Yes'<?php if($expenditure->fund_recieved == 'Yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                            <option value='No'<?php if($expenditure->fund_recieved == 'No'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                        </select>
                                        @error('fund_recieved') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="form-group">
                                        <label for="fromYear">Equipment Purchase(Financial Year Wise)<span class="star">*</span></label>
                                        <select class="form-select" aria-label="Default select example" name="equipment_purchase" id="equipment_purchase">
                                        <option value=""> Select </option>
                                        @foreach($equipment_purchase_masters as $equipment_purchase_master)
                                        @if($expenditure->equipment_purchase == $equipment_purchase_master->name)
                                            <option value='{{$expenditure->equipment_purchase}}' selected>{{$equipment_purchase_master->name}}</option>
                                        @else
                                            <option value='{{$equipment_purchase_master->name}}'>{{$equipment_purchase_master->name}}</option>
                                       @endif
                                        @endforeach
                                        </select>
                                        @error('equipment_purchase') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
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