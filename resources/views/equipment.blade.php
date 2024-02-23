@extends('layouts.main') 
@section('title')
{{__('Equipments')}}
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
                            <form action="{{ route('equipment-add') }}" method="post" class="" id="general_equipment">
                                @csrf
                                <div class="row">
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="state">Equipment<span class="star">*</span></label>
                                        <select class="form-control" aria-label="Default select example" name="equipment" id="equipment">
                                            <option value=""> Select</option>
                                            <option value='yes'>Yes</option>
                                            <option value='no'>No</option>
                                        </select>
                                            @error('equipment') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="district">Quantity<span class="star">*</span></label>
                                        <input type="number" class="form-control" aria-label="Default select example" name="quantity" id="quantity">
                                        </select>
                                            @error('quantity') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="fromYear">Year of purchase<span class="star">*</span></label>
                                        <input type="date"t class="form-control" aria-label="Default select example" name="year_of_purchase" id="year_of_purchase">
                                            @error('year_of_purchase') 
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
                                    <th>Equipment</th>
                                    <th>Quantity</th>
                                    <th>Year Of Purchase</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($equipment as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->equipment}}</td>
                                    <td>{{$data->quantity}}</td>
                                    <td>{{$data->year_of_purchase}}</td>
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
                  
                  <!-- <div class="modal fade" id="equipment_form" tabindex="-1" role="dialog"
                     aria-labelledby="editListingModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="edit">Equipments</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form class="myForm" id="equipment_modal">
                                 @csrf
                                 <div class="row">
                                    <input type="hidden" id="equipment_submit">
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="state">Equipment<span
                                             class="star">*</span></label>
                                          <select class="form-select"
                                             aria-label="Default select example" name="equipment"
                                             id="edit_equipment">
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
                                          <label for="district">Quantity<span
                                             class="star">*</span></label>
                                          <input type="number" class="form-select"
                                             aria-label="Default select example" name="quantity"
                                             id="edit_quantity">
                                          <small id="accredited_pt-error" class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="fromYear">Year of purchase<span
                                             class="star">*</span></label>
                                          <input type="date"t class="form-select"
                                             aria-label="Default select example"
                                             name="year_of_purchase" id="edit_year_of_purchase">
                                          <small id="supervisors_trained-error"
                                             class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                       <div class=" apply-filter">
                                          <button type="submit" id="submit-equipment"
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