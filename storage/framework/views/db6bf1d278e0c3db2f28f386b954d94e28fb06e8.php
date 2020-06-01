<!DOCTYPE html>
<html class="ie8 no-js" lang="en">
<html class="ie9 no-js" lang="en">
<html lang="en" class="no-js">
<head>
    <title><?php echo e(trans('site_lang.auth_login_text')); ?></title>
    <meta charset="utf-8"/>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(url('/plugins/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/animate.css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/iCheck/skins/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/css/styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/css/styles-responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/plugins/iCheck/skins/all.css')); ?>">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<!-- end: HEAD -->
<!-- start: BODY -->

<body class=" login">
<div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="logo">
            <img src="<?php echo e(url('/images/logo.png')); ?>">
        </div>
        <!-- start: LOGIN BOX -->
        <div class="box-login">
            <h3 class="text-bold"><?php echo e(trans('site_lang.auth_cont_title')); ?></h3>
            <p class="text-bold">
                <?php echo e(trans('site_lang.auth_cont_body')); ?>

            </p>
            <form class="form-login" action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i>
                    <h3 class="text-bold"><?php echo e(trans('site_lang.auth_errors')); ?></h3>
                </div>
                <fieldset>
                    <div class="form-group">
                            <span class="input-icon">
                                <input type="text" class="form-control text-bold" name="email"
                                       placeholder="<?php echo e(trans('site_lang.users_email')); ?>"
                                       value="<?php echo e(old('email')); ?>">
                                <i class="fa fa-user"></i>
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </span>
                    </div>
                    <div class="form-group">
                            <span class="input-icon">
                                <input type="password" class="form-control text-bold" name="password"
                                       placeholder="<?php echo e(trans('site_lang.auth_password')); ?>">
                                <i class="fa fa-lock"></i>

                            </span>
                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-actions">

                        <button type="submit" class="btn btn-green pull-right text-bold">
                            <?php echo e(trans('site_lang.auth_login_text')); ?> <i class="fa fa-arrow-circle-left"></i>
                        </button>
                    </div>

                </fieldset>
            </form>
            <!-- start: COPYRIGHT -->
            <div class="copyright">
                2020 &copy; by 4M Systems.
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
            <?php if(session('status')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <form class="form-forgot" action="<?php echo e(route('password.email')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="errorHandler alert alert-danger no-display">
                    <i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
                </div>
                <fieldset>
                    <div class="form-group">
                            <span class="input-icon">
                                <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                       value="<?php echo e(old('email')); ?>" name="email" placeholder="<?php echo e(__('E-Mail Address')); ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-actions">
                        <a class="btn btn-light-grey go-back">
                            <i class="fa fa-chevron-circle-left"></i> Log-In
                        </a>
                        <button type="submit" class="btn btn-green pull-right">
                            <?php echo e(__('Send Password Reset Link')); ?> <i class="fa fa-arrow-circle-right"></i>
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
<script src="<?php echo e(url('/plugins/jQuery/jquery-2.1.1.min.js')); ?>"></script>
<script src="<?php echo e(url('/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js')); ?>"></script>
<script src="<?php echo e(url('/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('/plugins/iCheck/jquery.icheck.min.js')); ?>"></script>
<script src="<?php echo e(url('/jquery.transit/jquery.transit.js')); ?>"></script>
<script src="<?php echo e(url('/plugins/TouchSwipe/jquery.touchSwipe.min.js')); ?>"></script>
<script src="<?php echo e(url('/js/main.js')); ?>"></script>
<script src="<?php echo e(url('/plugins/jquery-validation/dist/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(url('/js/login.js')); ?>"></script>
<script>
    jQuery(document).ready(function () {
        Main.init();
        Login.init();
    });
</script>

</body>

</html>

<?php /**PATH C:\xampp\htdocs\Lawyer\resources\views/auth/login.blade.php ENDPATH**/ ?>