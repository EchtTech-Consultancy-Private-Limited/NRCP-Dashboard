@include('includes.login-header')
<body class="hold-transition login-page">
    <div class="login-box" style="width: 450px;">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b> Rabies Data Portal</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{url('dashboard')}}" method="get">
        <div class="input-group mb-3">
            <select name="section" id="section" class="form-control">
                <option value="0">Select Section</option>
                <option value="1">Animal Health</option>
                <option value="2">Human Health Rabies</option>
            </select>

        </div>
        <div class="input-group mb-3">
            <select name="usertype" id="usertype" class="form-control">
                <option value="0">Select User Type</option>
                <option value="1">Central Login</option>
                <option value="2">State Login</option>
                <option value="3">District Login</option>
                <option value="4">Health Facilities</option>
            </select>

        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
<!--      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>-->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@include('includes.login-footer')
