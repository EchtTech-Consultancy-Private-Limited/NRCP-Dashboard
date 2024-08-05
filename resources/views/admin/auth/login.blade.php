@if (Auth::user())
    <script>
        window.location = "{{ url('/dashboard') }}";
    </script>
@endif

@include('includes.login-header')



<body class="hold-transition login-page">
    <div class="login-box" style="width: 450px;">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a  class="h1"><b> Rabies Data Portal</b></a>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="post" id="login">
                    @csrf
                    
                    <div class="input-group mb-3 space-between" >
                        <div class="ml-4">
                            <input type="hidden" name="user_type" value='4'>
                        </div>
                        @error('user_type') 
                        <span class="form-text text-danger mb-1 ">{{ $message }}</span>
                      @enderror
                    </div>
                  <div class="mb-4">
                  <div class="input-group ">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">                       
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                      
                    </div>
                    @error('email') 
                        <span class="form-text text-danger mb-1 ">{{ $message }}</span>
                    @enderror 
                  </div>
                    
                   
                    <div class="input-group mb-4">
                        <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">

                            <div class="input-group-text">
                                <i class="fa fa-eye-slash pr-3" aria-hidden="true" id="togglePassword"></i>
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password') 
                            <span class="form-text text-danger mb-1">{{ $message }}</span>
                         @enderror 
                    </div>
                  
                    <div class="col-md-12">
                        <div class="captcha row">
                           <div class="col-md-7 pl-0">
                           <input id="captcha" type="text" value="{{ old('captcha') }}" class="form-control "
                                placeholder="Enter Captcha" name="captcha">
                           </div>

                            <div class="col-md-5 pl-0 text-right pr-0 d-flex justify-content-between">
                                <span class="me-2"  >{!! captcha_img('math') !!}</span>
                                <button type="button" class="btn btn-success btn-refresh"><i
                                        class="fa fa-refresh1"></i></button>
                            </div>

                        </div>
                        @error('captcha') 
                            <span class="form-text text-danger mb-1" id="captchaError">{{ $message }}</span>
                         @enderror 

                        {{-- @if ($errors->has('captcha'))
                            <span class="help-block">
                                <strong>{{ $errors->first('captcha') }}</strong>
                            </span>
                        @endif --}}
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                {{-- <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label> --}}
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

                {{-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> --}}
                <!--      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>-->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <script type="text/javascript">
        $(".btn-refresh").click(function() {

            $.ajax({
                type: 'GET',
                url: "{{ url('/refresh_captcha') }}",
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });

        let password = document.querySelector('#password');
        let togglePassword = document.querySelector('#togglePassword');
        console.log(togglePassword.classList.contains('fa-eye-slash'));

        togglePassword.addEventListener('click', (e) => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
       let eye = togglePassword.classList.contains('fa-eye-slash')
       if(eye== true){
        togglePassword.classList.remove('fa-eye-slash');
        togglePassword.classList.add('fa-eye');
       }else{
        togglePassword.classList.remove('fa-eye');
        togglePassword.classList.add('fa-eye-slash');
       }
        // togglePassword.classList.toggle('fa-eye-slash');
});

    </script>

    @include('includes.login-footer')
