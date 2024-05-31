@extends('layouts.main') 
@section('title')
{{__('Report Generate')}}
@endsection
@section('content')
<div class="container-fluid">
        <div class='row'>
            <div class="col-md-12">
                <div class="card card-primary dashboard">
                    <div class="form-tab">
                        <div class="bootstrap-tab">
                            <div class="tab-content" id="myTabContent">
                                <form action="{{ route('national-report-export') }}" method="post" class="">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="form-group">
                                                <label for="state">Module<span class="star">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="modulename" id="modulename">
                                                    <option value="">Select Module</option>
                                                    <option value='1'>Laboratory Dashboard</option>
                                                </select>
                                                @error('modulename') 
                                                    <span class="form-text text-muted">{{ $message }}</span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="form-group">
                                                <label for="district">From Date</label>
                                                <input type="date" name="startdate" class="form-control">
                                                @error('startdate') 
                                                    <span class="form-text text-muted">{{ $message }}</span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="form-group">
                                                <label for="fromYear">To Date</label>
                                                <input type="date" name="enddate" class="form-control">
                                                @error('enddate') 
                                                    <span class="form-text text-muted">{{ $message }}</span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-6 search-reset">
                                            <div class="apply-filter mt-4 pt-1">
                                                <button type="submit" class="btn bg-primary search-patient-btn mt-0 mr-3" name="bthValue" value="excel">Export Excel</button>
                                                <!-- <button type="submit" class="btn bg-primary mr-3" name="bthValue" value="pdf">Download PDF</button> -->
                                                <button type="reset" class="btn bg-danger">Reset</button>
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