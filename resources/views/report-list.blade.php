@extends('layouts.main')
@section('title')
{{__('Report List')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard">
        <div class="dashboard-filter mb-4">
            <form action="{{ route('report-export') }}" method="post" class="one_time_submit_form" id="rabies_detail_test">
                @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="form-group">
                            <label for="state">Module<span class="star">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="modulename"
                                id="modulename">
                                <option value="">Select Module</option>
                                <option value='1'>General</option>
                                <option value='2'>Quality</option>
                                <option value='3'>Equipment's</option>
                                <option value='4'>Rabies Test</option>
                                <option value='5'>Finance</option>
                            </select>
                            @error('modulename')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="form-group">
                            <label for="district">From Date</label>
                            <input type="text" name="startdate" class="form-control" data-date="date"
                                placeholder="DD-MM-YYYY">
                            @error('startdate')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="form-group">
                            <label for="fromYear">To Date</label>
                            <input type="text" name="enddate" class="form-control" data-date="date"
                                placeholder="DD-MM-YYYY">
                            @error('enddate')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                        <div class="apply-filter mt-4 pt-1">
                            <button type="submit" class="btn bg-primary search-patient-btn mt-0 mr-1" name="bthValue"
                                value="excel">Export Excel</button>
                            <!-- <button type="submit" class="btn bg-primary mr-3" name="bthValue" value="pdf">Download PDF</button> -->
                            <button type="reset" class="btn bg-danger">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection