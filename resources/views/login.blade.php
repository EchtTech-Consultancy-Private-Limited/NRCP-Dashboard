@if (Auth::user())
    <script>
        window.location = "{{ url('/dashboard') }}";
    </script>
@endif

@include('includes.login-header')

<style>
    i.fa.fa-refresh1:before {
        content: "\f021";
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box" style="width: 450px;">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b> Rabies Data Portal</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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

                <form action="{{ url('/login') }}" method="post">
                    @csrf
                    {{-- <div class="input-group mb-3">
                        <select name="section_type" id="section" class="form-control">
                            <option value="">Select Section</option>
                            <option value="1">Animal Health</option>
                            <option value="2">Human Health Rabies</option>
                        </select>

                    </div> --}}
                    {{-- <div class="input-group mb-3">
                        <select name="user_type" id="usertype" class="form-control">
                            <option value="">Select User Type</option>
                            <option value="1">Central Login</option>
                            <option value="2">State Login</option>
                            <option value="3">District Login</option>
                            <option value="4">Health Facilities</option>
                        </select>

                    </div> --}}
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password">

                        <div class="input-group-append">

                            <div class="input-group-text">
                                <i class="fa fa-eye pr-3" aria-hidden="true" id="togglePassword"></i>
                                <span class="fas fa-lock"></span>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="captcha row">
                            <input id="captcha" type="text" class="form-control col-md-7"
                                placeholder="Enter Captcha" name="captcha">

                            <div class="col-md-5 text-right pr-0">
                                <span class="me-2"
                                    style=" width: 117px;display: inline-block;">{!! captcha_img('math') !!}</span>
                                <button type="button" class="btn btn-success btn-refresh"><i
                                        class="fa fa-refresh1"></i></button>
                            </div>

                        </div>


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
        togglePassword.addEventListener('click', (e) => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classlist.toggle('fa-eye-slash');
        });
    </script>

    @include('includes.login-footer')
