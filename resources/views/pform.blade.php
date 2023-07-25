@include('includes.header')

<link rel="stylesheet" href="{{ asset('assets/pform_css/style.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('assets/login/dist/img/AdminLTELogo.png') }}" alt="logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('includes.navigation')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/login/dist/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NRCP Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('includes.sidebar')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<!--            <h1 class="m-0">Dashboard</h1>-->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
         

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="form-tab">
                <div class="bootstrap-tab">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-add-patient-record"
                                role="tab" aria-controls="nav-home" aria-selected="true">Add Patient Record</a>
                            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-add-death-record"
                                role="tab" aria-controls="nav-profile" aria-selected="false">Add Death Record</a>
                            <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-record-aggregate-data"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Record Aggregate Data</a>
                            <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-submit-null-report"
                                role="tab" aria-controls="nav-contact" aria-selected="false">Submit Null Report</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="myTabContent">
    
                        <div class="tab-pane fade show active" id="nav-add-patient-record" role="tabpanel"
                            aria-labelledby="home-tab">
                            <form action="#" class="myForm">
                                <div class="note"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Enter data accurately and completely</div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="label-title">1. Patient Details:</div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 d-flex align-items-center">
                                        <label for="search-patient" class="label">Contact Number:</label>
                                    </div>
                                    <div class="col-lg-5 col-md-5 ">
                                        <div class=" form-group d-flex justify-content-between">
                                            <input type="text" name="fname" id="search-patient" class="form-control" placeholder="Enter Your Mob No">
                                            <button class="ms-2 search-patient-btn bg-primary text-light" id="search-patient-btn" >Search Patient</button>
                                        </div>
    
                                    </div>
                                    <div class="col-lg-3 col-md-3">
    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="first-name">First Name<span class="star">*</span></label>
                                            <input type="text" name="fname" id="first-name" class="form-control" placeholder="Enter Your First Name">
                                            <small id="first-name-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="middle-name">Middle Name</label>
                                            <input type="text" name="fname" id="middle-name" class="form-control" placeholder="Enter Your Middle Name">
                                            <small id=" " class="form-text text-muted"> </small>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="last-name">Last Name<span class="star">*</span></label>
                                            <input type="text" name="fname" id="last-name" class="form-control" placeholder="Enter Your Last Name">
                                            <small id="last-name-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth<span class="star">*</span></label>
                                            <input type="date" name="fname" id="dob" class="form-control">
                                            <small id="dob-eror" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
    
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="gander">Gender<span class="star">*</span></label>
                                            <select class="form-select" aria-label="Default select example" id="gander">
                                                <option> Select Your Gender</option>
                                                <option> Male</option>
                                                <option> Famale</option>
                                                <option> Other</option>
                                            </select>
                                            <small id="gander-error" class="form-text text-muted"> </small>
                                        </div>
                                       
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="id-type">Id Type<span class="star">*</span></label>
                                            <select class="form-select" aria-label="Default select example" name="id-type" id="id-type">
                                                <option> Select Your id-type</option>
                                                <option> Male</option>
                                                <option> Famale</option>
                                                <option> Other</option>
                                            </select>
                                            <small id="id-type-error" class="form-text text-muted"> </small>
                                        </div>
                                      
                                    </div>
                                    
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="identification">Identification Number<span class="star">*</span></label>
                                            <input type="text" class="form-control" id="identification" aria-describedby="Identification" placeholder="Enter Your Identification Number">
                                            <small id="identification-error" class="form-text text-muted"> </small>
                                          </div>
                                        
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="citizenship">Citizenship</label>
                                            <select class="form-select" aria-label="Default select example" name="citizenship" id="citizenship">
                                                <option> Select Your Citizenship</option>
                                                <option> India</option>
                                                <option> US</option>
                                                <option> Japan</option>
                                            </select>
                                            <small id="citizenship-error" class="form-text text-muted"> </small>
                                        </div>
                                      
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="label-title">Present Adderess:</div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="state">State<span class="star">*</span></label>
                                            <select class="form-select" aria-label="Default select example" name="state" id="state">
                                                <option> Select Your state</option>
                                                <option> UP</option>
                                                <option> MP</option>
                                                <option> DL</option>
                                            </select>
                                            <small id="state-error" class="form-text text-muted"> </small>
                                        </div>
                                       
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="district">District<span class="star">*</span></label>
                                            <select class="form-select" aria-label="Default select example" name="district" id="district">
                                                <option> Select Your district</option>
                                                <option> UP</option>
                                                <option> MP</option>
                                                <option> DL</option>
                                            </select>
                                            <small id="district-error" class="form-text text-muted"> </small>
                                        </div>
    
                                       
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                           <div class="form-group">
                                            <label for="taluka">Taluka<span class="star">*</span></label>
                                            <select class="form-select" aria-label="Default select example" name="taluka" id="taluka">
                                                <option> Select Your taluka</option>
                                                <option> UP</option>
                                                <option> MP</option>
                                                <option> DL</option>
                                            </select>
                                            <small id="taluka-error" class="form-text text-muted"> </small>
                                        </div>
    
                                      
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="village">Village<span class="star">*</span></label>
                                            <select class="form-select" aria-label="Default select example" name="village" id="village">
                                                <option> Select Your village</option>
                                                <option> UP</option>
                                                <option> MP</option>
                                                <option> DL</option>
                                            </select>
                                            <small id="village-error" class="form-text text-muted"> </small>
                                        </div>
    
                                       
                                    </div>
    
                                   
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="house-no">House No</label>
                                            <input type="text" class="form-control" id="house-no" aria-describedby="house-no" placeholder="Enter Your House No">
                                            <small id="house-no-error" class="form-text text-muted"> </small>
                                          </div>
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="street-name">Street Name</label>
                                            <input type="text" class="form-control" id="street-name" aria-describedby="street-name" placeholder="Enter Your Street Name">
                                            <small id="street-name-error" class="form-text text-muted"> </small>
                                          </div>
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="landmark">Landmark </label>
                                            <input type="text" class="form-control" id="landmark" aria-describedby="landmark" placeholder="Enter Your Landmark ">
                                            <small id="landmark-error" class="form-text text-muted"> </small>
                                          </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        
                                        <div class="form-group">
                                            <label for="pin-code">PIN Code</label>
                                            <input type="text" class="form-control" id="pin-code" aria-describedby=" " placeholder="Enter Your PIN Code">
                                            <small id="pin-code-error" class="form-text text-muted"> </small>
                                          </div>
                                    </div>
    
                                    <div class="col-lg-12 col-md-12">
                                        <div class="label-title">Permanent address same as present address <input type="checkbox"></div>
                                    </div>
                                    <div class="note"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Enter data accurately and completely</div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="label-title">2. Clinical Details: </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="provisinal-diagnosis">Provisinal Diagnosis<span class="star">*</span></label>
                                            <select class="form-select" aria-label="Default select example" name="village" id="provisinal-diagnosis">
                                                <option> Select Your Diagnosis</option>
                                                <option> UP</option>
                                                <option> MP</option>
                                                <option> DL</option>
                                            </select>
                                            <small id="provisinal-diagnosis-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="date-of-onset">Date of Onset<span class="star">*</span></label>
                                            <input type="text" class="form-control" id="date-of-onset" aria-describedby="Date of Onset" placeholder="Enter Your Date of Onset">
                                            <small id="date-of-onset-error" class="form-text text-muted"> </small>
                                          </div>
                                    </div>
    
    
    
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="OPD-IPD">OPD/IPD<span class="star">*</span></label>
                                            <select class="form-select" aria-label="Default select example" name="OPD-IPD" id="OPD-IPD">
                                                <option> Select Your OPD-IPD</option>
                                                <option> UP</option>
                                                <option> MP</option>
                                                <option> DL</option>
                                            </select>
                                            <small id="opd-ipd-error" class="form-text text-muted"> </small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="button d-flex">
                                    <button class="btn search-patient-btn bg-primary text-light">Reset</button>
                                    <button class="btn search-patient-btn ms-2 bg-primary text-light">save</button>
                                </div>
                            </form>
    
    
                        </div>
    
                        <div class="tab-pane fade" id="nav-add-death-record" role="tabpanel" aria-labelledby="profile-tab">
                            nav add death record profile tab TAB 2 Lorem ipsum dolor sit amet.</div>
    
                        <div class="tab-pane fade" id="nav-record-aggregate-data" role="tabpanel"
                            aria-labelledby="contact-tab">nav-record-aggregate-data Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Fugit, consequuntur. Laborum, placeat.</div>
    
                        <div class="tab-pane fade" id="nav-submit-null-report" role="tabpanel"
                            aria-labelledby="contact-tab">nav submit null report lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Fugit, consequuntur. Laborum, placeat.</div>
    
                    </div>
    
                </div>
            </div>
            </div>
            <!-- /.card -->


          </div>
          
        </div>
        <!-- /.row -->

        
        <!-- /.row -->

       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script>
    $(document).ready(function() {
        // $("#first-name-error").text("New word");
        // console.log(fname);
	//Detect that a user has started entering their name itno the name input
        // Name can't be blank
        $('#first-name').on('input', function() {
            var input=$(this);
            
        var is_name=input.val();
         var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
         var name = regex.test(is_name);
        if(name){
        $("#first-name-error").text("");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#first-name-error").text("Please enter valid name");
    }
});

$('#last-name').on('input', function() {
            var input=$(this);
            
        var is_name=input.val();
         var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
         var name = regex.test(is_name);
        if(name){
        $("#last-name-error").text("");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#last-name-error").text("Please enter valid last name");
    }
});



$('#dob').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name==""){
        $("#dob-error").text("Dob is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#dob-error").text("");
    }
});


