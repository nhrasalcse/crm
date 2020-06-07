<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EARLY REDUCE</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{asset('backend')}}/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="{{asset('backend')}}/https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{asset('backend')}}/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('backend')}}/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('backend')}}/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('backend')}}/icon.PNG">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="{{asset('backend')}}/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="{{asset('backend')}}/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>EARLY REDUCE</span><strong class="text-primary">Dashboard</strong></div>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p> -->
            <form method="POST" class="text-left form-validate" action="{{ route('login') }}">
                        @csrf
              <div class="form-group-material">
                <input id="login-username" type="text" required data-msg="Please enter your username" class="input-material @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                <label for="login-username" class="label-material">Email</label>
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password"  required data-msg="Please enter your password" class="input-material @error('password') is-invalid @enderror" name="password">
                <label for="login-password" class="label-material">Password</label>
                @error('password')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
              <div class="form-group text-center">
              <button id="login" href="#" class="btn btn-primary">Login</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form>
            <!-- <a href="#" class="forgot-pass">Forgot Password?</a><small>Do not have an account? </small><a href="{{asset('backend')}}/register.html" class="signup">Signup</a> -->
          </div>
          <div class="copyrights text-center">
            <p>Design by <a href="" class="external">NH Rasal</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('backend')}}/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="{{asset('backend')}}/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="{{asset('backend')}}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{asset('backend')}}/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{asset('backend')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="{{asset('backend')}}/js/front.js"></script>
  </body>
</html>