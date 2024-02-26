@extends('layouts.main') 
@section('title')
{{__('Rabies Test')}}
@endsection
@section('content')
<div class="card-category-1">
   <div class="basic-card basic-card-aqua">
      <div class="card-content">
         <span class="card-title">General</span>
         <p class="card-text">{{ $GeneralProfileTotal }}.00</p>
      </div>
      <div class="card-link">
         <a href="{{ route('general-laboratory') }}" title="Read Full"><span>Read Full</span></a>
      </div>
   </div>
   <div class="basic-card basic-card-lips">
      <div class="card-content">
         <span class="card-title">Quality Assurance</span>
         <p class="card-text">{{ $QualityAssuranceTotal }}.00</p>
      </div>
      <div class="card-link">
         <a href="{{ route('quality-assurance') }}" title="Read Full"><span>Read Full</span></a>
      </div>
   </div>
   <div class="basic-card basic-card-light">
      <div class="card-content">
         <span class="card-title">Equipment</span>
         <p class="card-text">{{ $EquipmentsTotal }}.00</p>
      </div>
      <div class="card-link">
         <a href="{{ route('equipment') }}" title="Read Full"><span>Read Full</span></a>
      </div>
   </div>
   <div class="basic-card basic-card-dark">
      <div class="card-content">
         <span class="card-title">Rabies</span>
         <p class="card-text">{{ $RabiesTestTotal }}.00</p>
      </div>
      <div class="card-link">
         <a href="{{ route('rabies-test') }}" title="Read Full"><span>Read Full</span></a>
      </div>
   </div>
   <div class="basic-card basic-card-dark-1">
      <div class="card-content">
         <span class="card-title">Expenditure</span>
         <p class="card-text">{{ $ExpenditureTotal }}.00</p>
      </div>
      <div class="card-link">
         <a href="{{ route('expenditure') }}" title="Read Full"><span>Read Full</span></a>
      </div>
   </div>
    
</div>
<div class="container-fluid">
        <div class='row'>
            <div class="col-md-12">
                <div class="card card-primary dashboard">
                    <div class="form-tab">
                        <div class="bootstrap-tab">
                            <div class="tab-content" id="myTabContent">
                                <form action="{{ route('report-export') }}" method="post" class="" id="rabies_detail_test">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="form-group">
                                                <label for="state">Module<span class="star">*</span></label>
                                                <select class="form-select" aria-label="Default select example" name="modulename" id="modulename">
                                                    <option value='1'>General</option>
                                                    <option value='2'>Quality</option>
                                                    <option value='3'>Equipment</option>
                                                    <option value='4'>Rabies</option>
                                                    <option value='5'>Expenditure</option>
                                                </select>
                                                @error('modulename') 
                                                    <span class="form-text text-muted">{{ $message }}</span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="form-group">
                                                <label for="district">Start Date<span class="star">*</span></label>
                                                <input type="date" name="startdate" class="form-control">
                                                @error('startdate') 
                                                    <span class="form-text text-muted">{{ $message }}</span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="form-group">
                                                <label for="fromYear">End Date<span class="star">*</span></label>
                                                <input type="date" name="enddate" class="form-control">
                                                @error('enddate') 
                                                    <span class="form-text text-muted">{{ $message }}</span>
                                                @enderror 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-6 search-reset">
                                            <div class="apply-filter mt-4 pt-1">
                                                <button type="submit" class="btn bg-primary mr-3" name="bthValue" value="excel">Export Excel</button>
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