$('#gander').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name=="Select Your Gender"){
        $("#gander-error").text("Gander  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#gander-error").text("");
    }
});

$('#id-type').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name=="Select Your id-type"){
        $("#id-type-error").text("Id Type  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#gander-error").text("");
    }
});

$('#identification').on('input', function() {
            var input=$(this);
            
        var is_name=input.val();
         var regex = /^[0-9]+$/;
         var name = regex.test(is_name);
        

        if(name){
        $("#identification-error").text("");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#identification-error").text("Please enter valid identity no");
    }
});


$('#citizenship').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name=="Select Your Citizenship"){
        $("#citizenship-error").text("citizenship   is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#citizenship-error").text("");
    }
});


$('#house-no').on('input', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name==""){
        $("#house-no-error").text("House no is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#house-no-error").text("");
    }
});

$('#state').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name=="Select Your state"){
        $("#state-error").text("state number  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#gander-error").text("");
    }
});

$('#district').on('click', function() {
            var input=$(this);
            
            var is_name=input.val();
            if(is_name=="Select Your district"){
            $("#district-error").text("district number  is required");
            // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#gander-error").text("");
    }
});

$('#taluka').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name=="Select Your taluka"){
        $("#taluka-error").text("taluka number  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#gander-error").text("");
    }
});

