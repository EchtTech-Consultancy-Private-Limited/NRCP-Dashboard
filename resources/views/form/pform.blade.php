@extends('layouts.main')
@section("content")
<!-- Main content -->
<section class="content">
   <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row">
         @if (session()->has('message'))
         <script>
            Swal.fire({
                position:'top-end',
                icon:'success',
                title: 'Patient record saved successfully',
                showConfirmButton: false,
                timer: 3000
            })
         </script>
         @endif
         <!-- fix for small devices only -->
         <div class="clearfix hidden-md-up"></div>
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
               <div class="form-tab">
                  <div class="bootstrap-tab">
                     <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                           <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                              href="#nav-add-patient-record" role="tab"
                              aria-controls="nav-home" aria-selected="true">Add Patient Record</a>
                           <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                              href="#nav-add-death-record" role="tab"
                              aria-controls="nav-profile" aria-selected="false">Add Death
                           Record</a>
                           <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                              href="#nav-record-aggregate-data" role="tab"
                              aria-controls="nav-contact" aria-selected="false">Record Aggregate
                           Data</a>
                           <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                              href="#nav-submit-null-report" role="tab"
                              aria-controls="nav-contact" aria-selected="false">Submit Null
                           Report</a>
                        </div>
                     </nav>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="nav-add-patient-record"
                           role="tabpanel" aria-labelledby="home-tab">
                           <div class="note"><i class="fa fa-hand-o-right"
                              aria-hidden="true"></i> Enter data accurately and completely
                           </div>
                           <div class="row">
                              <div class="col-lg-12 col-md-12">
                                 <div class="label-title">1. Patient Details:</div>
                              </div>
                              <div class="col-lg-3 col-md-3 d-flex align-items-center">
                                 <label for="search-patient" class="label">Contact
                                 Number:</label>
                              </div>
                              <div class="col-lg-5 col-md-5 ">
                                 <div class=" form-group d-flex justify-content-between">
                                    <input type="text" name="fname" id="search-patient"
                                       class="form-control" placeholder="Enter Your Mob No">
                                    <button
                                       class="ms-2 search-patient-btn bg-primary text-light"
                                       id="search-patient-btn">Search Patient</button>
                                 </div>
                              </div>
                              <div class="col-lg-3 col-md-3">
                              </div>
                           </div>
                           <form action="{{ url('/patient-Record') }}" method="post"
                              class="myForm">
                              @csrf
                              <div class="row">
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="first-name">First Name<span
                                          class="star">*</span></label>
                                       <input type="text" name="first_name"
                                          id="first-name" class="form-control"
                                          placeholder="Enter Your First Name" maxlength="30" required>
                                       <small id="first-name-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="middle-name">Middle Name</label>
                                       <input type="text" name="middle_name"
                                          id="middle-name" class="form-control"
                                          placeholder="Enter Your Middle Name">
                                       <small id=" " class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="last-name">Last Name<span
                                          class="star">*</span></label>
                                       <input type="text" name="last_name" id="last-name"
                                          class="form-control" maxlength="30" required
                                          placeholder="Enter Your Last Name">
                                       <small id="last-name-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="dob">Date of Birth<span
                                          class="star">*</span></label>
                                       <input type="date" name="birth_date"
                                          id="dob" class="form-control" required>
                                       <small id="dob-eror" class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="gander">Gender<span
                                          class="star">*</span></label>
                                       <select class="form-select" name="gender"
                                          aria-label="Default select example"
                                          id="gender" required>
                                          <option value=""> Select Your Gender</option>
                                          <option value="1"> Male</option>
                                          <option value="2"> Famale</option>
                                          <option value="3"> Other</option>
                                       </select>
                                       <small id="gander-error" class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="id-type">Id Type<span
                                          class="star">*</span></label>
                                       <select class="form-select"
                                          aria-label="Default select example" name="id_type"
                                          id="id-type" required>
                                          <option value=""> Select Your id-type
                                          </option>
                                          <option value="1"> Male</option>
                                          <option value="2"> Famale</option>
                                          <option value="3"> Other</option>
                                       </select>
                                       <small id="id-type-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="identification">Identification Number<span
                                          class="star">*</span></label>
                                       <input type="text" class="form-control"
                                          name="identification_number" id="identification"
                                          aria-describedby="Identification"
                                          placeholder="Enter Your Identification Number" maxlength="12" required>
                                       <small id="identification-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="citizenship">Citizenship</label>
                                       <select class="form-select"
                                          aria-label="Default select example"
                                          name="citizenship" id="citizenship">
                                          <option value=""> Select Your Citizenship
                                          </option>
                                          <option value="1"> India</option>
                                          <option value="2"> US</option>
                                          <option value="3"> Japan</option>
                                       </select>
                                       <small id="citizenship-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12">
                                    <div class="label-title">Present Adderess:</div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="state">State<span
                                          class="star">*</span></label>
                                       <select class="form-select"
                                          aria-label="Default select example" name="state"
                                          id="state" required>
                                          <option value=""> Select Your state</option>
                                          <option value="1"> UP</option>
                                          <option value="2"> MP</option>
                                          <option value="3"> DL</option>
                                       </select>
                                       <small id="state-error" class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="district">District<span
                                          class="star">*</span></label>
                                       <select class="form-select"
                                          aria-label="Default select example"
                                          name="district" id="district" required>
                                          <option value=""> Select Your district
                                          </option>
                                          <option value="1"> UP</option>
                                          <option value="2"> MP</option>
                                          <option value="3"> DL</option>
                                       </select>
                                       <small id="district-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="taluka">Taluka<span
                                          class="star">*</span></label>
                                       <select class="form-select"
                                          aria-label="Default select example" name="taluka"
                                          id="taluka" required>
                                          <option value=""> Select Your taluka</option>
                                          <option value="1"> UP</option>
                                          <option value="2"> MP</option>
                                          <option value="3"> DL</option>
                                       </select>
                                       <small id="taluka-error" class="form-text text-muted">
                                       </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="village">Village<span
                                          class="star">*</span></label>
                                       <select class="form-select"
                                          aria-label="Default select example" name="village"
                                          id="village" required>
                                          <option value=""> Select Your village
                                          </option>
                                          <option value="1"> UP</option>
                                          <option value="2"> MP</option>
                                          <option value="3"> DL</option>
                                       </select>
                                       <small id="village-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="house-no">House No</label>
                                       <input type="text" class="form-control"
                                          name="house_no" id="house-no"
                                          aria-describedby="house-no"
                                          placeholder="Enter Your House No" maxlength="20">
                                       <small id="house-no-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="street-name">Street Name</label>
                                       <input type="text" class="form-control"
                                          name="street_name" id="street-name"
                                          aria-describedby="street-name"
                                          placeholder="Enter Your Street Name" maxlength="40">
                                       <small id="street-name-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="landmark">Landmark </label>
                                       <input type="text" class="form-control"
                                          name="landmark" id="landmark"
                                          aria-describedby="landmark"
                                          placeholder="Enter Your Landmark" maxlength="40">
                                       <small id="landmark-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="pin-code">PIN Code</label>
                                       <input type="text" class="form-control"
                                          name="Pincode" id="pin-code"
                                          aria-describedby=" "
                                          placeholder="Enter Your PIN Code" maxlength="6">
                                       <small id="pin-code-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 col-md-12">
                                    <div class="label-title">Permanent address same as present
                                       address <input type="checkbox"
                                          name="permanent_address" value="1">
                                    </div>
                                 </div>
                                 <div class="note"><i class="fa fa-hand-o-right"
                                    aria-hidden="true"></i> Enter data accurately and
                                    completely
                                 </div>
                                 <div class="col-lg-12 col-md-12">
                                    <div class="label-title">2. Clinical Details: </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="provisinal-diagnosis">Provisinal
                                       Diagnosis<span class="star">*</span></label>
                                       <select class="form-select"
                                          aria-label="Default select example"
                                          name="provisinal_diagnosis"
                                          id="provisinal-diagnosis" required>
                                          <option value=""> Select Your Diagnosis
                                          </option>
                                          <option value="1"> UP</option>
                                          <option value="2"> MP</option>
                                          <option value="3"> DL</option>
                                       </select>
                                       <small id="provisinal-diagnosis-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="date-of-onset">Date of Onset<span
                                          class="star">*</span></label>
                                       <input type="date" name="date_of_onset"
                                          class="form-control" id="date-of-onset"
                                          aria-describedby="Date of Onset"
                                          placeholder="Enter Your Date of Onset" required>
                                       <small id="date-of-onset-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                                 <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                       <label for="OPD-IPD">OPD/IPD<span
                                          class="star">*</span></label>
                                       <select class="form-select" name="opd_ipd"
                                          aria-label="Default select example" name="OPD-IPD"
                                          id="OPD-IPD" required>
                                          <option value=""> Select Your OPD-IPD
                                          </option>
                                          <option value="1"> UP</option>
                                          <option value="2"> MP</option>
                                          <option value="3"> DL</option>
                                       </select>
                                       <small id="opd-ipd-error"
                                          class="form-text text-muted"> </small>
                                    </div>
                                 </div>
                              </div>
                              <div class="button d-flex">
                                 <button
                                    class="btn search-patient-btn bg-primary text-light">Reset</button>
                                 <button
                                    class="btn search-patient-btn ms-2 bg-primary text-light">save</button>
                              </div>
                           </form>
                        </div>
                        <div class="tab-pane fade" id="nav-add-death-record" role="tabpanel"
                           aria-labelledby="profile-tab">
                           nav add death record profile tab TAB 2 Lorem ipsum dolor sit amet.
                        </div>
                        <div class="tab-pane fade" id="nav-record-aggregate-data" role="tabpanel"
                           aria-labelledby="contact-tab">nav-record-aggregate-data Lorem ipsum
                           dolor sit amet consectetur
                           adipisicing elit. Fugit, consequuntur. Laborum, placeat.
                        </div>
                        <div class="tab-pane fade" id="nav-submit-null-report" role="tabpanel"
                           aria-labelledby="contact-tab">nav submit null report lorem ipsum dolor
                           sit amet consectetur
                           adipisicing elit. Fugit, consequuntur. Laborum, placeat.
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.card -->
         </div>
      </div>
      <!-- /.row -->
      <!-- /.row -->
   </div>
   <!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection