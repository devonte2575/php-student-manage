<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login | <?php echo env('APP_NAME'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Kero HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="<?php echo url('/assets/main.07a59de7b920cd76b874.css'); ?>" rel="stylesheet"></head>
    <body>
    <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-animation" style="background: #d2d6de;">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-8">
                            <center><img src="<?php echo url('images/logo.png'); ?>" style="width:300px; height:66px;"></center>
                            <div class="modal-dialog w-100 mx-auto">
                                <div class="modal-content">
                                        <form class="" action="" method="post">
                                            <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        <div class="h5 modal-title text-center">
                                            <h4 class="mt-2">
                                                <div><?php echo trans('login.welcome_back'); ?>,</div>
                                                <span><?php echo trans('login.please_signin_to'); ?></span>
                                            </h4>
                                        </div>
                                        <?php if(Session::has('success')) { ?>
                                        <p class="alert alert-success"><?php echo Session::get('success'); ?></p>
                                        <?php } ?>
                                        <?php if(Session::has('error')) { ?>
                                        <p class="alert alert-danger"><?php echo Session::get('error'); ?></p>
                                        <?php } ?>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="email" id="exampleEmail" placeholder="<?php echo trans('login.your_email'); ?>" type="email" class="form-control" required></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><input name="pass" id="examplePassword" placeholder="<?php echo trans('login.enter_password'); ?>" type="password" class="form-control" required></div>
                                                </div>
                                            </div>
                                            <!--<div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Keep me logged in</label></div>
                                        <div class="divider"></div>-->
                                        <h6 class="mb-0"><a href="<?php echo url('forgot-password') ?>" class="text-primary" style="font-size:14px;"><?php echo trans('login.forgot_password'); ?>?</a></h6>
                                    </div>
                                    <div class="modal-footer clearfix">
                                        <!--<div class="float-left"><a href="javascript:void(0);" class="btn-lg btn btn-link">Forgot Password?</a></div>-->
                                        <div class="float-right">
                                            <button class="btn btn-primary btn-lg"><?php echo trans('login.login_dashboard'); ?></button>
                                        </div>
                                    </div>
                                        </form>
                                </div>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Copyright © <?php echo env('APP_NAME'); echo ' '.date('Y'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<script type="text/javascript" src="<?php echo url('assets/scripts/main.07a59de7b920cd76b874.js'); ?>"></script></body>
</html>
