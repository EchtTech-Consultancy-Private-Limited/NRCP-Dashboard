@extends('layouts.main')
@section("content")
@section('title')
{{__('Patient Record')}}
@endsection
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            @if (session()->has('message'))
            <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
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
                <div class="card card-primary p-form-card">
                    <div class="form-tab">
                        <form action="#" method="post" class="myForm">
                            <div class="row bg-c-gray m-0">
                                <div class="col-lg-12 col-md-12">
                                    <div class="label-title"><b>Patient Records Search</b></div>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-select">
                                            <option value="">--Select--</option>
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
                                        <label for="district">District</label>
                                        <select class="form-select">
                                            <option value="">--Select--</option>
                                            <option value="1"> UP</option>
                                            <option value="2"> MP</option>
                                            <option value="3"> DL</option>
                                        </select>
                                        <small id="district-error" class="form-text text-muted"> </small>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="taluka">Sub District</label>
                                        <select class="form-select">
                                            <option value="">--Select--</option>
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
                                        <label for="first-name">First Name</label>
                                        <input type="text" name="first_name" id="first-name" class="form-control"
                                            placeholder="Enter Your First Name">
                                        <small id="first-name-error" class="form-text text-muted"> </small>
                                    </div>
                                </div>


                                <div class="col-md-12 text-center">
                                    <p class="or">OR</p>
                                </div>



                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="village">ID Type</label>
                                        <select class="form-select">
                                            <option value="" class="" selected="selected">---Select---</option>
                                            <option label="Aadhaar" value="object:4258">Aadhaar</option>
                                            <option label="VoterID" value="object:4259">VoterID</option>
                                            <option label="PAN" value="object:4260">PAN</option>
                                            <option label="Passport" value="object:4261">Passport</option>
                                            <option label="Driving License" value="object:4262">Driving License</option>
                                            <option label="ABHA" value="object:4263">ABHA</option>
                                            <option label="Others" value="object:4264">Others</option>
                                        </select>
                                        <small id="village-error" class="form-text text-muted"> </small>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="house-no">Identification Number</label>
                                        <input type="text" class="form-control" name="house_no"
                                            placeholder="Identification Number">
                                        <small id="house-no-error" class="form-text text-muted"> </small>
                                    </div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <p class="or">OR</p>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <label for="search-patient" class="label mb-0">Contact Number:</label>
                                    <div class="form-group d-flex">
                                        <div class="w-140 mr-3">
                                            <select name="" id="" class="form-control mt-0">
                                                <option value="India">India +91</option>
                                                <option value="India">India +91</option>
                                                <option value="India">India +91</option>
                                            </select>
                                        </div>
                                        <div class="w-100">
                                            <input type="text" name="fname" class="form-control"
                                                placeholder="Enter Your Mobile Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 button d-flex justify-content-center mt-3 mb-3">
                                    <button type="reset" class="btn search-patient-btn mr-3 bg-danger text-light">Clear
                                        Filter</button>
                                    <button type="search"
                                        class="btn search-patient-btn bg-primary text-light">Search</button>
                                </div>
                            </div>

                            <div class="row bg-c-gray bg-white m-0 p-0 mt-3">

                                <div class="col-lg-12 col-md-12">
                                    <div class="label-title"><b>6. Line Listing</b> </div>
                                </div>

                                <div class="col-md-12">
                                <table class="table table-bordered ">
								<thead>
									<tr style="background: #D3D3D3">
										<th>Person Name</th>
										<th>Id Type/Id No</th>
										<th>Contact No</th>
										<th>Date of Birth</th>
										<th>Sex</th>
										<th>Present Address</th>
										<th>Village</th>
										<th>Sub District</th>
										<th>District</th>
										<th>State</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<tr>								
										<td>Ritika BaiMishra</td>
										<td>Not Available<br>0</td>
										<td>8789987897</td>
										<td>21/11/1973</td>
										<td>Female</td>
										<td>2,54,mnm</td>
										<td>Adinayakanahalli</td>
										<td>Tiptur</td>
										<td>Tumakuru</td>
										<td>Karnataka</td>
                                        <td>
											<a href="javascript:void();" class="btn btn-info btn-sm">Select</a>
										</td>
									</tr>
                                   <tr>
										<td>Raju TS</td>
										<td>State Health ID<br>2233</td>
										<td>9847952876</td>
										<td>02/02/2010</td>
										<td>Male</td>
										<td>23</td>
										<td>Ballekatte</td>
										<td>Tiptur</td>
										<td>Tumakuru</td>
										<td>Karnataka</td>	
                                        <td><a href="javascript:void();" class="btn btn-info btn-sm" disabled="disabled">Dead</a></td>									
									</tr>                                   
                                                                     
								</tbody>
							</table>

                                </div>

                            </div>

                        </form>
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

<script>
$(document).ready(function() {
    $('#age-b').click(function() {
        $('#dob').addClass('d-none').siblings().removeClass('d-none');
    });
    $('#date-b').click(function() {
        $('#Age-inputs').addClass('d-none').siblings().removeClass('d-none');
    });

});
</script>

@endsection