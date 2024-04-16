@extends('layouts.main')
@section("content")

            <!-- Main content -->
            <section class="content pform2">
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
                            <div class="card card-primary">
                                <div class="form-tab">
                                    <div class="bootstrap-tab">

                                        <div class="tab-content" id="myTabContent">

                                            <div class="" id="nav-add-patient-record" role="tabpanel"
                                                aria-labelledby="home-tab">



                                                <form action="{{ url('/patient-Record') }}" method="post"
                                                    class="myForm">

                                                    <div class="row">

                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="state">State<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="state" required>
                                                                    <option value=""> Select Your State
                                                                    </option>
                                                                    <option value="1"> UP</option>
                                                                    <option value="2"> MP</option>
                                                                    <option value="3"> DL</option>
                                                                </select>
                                                                <small id="state-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="district">District<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="district" required>
                                                                    <option value=""> Select Your District
                                                                    </option>
                                                                    <option value="1"> UP</option>
                                                                    <option value="2"> MP</option>
                                                                    <option value="3"> DL</option>
                                                                </select>
                                                                <small id="district-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="fromYear">From Year<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="district" required>
                                                                    <option value=""> yyyy </option>
                                                                    <option value="1"> 2000</option>
                                                                    <option value="2"> 2001</option>
                                                                    <option value="3"> 2002</option>
                                                                </select>


                                                                <span class="calender"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> </span>
                                                                <small id="fromYear-error"
                                                                    class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="toYear">To Year<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="district"
                                                                    required>
                                                                    <option value=""> yyyy </option>
                                                                    <option value="1"> 2000</option>
                                                                    <option value="2"> 2001</option>
                                                                    <option value="3"> 2002</option>
                                                                </select>
                                                                <span class="calender"><i class="fa fa-calendar"
                                                                        aria-hidden="true"></i> </span>

                                                                <small id="toYear-error" class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="formType">Form Type<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="formType"
                                                                    required>
                                                                    <option value=""> Select Form Type
                                                                    </option>
                                                                    <option value="1"> L Form</option>
                                                                    <option value="2">P Form</option>
                                                                    <option value="3">S Form</option>
                                                                </select>
                                                                <small id="formType-error"
                                                                    class="form-text text-muted">
                                                                </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="form-group">
                                                                <label for="diseasesSyndromes">Diseases Syndromes<span
                                                                        class="star">*</span></label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example"
                                                                    name="provisinal_diagnosis" id="diseasesSyndromes"
                                                                    required>
                                                                    <option value=""> Select Diseases Syndromes
                                                                    </option>
                                                                    <option value="1">Diseases 1</option>
                                                                    <option value="2">Diseases 2</option>
                                                                    <option value="3">Diseases 3</option>
                                                                </select>
                                                                <small id="diseasesSyndromes-error"
                                                                    class="form-text text-muted"> </small>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-3 col-md-3 col-6">
                                                            <div class="button apply-filter">
                                                                <label for=""><span
                                                                        class="star"></span></label>
                                                                <button
                                                                    class="btn search-patient-btn bg-primary text-light">Apply
                                                                    Filter</button>

                                                            </div>

                                                        </div>
                                                    </div>


                                                </form>







                                                <!-- /.row -->
                                                <div class="card-body">
                                                    <div class="row bg-white">

                                                        <div class="col-md-8">
                                                            <div class="year-selector p-3">
                                                                <div class="form-group">

                                                                    <select class="form-select p-1 year"
                                                                        name="year"
                                                                        aria-label="Default select example"
                                                                        id="year" required="">
                                                                        <option value="yyyy">yyyy</option>
                                                                        <?php
                                                                        $currentYear = date('Y');
                                                                        for ($year = $currentYear; $year >= 2015; $year--) {
                                                                            $selected = $year == 2022 ? 'selected' : '';
                                                                            echo "<option value='$year' $selected>$year</option>";
                                                                        }
                                                                        ?>
                                                                    </select>


                                                                    <small id="gander-error"
                                                                        class="form-text text-muted">
                                                                    </small>
                                                                </div>

                                                            </div>
                                                            <div style="height: 700px;" id="container"></div>
                                                        </div>
                                                        <div class="col-md-4">

                                                            <div style="padding:15px; border: 1px solid grey; border-radius:5px; background: white; color: black; height: 100%"
                                                                id="detailsData">

                                                            </div>


                                                            <div class=' detailsDatas'>
                                                                <table class='table table-bordered table-responsive'>
                                                                    <thead>
                                                                        <tr>
                                                                            <th rowspan='2'>State</th>
                                                                            <th colspan='2'>presumptive </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Cases</th>
                                                                            <th>deaths</th>
                                                                        </tr>

                                                                    </thead>
                                                                    <tbody id="tableBody">
                                                                        <!-- Rows will be populated dynamically -->
                                                                    </tbody>
                                                                </table>
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- /.row -->



















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