$('#village').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name=="Select Your village"){
        $("#village-error").text("Village number  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#gander-error").text("");
    }
});

$('#street-name').on('input', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name==""){
        $("#street-name-error").text("Street-name  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#street-name-error").text("");
    }
});

$('#landmark').on('input', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name==""){
        $("#landmark-error").text("Landmark  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#landmark-error").text("");
    }
});

$('#pin-code').on('input', function() {
            var input=$(this);
            
        var is_name=input.val();
        var regex = /^[0-9]+$/;
         var name = regex.test(is_name);
        
        if(name){
        $("#pin-code-error").text("");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#pin-code-error").text("Please enter valid pin code");
    }
});

$('#provisinal-diagnosis').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name=="Select Your Diagnosis"){
        $("#provisinal-diagnosis-error").text("Diagnosis number  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#gander-error").text("");
    }
});

$('#date-of-onset').on('input', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name==""){
        $("#date-of-onset-error").text("date-of-onset  is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#pin-code-error").text("");
    }
});


$('#OPD-IPD').on('click', function() {
            var input=$(this);
            
        var is_name=input.val();
        if(is_name=="Select Your OPD-IPD"){
        $("#opd-ipd-error").text("OPD/IPD is required");
        // input.removeClass("invalid").addClass("valid");
    }
	else{
        $("#opd-ipd-error").text("");
    }
});

// Email must be an email
$('#contact_email').on('input', function() {
	var input=$(this);
	var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var is_email=re.test(input.val());
	if(is_email){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});
// Website must be a website
$('#contact_website').on('input', function() {
	var input=$(this);
	if (input.val().substring(0,4)=='www.'){input.val('http://www.'+input.val().substring(4));}
	var re = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/;
	var is_url=re.test(input.val());
	if(is_url){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}
});
// Message can't be blank
$('#contact_message').keyup(function(event) {
	var input=$(this);
	var message=$(this).val();
	console.log(message);
	if(message){input.removeClass("invalid").addClass("valid");}
	else{input.removeClass("valid").addClass("invalid");}	
});
// After Form Submitted Validation

});


</script>


  <!-- Main Footer -->
  @include('includes.footer')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"></script>