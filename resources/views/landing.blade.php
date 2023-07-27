@include('includes.login-header')
<body class="hold-transition login-page">
    <div class="login-box" style="width: 50%">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>NRCP Dashboard</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <div class="row">
  <div class="col-sm-3">
      <div class="card text-center" style="background: #F5F8BB;">
      <div class="card-body">
          <h5 class="card-title" style="float: none;">Central Login </h5>
        <p></p><br>
        <a href="{{route('login')}}?type=central" class="btn btn-primary">Proceed to login</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
      <div class="card text-center" style="background: #DAFBD5;">
      <div class="card-body">
        <h5 class="card-title" style="float: none;">State Login</h5>
        <p></p><br>
        <a href="{{route('login')}}?type=state" class="btn btn-primary">Proceed to login</a>
      </div>
    </div>
  </div>
          <div class="col-sm-3">
              <div class="card text-center" style="background: #E6D7FB;">
      <div class="card-body">
        <h5 class="card-title" style="float: none;">District Login</h5>
        <p></p><br>
        <a href="{{route('login')}}?type=district" class="btn btn-primary">Proceed to login</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
      <div class="card text-center" style="background: #FBDFF9;">
      <div class="card-body">
        <h5 class="card-title" style="float: none;">Health facilities</h5>
        <p></p><br>
        <a href="{{route('login')}}?type=health-facilities" class="btn btn-primary">Proceed to login</a>
      </div>
    </div>
  </div>
</div>

      
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@include('includes.login-footer')