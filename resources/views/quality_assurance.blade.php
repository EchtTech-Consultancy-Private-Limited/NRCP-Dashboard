@extends('layouts.main') 
@section('title')
{{__('Quality Assurance')}}
@endsection
@section('content')
<div class="container-fluid">
<div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                            <form action="{{ route('quality-add') }}" method="post" class="" id="quality_assurance">
                                 @csrf
                                 <div class="row">
                                    <div class="col-lg-2 col-md-2 col-6">
                                       <div class="form-group">
                                          <label for="state">PTILCPR<span class="star" tooltip>*</span></label>
                                          <select class="form-select" aria-label="Default select example" name="pt" id="pt">
                                             <option value=""> Select </option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                            @error('pt') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                       </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-6">
                                       <div class="form-group">
                                          <label for="district">PTPNABL(ISO 17043)<span class="star">*</span></label>
                                          <select class="form-select" aria-label="Default select example" name="accredited_pt" id="accredited_pt">
                                             <option value=""> Select</option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                            @error('accredited_pt') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="fromYear">LSPTISO 15189/ISO17025<span class="star">*</span></label>
                                          <select class="form-select" aria-label="Default select example" name="supervisors_trained" id="supervisors_trained">
                                             <option value=""> Select</option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="supervisors_trained-error" class="form-text text-muted"></small>
                                       </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-6">
                                       <div class="form-group">
                                          <label for="diseasesSyndromes">LIMS available<span class="star">*</span></label>
                                          <select class="form-select" name="lims" id="lims">
                                             <option value=""> Select</option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="lims-error" class="form-text text-muted"></small>
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
                        <div id="quality_assurance_success"></div>
                        <table id="general_profiles_TABLE" class="display">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>PTILCPR</th>
                                    <th>PTPNABL(ISO 17043)</th>
                                    <th>LSPTISO 15189/ISO17025</th>
                                    <th>LIMS available</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quality_assurances as $data)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->pt}}</td>
                                    <td>{{$data->accredited_pt}}</td>
                                    <td>{{$data->supervisors_trained}}</td>
                                    <td>{{$data->lims}}</td>
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
                        <!-- <table id="table_quality_assurance" class="table">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>Proficiency Testing</th>
                                 <th>Nabl</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table> -->
                     </div>
                  </div>
                  
                  <!-- <div class="modal fade" id="edit_quality_assurance" tabindex="-1" role="dialog"
                     aria-labelledby="editListingModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="edit_quality_assurance">GeneralProfile
                              </h5>
                              <button type="button" class="close" data-dismiss="modal"
                                 aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form class="myForm" id="quality_assurance_submit">
                                 @csrf
                                 <div class="row">
                                    <input type="hidden" id="quality_assurance_update">
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="state">Proficincy Testing\ILC
                                          Provider/Reciever or getting panels for same?<span
                                             class="star">*</span></label>
                                          <select class="form-select"
                                             aria-label="Default select example" name="pt"
                                             id="edit_pt">
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
                                          <label for="district">Are you accredited as Proficiency
                                          Testing Provider by NABL(ISO 17043)/others?<span
                                             class="star">*</span></label>
                                          <select class="form-select"
                                             aria-label="Default select example"
                                             name="accredited_pt" id="edit_accredited_pt">
                                             <option value=""> Select
                                             </option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="accredited_pt-error"
                                             class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="fromYear">Are the laboratory
                                          supervisors/personnel trained in ISO
                                          15189/ISO17025/any other relevant standard?<span
                                             class="star">*</span></label>
                                          <select class="form-select"
                                             aria-label="Default select example"
                                             name="supervisors_trained"
                                             id="edit_supervisors_trained">
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
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="diseasesSyndromes">Laboratory Information
                                          Management Services(LIMS)available?<span
                                             class="star">*</span></label>
                                          <select class="form-select" name="lims"
                                             id="edit_lims">
                                             <option value=""> Select
                                             </option>
                                             <option value='yes'>Yes</option>
                                             <option value='no'>No</option>
                                          </select>
                                          <small id="lims-error" class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                       <div class=" apply-filter">
                                          <button type="submit" id="submit-btn"
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