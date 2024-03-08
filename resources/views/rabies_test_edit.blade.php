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
                                       <input type="number" class="form-control" aria-label="Default select example" name="number_of_patients" id="number_of_patients" value="{{$rabiestest->number_of_patients}}">
                                       @error('number_of_patients') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                       <label for="fromYear">Numbers of Sample Recieves<span class="star">*</span></label>
                                       <input type="number" class="form-control" aria-label="Default select example" name="numbers_of_sample_recieved" id="numbers_of_sample_recieved" value="{{$rabiestest->numbers_of_sample_recieved}}">
                                       <small id="supervisors_trained-error"
                                          class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Type of Sample<span
                                          class="star">*</span></label>
                                       <select class="form-control" name="typefdte" id="typefdte">
                                          <option value=""> Select</option>
                                          <option value='For diagnosis' <?php if($rabiestest->type == 'For diagnosis'){ echo 'selected'; }else{ echo '';} ?>>For diagnosis</option>
                                          <option value='Titre estimation' <?php if($rabiestest->type == 'Titre estimation'){ echo 'selected'; }else{ echo '';} ?>>Titre estimation</option>
                                       </select>
                                       @error('type') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Type of Sample A<span class="star">*</span></label>
                                          <select class="form-control" name="typea" id="typea">
                                             @foreach($typea as $key=>$value)
                                             @if($rabiestest->typea == $key)
                                                <option value="{{$key}}" selected> {{$value}}</option>
                                             @else
                                                <option value="{{$key}}"> {{$value}}</option>
                                             @endif
                                             @endforeach
                                       </select>
                                       @error('type') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Type of Sample B<span class="star">*</span></label>
                                       <select class="form-control" name="typeb" id="typeb">
                                          @if(!empty($typeb))
                                          @foreach($typeb as $key=>$value)
                                          @if($rabiestest->typeb == $key)
                                             <option value="{{$key}}" selected> {{$value}}</option>
                                          @else
                                             <option value="{{$key}}"> {{$value}}</option>
                                          @endif
                                          @endforeach
                                          @endif
                                       </select>
                                       @error('type') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
                                    </div>
                                 </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                 <div class="form-group">
                                    <label for="diseasesSyndromes">Method of Diagnosis<span
                                       class="star">*</span></label>
                                    <select class="form-control" name="method_of_diagnosis" id="method_of_diagnosis">
                                       <option value=""> Select
                                       </option>
                                       <option value='NAAT' <?php if($rabiestest->method_of_diagnosis == 'NAAT'){ echo 'selected'; }else{ echo '';} ?>>NAAT</option>
                                       <option value='ELISA' <?php if($rabiestest->method_of_diagnosis == 'ELISA'){ echo 'selected'; }else{ echo '';} ?>>ELISA</option>
                                       <option value='PFFIT' <?php if($rabiestest->method_of_diagnosis == 'PFFIT'){ echo 'selected'; }else{ echo '';} ?>>PFFIT</option>
                                       <option value='DFAT' <?php if($rabiestest->method_of_diagnosis == 'DFAT'){ echo 'selected'; }else{ echo '';} ?>>DFAT</option>
                                       <option value='OTHERS' <?php if($rabiestest->method_of_diagnosis == 'OTHERS'){ echo 'selected'; }else{ echo '';} ?>>OTHERS</option>
                                    </select>
                                    <small id="lims-error" class="form-text text-muted">
                                    </small>
                                 </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Numbers of Test Conducted<span class="star">*</span></label>
                                       <!-- <select class="form-control" name="numbers_of_test" id="numbers_of_test">
                                          <option value=""> Select</option>
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
                                       </select> -->
                                       <input type="number" class="form-control" aria-label="Default select example" name="numbers_of_test" id="numbers_of_test" value="{{$rabiestest->numbers_of_test}}">
                                       <small id="lims-error" class="form-text text-muted"></small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Total Numbers of Positives<span class="star">*</span></label>
                                       <!-- <select class="form-control" name="numbers_of_positives" id="numbers_of_positives">
                                          <option value=""> Select</option>
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
                                       </select> -->
                                       <input type="number" class="form-control" aria-label="Default select example" name="numbers_of_positives" id="numbers_of_positives" value="{{$rabiestest->numbers_of_positives}}">
                                       <small id="lims-error" class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                       <label for="diseasesSyndromes">Numbers Entered into theIHIP<span class="star">*</span></label>
                                       <!-- <select class="form-control" name="numbers_of_intered_ihip" id="numbers_of_intered_ihip">
                                          <option value=""> Select</option>
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
                                       </select> -->
                                       <input type="number" class="form-control" aria-label="Default select example" name="numbers_of_intered_ihip" id="numbers_of_intered_ihip" value="{{$rabiestest->numbers_of_intered_ihip}}">
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