<!DOCTYPE html>
<html class="ie8 no-js" lang="en">
<html class="ie9 no-js" lang="en">
<html lang="en" class="no-js">
<head>
    <title>Rapido - Responsive Admin Template</title>
    <meta charset="utf-8"/>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{url('/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{url('/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{url('/plugins/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{url('/plugins/iCheck/skins/all.css') }}">
    <link rel="stylesheet" href="{{url('/css/styles.css') }}">
    <link rel="stylesheet" href="{{url('/css/styles-responsive.css') }}">
    <link rel="stylesheet" href="{{url('/plugins/iCheck/skins/all.css') }}">
    <link rel="stylesheet" href="../../../public/plugins/font-awesome/css/font-awesome-ie7.min.css">
</head>
<!-- end: HEAD -->
<!-- start: BODY -->

<body class="login">
<div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="logo">
            <img src="{{url('/images/logo.png') }}">
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login">
            <h3>Sign in to your account</h3>
            <p>
                Please enter your name and password to log in.
            </p>
            <form class="form-login" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
                </div>
                <fieldset>
                    <div class="form-group">
                            <span class="input-icon">
                                <input type="text" class="form-control" name="email" placeholder="email"
                                       value="{{ old('email') }}">
                                <i class="fa fa-user"></i>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </span>
                    </div>
                    <div class="form-group form-actions">
                            <span class="input-icon">
                                <input type="password" class="form-control password" name="password"
                                       placeholder="Password">
                                <i class="fa fa-lock"></i>

                            </span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-actions">

                        <button type="submit" class="btn btn-green pull-right">
                            Login <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>

                </fieldset>
            </form>
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                2014 &copy; by 4M.
            </div>
            <!-- end: COPYRIGHT -->
        </div>
        <!-- end: LOGIN BOX -->
        <!-- start: FORGOT BOX -->
        <div class="box-forgot">
            <h3>Forget Password?</h3>
            <p>
                Enter your e-mail address below to reset your password.
            </p>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-forgot" action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
                </div>
                <fieldset>
                    <div class="form-group">
                            <span class="input-icon">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       value="{{ old('email') }}" name="email" placeholder="{{ __('E-Mail Address') }}">
                                <i class="fa fa-envelope"></i>
                            </span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-actions">
                        <a class="btn btn-light-grey go-back">
                            <i class="fa fa-chevron-circle-left"></i> Log-In
                        </a>
                        <button type="submit" class="btn btn-green pull-right">
                            {{ __('Send Password Reset Link') }} <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                </fieldset>
            </form>
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                2014 &copy; by 4M.
            </div>
            <!-- end: COPYRIGHT -->
        </div>
        <!-- end: FORGOT BOX -->

    </div>
</div>
<script src="{{ url('/plugins/jQuery/jquery-2.1.1.min.js') }}"></script>
<script src="{{ url('/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')}}"></script>
<script src="{{ url('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ url('/plugins/iCheck/jquery.icheck.min.js')}}"></script>
<script src="{{ url('/jquery.transit/jquery.transit.js')}}"></script>
<script src="{{ url('/plugins/TouchSwipe/jquery.touchSwipe.min.js')}}"></script>
<script src="{{ url('/js/main.js')}}"></script>
<script src="{{ url('/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{ url('/js/login.js')}}"></script>
<script>
    jQuery(document).ready(function () {
        Main.init();
        Login.init();
    });
</script>

</body>

</html>

