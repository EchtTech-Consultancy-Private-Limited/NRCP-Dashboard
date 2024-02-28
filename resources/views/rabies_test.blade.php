@extends('layouts.main') 
@section('title')
{{__('Rabies Test')}}
@endsection
@section('content')
<div class="container-fluid">
      <div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                           <form action="{{ route('rabies-test-carried') }}" method="post" class="" id="rabies_detail_test">
                              @csrf
                              <div class="row">
                                 <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                       <label for="state">Date<span class="star">*</span></label>
                                       <input type="date" class="form-control" aria-label="Default select example" name="date" id="date">
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
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
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
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
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
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
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
                                       <option value='yes'>Yes</option>
                                       <option value='no'>No</option>
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
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
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
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
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
                                          <option value='yes'>Yes</option>
                                          <option value='no'>No</option>
                                       </select>
                                       
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3 col-6 search-reset">
                                    <div class="apply-filter mt-4 pt-1">
                                       <button type="submit" class="btn bg-primary mr-3">Save</button>
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
   <div class="row">
      <div class="clearfix hidden-md-up"></div>
      <div class="col-md-12">
         <div class="card card-primary dashboard">
            <div class="form-tab">
               <div class="bootstrap-tab">
                  <div class="tab-content" id="myTabContent">
                     <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                     <table id="general_profiles_TABLE" class="display">
                           <thead>
                              <tr>
                                 <th>Sr.No.</th>
                                 <th>Date</th>
                                 <th>Patients No.</th>
                                 <th>Sample Recieved</th>
                                 <th>Type</th>
                                 <th>Diagnosis</th>
                                 <th>Test</th>
                                 <th>Positives</th>
                                 <th>IHIP</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($rabies_test as $data)
                              <tr>
                                 <td>{{$data->id}}</td>
                                 <td>{{$data->date}}</td>
                                 <td>{{$data->number_of_patients}}</td>
                                 <td>{{$data->numbers_of_sample_recieved}}</td>
                                 <td>{{$data->type}}</td>
                                 <td>{{$data->method_of_diagnosis}}</td>
                                 <td>{{$data->numbers_of_test}}</td>
                                 <td>{{$data->numbers_of_positives}}</td>
                                 <td>{{$data->numbers_of_intered_ihip}}</td>
                                 <td>
                                 <a href="{{ url('rabies-test-edit',$data->id) }}" class="btn btn-primary editbtn btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                 <a href="javascript:void(0)" data-url="{{ route('rabies-test-destroy', $data->id) }}" class="btn btn-danger deletebtn btn-sm delete-user" title="Delete Data" id="delete">
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
      </div>
   </div>
</div>
@endsection