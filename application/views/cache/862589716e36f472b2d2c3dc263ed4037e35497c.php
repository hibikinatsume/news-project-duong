<?php /* /var/www/articles/application/views/users/login.blade.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo e(base_url('assets/img')); ?>/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('vendor')); ?>/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('assets/fonts')); ?>/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('assets/fonts')); ?>/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('vendor')); ?>/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('vendor')); ?>/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('vendor')); ?>/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('vendor')); ?>/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('vendor')); ?>/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('assets/')); ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(base_url('assets/')); ?>css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-85 p-b-20">
            <form class="login100-form validate-form">
					<span class="login100-form-title p-b-70">
						Welcome
					</span>
                <span class="login100-form-avatar">
						<img src="<?php echo e(base_url('assets/img/myimg')); ?>/logo-tech2x.png" alt="AVATAR" width="200px" height="100px">
					</span>

                <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter email">
                    <input class="input100" type="email" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

                <ul class="login-more p-t-190">
                    <li>
							<span class="txt1">
								Don’t have an account?
							</span>

                        <a href="#" class="txt2">
                            Sign up
                        </a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?php echo e(base_url('vendor')); ?>/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo e(base_url('vendor')); ?>/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo e(base_url('vendor')); ?>/bootstrap/js/popper.js"></script>
<script src="<?php echo e(base_url('vendor')); ?>/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo e(base_url('vendor')); ?>/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?php echo e(base_url('vendor')); ?>/daterangepicker/moment.min.js"></script>
<script src="<?php echo e(base_url('vendor')); ?>/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?php echo e(base_url('vendor')); ?>/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?php echo e(base_url('assets/')); ?>js/main.js"></script>

</body>
</html>