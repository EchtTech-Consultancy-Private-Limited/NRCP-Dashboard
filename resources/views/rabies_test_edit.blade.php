@extends('layouts.main') 
@section('title')
{{__('Rabies Test Edit')}}
@endsection
@section('content')
<div class="container-fluid">
      <div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                           <form action="{{ route('rabies-update') }}" method="post" class="" id="rabies_detail_test">
                              @csrf
                              <div class="row">
                                 <input type="hidden" name="id" value="{{$rabiestest->id}}" >
                                 <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                       <label for="state">Date<span class="star">*</span></label>
                                       <input type="date" class="form-control" aria-label="Default select example" name="date" id="date" value="{{$rabiestest->date}}">
                                       @error('date') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                       <label for="district">Number of Patients<span class="star">*</span></label>
                                       <select class="form-control" aria-label="Default select example" name="number_of_patients" id="number_of_patients">
                                          <option value=""> Select</option>
                                          <option value='yes' <?php if($rabiestest->number_of_patients == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                          <option value='no' <?php if($rabiestest->number_of_patients == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                       </select>
                                       @error('number_of_patients') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                       <label for="fromYear">Numbers of Sample Recieves<span
                                          class="star">*</span></label>
                                       <select class="form-control" aria-label="Default select example"
                                          name="numbers_of_sample_recieved"
                                          id="numbers_of_sample_recieved">
                                          <option value=""> Select
                                          </option>
                                          <option value='yes' <?php if($rabiestest->numbers_of_sample_recieved == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                          <option value='no' <?php if($rabiestest->numbers_of_sample_recieved == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                       </select>
                                       <small id="supervisors_trained-error"
                                          class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Type of Sample<span
                                          class="star">*</span></label>
                                       <select class="form-control" name="type" id="type">
                                          <option value=""> Select
                                          </option>
                                          <option value='yes' <?php if($rabiestest->type == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                          <option value='no' <?php if($rabiestest->type == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                       </select>
                                       @error('type') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label for="diseasesSyndromes">Method of Diagnosis<span
                                       class="star">*</span></label>
                                    <select class="form-control" name="method_of_diagnosis"
                                       id="method_of_diagnosis">
                                       <option value=""> Select
                                       </option>
                                       <option value='yes' <?php if($rabiestest->method_of_diagnosis == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                       <option value='no' <?php if($rabiestest->method_of_diagnosis == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                    </select>
                                    <small id="lims-error" class="form-text text-muted">
                                    </small>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Numbers of Test Conducted<span
                                          class="star">*</span></label>
                                       <select class="form-control" name="numbers_of_test"
                                          id="numbers_of_test">
                                          <option value=""> Select
                                          </option>
                                          <option value='yes' <?php if($rabiestest->numbers_of_test == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                          <option value='no' <?php if($rabiestest->numbers_of_test == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                       </select>
                                       <small id="lims-error" class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Total Numbers of Positives<span
                                          class="star">*</span></label>
                                       <select class="form-control" name="numbers_of_positives"
                                          id="numbers_of_positives">
                                          <option value=""> Select
                                          </option>
                                          <option value='yes' <?php if($rabiestest->numbers_of_positives == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                          <option value='no' <?php if($rabiestest->numbers_of_positives == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                       </select>
                                       <small id="lims-error" class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Numbers Entered into theIHIP<span class="star">*</span></label>
                                       <select class="form-control" name="numbers_of_intered_ihip" id="numbers_of_intered_ihip">
                                          <option value=""> Select</option>
                                          <option value='yes' <?php if($rabiestest->numbers_of_intered_ihip == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes</option>
                                          <option value='no' <?php if($rabiestest->numbers_of_intered_ihip == 'no'){ echo 'selected'; }else{ echo '';} ?>>No</option>
                                       </select>
                                       
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