@extends('layouts.main')
@section('title')
{{__('Expenditure')}}
@endsection
@section('content')
<style>
   @media print {
   /* Add styles for print here */
   #container {
   /* Adjust map styles for print */
   width: 100%;
   /* Adjust as needed */
   }
   .detailsDatas {
   /* Adjust table styles for print */
   width: 100%;
   /* Adjust as needed */
   }
   /* Add other print-specific styles as needed */
   }
</style>
<div class="container-fluid">
    <div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                           <form action="{{ route('expenditure-add') }}" method="post" class="" id="rabies_detail_test">
                              @csrf
                              <div class="row">
                                <div class="col-lg-2 col-md-2 col-6">
                                    <div class="form-group">
                                        <label for="state">Financial Year<span
                                            class="star">*</span></label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="financial_year" id="financial_year">
                                            <option value=""> Select
                                            </option>
                                            <option value='yes'>Yes</option>
                                            <option value='no'>No</option>
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
                                            <option value='yes'>Yes</option>
                                            <option value='no'>No</option>
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
                                            <option value='yes'>Yes</option>
                                            <option value='no'>No</option>
                                        </select>
                                        @error('equipment_purchase') 
                                          <span class="form-text text-muted">{{ $message }}</span>
                                       @enderror 
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
                                 <th>Financial Year</th>
                                 <th>Fund Recieved</th>
                                 <th>Equipment Purchase</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($expenditure as $data)
                              <tr>
                                 <td>{{$data->id}}</td>
                                 <td>{{$data->financial_year}}</td>
                                 <td>{{$data->fund_recieved}}</td>
                                 <td>{{$data->equipment_purchase}}</td>
                                 <td>
                                 <a href="" class="btn btn-primary editbtn btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                 <a href="" class="btn btn-danger deletebtn btn-sm" title="Delete Data" id="delete">
                                       <i class="fa fa-trash"></i>
                                 </a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                     </table>
                     </div>
                  </div>
                  <div class="modal fade" id="expenditure_save" tabindex="-1" role="dialog"
                     aria-labelledby="editListingModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="expenditure_save">GeneralProfile</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form class="myForm" id="expenditure">
                                 @csrf
                                 <div class="row">
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="state">Financial Year<span
                                             class="star">*</span></label>
                                          <select class="form-select" aria-label="Default select example"
                                             name="financial_year" id="financial_year">
                                             <option value=""> Select
                                             </option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="pt-error" class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="district">Fund Recieved<span
                                             class="star">*</span></label>
                                          <select class="form-select" aria-label="Default select example"
                                             name="fund_recieved" id="fund_recieved">
                                             <option value=""> Select
                                             </option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="accredited_pt-error" class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="fromYear">Equipment Purchase(Financial Year
                                          Wise)<span class="star">*</span></label>
                                          <select class="form-select" aria-label="Default select example"
                                             name="equipment_purchase" id="equipment_purchase">
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
                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                       <div class=" apply-filter">
                                          <button type="submit" id="submit"
                                             class="btn  bg-primary text-light apply-filter button border-0 mr-2">Save</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="modal fade" id="expenditure_edit" tabindex="-1" role="dialog"
                     aria-labelledby="editListingModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="expenditure_edit">Expenditure</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form class="myForm" id="edit_expenditure">
                                 @csrf
                                 <div class="row">
                                    <input type="hidden" id="expenditure_edit_type">
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="state">Financial Year<span
                                             class="star">*</span></label>
                                          <select class="form-select"
                                             aria-label="Default select example" name="financial_year"
                                             id="edit_financial_year">
                                             <option value=""> Select
                                             </option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="pt-error" class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="district">Fund Recieved<span
                                             class="star">*</span></label>
                                          <select class="form-select"
                                             aria-label="Default select example" name="fund_recieved"
                                             id="edit_fund_recieved">
                                             <option value=""> Select
                                             </option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="accredited_pt-error" class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="fromYear">Equipment Purchase(Financial Year
                                          Wise)<span class="star">*</span></label>
                                          <select class="form-select"
                                             aria-label="Default select example"
                                             name="equipment_purchase" id="edit_equipment_purchase">
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
                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                       <div class=" apply-filter">
                                          <button type="submit" id="submit_edit_expenditure"
                                             class="btn  bg-primary text-light apply-filter button border-0 mr-2">Save</button>
                                       </div>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection