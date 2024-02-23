@extends('layouts.main') 
@section('title')
{{__('General Laboratory')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class='row'>
        <div class="col-md-12">
            <div class="card card-primary dashboard">
                <div class="form-tab">
                    <div class="bootstrap-tab">
                        <div class="tab-content" id="myTabContent">
                            <form action="{{ route('general-save') }}" method="post" class="" id="general_profile">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="state">State<span class="star">*</span></label>
                                            <input type="text" name="state" id="state" class="form-control" />
                                            @error('state') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="district">Hospital<span class="star">*</span></label>
                                            <input type="text" name="hospital" id="hospital" class="form-control" />
                                            @error('hospital') 
                                                <span class="form-text text-muted">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="fromYear">Nodal Officer<span class="star">*</span></label>
                                            <input type="text" name="designation" id="designation" class="form-control"/>
                                            <small id="designation-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="toYear">Contact Number<span class="star">*</span></label>
                                            <input type="number" name="contact_number" id="contact_number" class="form-control"/>
                                            <small id="contact_number-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="diseasesSyndromes">Mou<span class="star">*</span></label>
                                            <select class="form-control" aria-label="Default select example" name="mou" id="mou" onChange="handleFilterValue()">
                                                <option value=""> Select </option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            <small id="mou-error" class="form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                        <div class="form-group">
                                            <label for="formType">Joining Date of NRCP<span class="star">*</span></label>
                                            <input type="date" name="date_of_joining" id="date_of_joining" class="form-control"/>
                                            <small id="date_of_joining-error" class="form-text text-muted"> </small>
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
                        <div id="general_profile_success"></div>
                        <table id="general_profiles_TABLE" class="display">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>State</th>
                                    <th>Hospital</th>
                                    <th>Nodal Officer</th>
                                    <th>Contact Number</th>
                                    <th>Mou</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($general_profile as $general_profiles)
                                <tr id="tr_{{$general_profiles->id}}">
                                    <td>{{$general_profiles->id}}</td>
                                    <td>{{$general_profiles->state}}</td>
                                    <td>{{$general_profiles->hospital}}</td>
                                    <td>{{$general_profiles->designation}}</td>
                                    <td>{{$general_profiles->contact_number}}</td>
                                    <td>{{$general_profiles->mou}}</td>
                                    <td>{{$general_profiles->date_of_joining}}</td>
                                    <td>
                                    <a href="" class="btn btn-primary editbtn btn-sm" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                    <a href="" class="btn btn-danger deletebtn btn-sm" title="Delete Data" id="delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{ url('general-laboratory-destroy',$general_profiles->id) }}" class="btn btn-danger btn-sm"
                                    data-tr="tr_{{$general_profiles->id}}"
                                    data-toggle="confirmation"
                                    data-btn-ok-label="Delete" data-btn-ok-icon="fa fa-remove"
                                    data-btn-ok-class="btn btn-sm btn-danger"
                                    data-btn-cancel-label="Cancel"
                                    data-btn-cancel-icon="fa fa-chevron-circle-left"
                                    data-btn-cancel-class="btn btn-sm btn-default"
                                    data-title="Are you sure you want to delete ?"
                                    data-placement="left" data-singleton="true">
                                    Delete
                                 </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- <table id="table_general_profile" class="table">
                           <thead>
                              <tr>
                                 <th>ID</th>
                                 <th>State</th>
                                 <th>date</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table> -->
                     </div>
                  </div>
                  <!--
                  <div class="modal fade" id="edit_general_profile" tabindex="-1" role="dialog"
                     aria-labelledby="editListingModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="edit_general_profile">GeneralProfile</h5>
                              <button type="button" class="close" data-dismiss="modal"
                                 aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form class="myForm" id="general_profile_submit">
                                 @csrf
                                 <div class="row">
                                    <input type="hidden" id="general_profile_update" />
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="state">State<span
                                             class="star">*</span></label>
                                          <input type="text" name="state"
                                             id="edit_state" />
                                          <small id="state-error" class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="district">Hospital<span
                                             class="star">*</span></label>
                                          <input type="text" name="hospital"
                                             id="edit_hospital" />
                                          <small id="hospital-error"
                                             class="form-text text-muted"> </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="fromYear">Nodal Officer<span
                                             class="star">*</span></label>
                                          <input type="text" name="designation"
                                             id="edit_designation" />
                                          <small id="designation-error"
                                             class="form-text text-muted"> </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="toYear">Contact Number<span
                                             class="star">*</span></label>
                                          <input type="number" name="contact_number"
                                             id="edit_contact_number" />
                                          <small id="contact_number-error"
                                             class="form-text text-muted"> </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="diseasesSyndromes">Mou<span
                                             class="star">*</span></label>
                                          <select class="form-select"
                                             aria-label="Default select example" name="mou"
                                             id="edit_mou" onChange="handleFilterValue()">
                                             <option value=""> Select </option>
                                             <option value="yes">Yes</option>
                                             <option value="no">No</option>
                                          </select>
                                          <small id="mou-error" class="form-text text-muted">
                                          </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6">
                                       <div class="form-group">
                                          <label for="formType">Joining Date of NRCP<span
                                             class="star">*</span></label>
                                          <input type="text" name="date_of_joining"
                                             id="edit_date_of_joining" />
                                          <small id="date_of_joining-error"
                                             class="form-text text-muted"> </small>
                                       </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                                       <div class="apply-filter">
                                          <button type="submit" id="submit-btn"
                                             class="btn bg-primary text-light apply-filter button border-0 mr-2">Save
                                          Change</button>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
    });
</script>
@endsection