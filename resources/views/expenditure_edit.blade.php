@extends('layouts.main')
@section('title')
{{__('Expenditure Edit')}}
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
                                        <label for="state">Financial Year<span
                                            class="star">*</span></label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="financial_year" id="financial_year">
                                            <option value=""> Select
                                            </option>
                                            <option value='yes'<?php if($expenditure->financial_year == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                            <option value='no'<?php if($expenditure->financial_year == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                        </select>
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
                                            <option value='yes'<?php if($expenditure->fund_recieved == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                            <option value='no'<?php if($expenditure->fund_recieved == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                        </select>
                                        @error('fund_recieved') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="form-group">
                                        <label for="fromYear">Equipment Purchase(Financial Year
                                        Wise)<span class="star">*</span></label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="equipment_purchase" id="equipment_purchase">
                                            <option value=""> Select
                                            </option>
                                            <option value='yes'<?php if($expenditure->equipment_purchase == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                            <option value='no'<?php if($expenditure->equipment_purchase == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
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