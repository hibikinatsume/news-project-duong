<?php /* /var/www/pj/application/views/home/layouts/main.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 16/03/2019
 * Time: 07:33
 */
?>
		<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<!-- Title -->
	<title>OWS NEWS</title>

	<!-- Favicon -->
	<link rel="icon" href="<?= base_url('assets/img/myimg/ows-1.png')?>">

	<!-- Core Stylesheet -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/jquery-treegrid/css/jquery.treegrid.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/nikki/') ?>style.css">

</head>

<body>
<?php $arr = permission(); ?>
<!-- ##### Header Area Start ##### -->
<header class="header-area">
	<!-- Navbar Area -->
	<div class="nikki-main-menu">
		<div class="classy-nav-container breakpoint-off">
			<div class="container-fluid">
				<!-- Menu -->
				<nav class="classy-navbar justify-content-between" id="nikkiNav">

					<!-- Nav brand -->
					<a href="index.html" class="nav-brand mb-2"><img src="<?= base_url('assets/img/myimg/ows-logo-01.png') ?>" alt="" style="height: 30px;"></a>

					<!-- Navbar Toggler -->
					<div class="classy-navbar-toggler">
						<span class="navbarToggler"><span></span><span></span><span></span></span>
					</div>

					<!-- Menu -->
					<div class="classy-menu">

						<!-- close btn -->
						<div class="classycloseIcon">
							<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
						</div>

						<!-- Nav Start -->
						<div class="classynav">
							<ul>
							<li><a href="<?= base_url('index.php/index')?>">Trang chủ</a></li>
							</ul>
						<?php echo e(get_all_category()); ?>


							<!-- Search Form -->
							<div class="search-form">
								<form action="#" method="get">
									<input type="button" name="search" class="form-control" style="width: 150px;">

								</form>
							</div>

							<?php if(isset($_SESSION['name'])): ?>
								<!-- Social Button -->
									<div class="dropdown show top-social-info">
										<?php if(isset($_SESSION['google']) && $_SESSION['google'] != 0): ?>
											<img src="<?= $arr->avatar ?>" style="border-radius: 50%; height: 35px; width: 35px">
										<?php else: ?>
											<img style="border-radius: 50%; height: 35px; width: 35px" src="<?= base_url('assets/upload_images/'.$arr->avatar)?>">
										<?php endif; ?>

										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Xin chào, <b><?= $_SESSION['name'] ?></b></a>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<?php if($arr->id_per == 1 || $arr->id_per == 2): ?>
													<a class="dropdown-item" href="<?= base_url('index.php/index/view_admin') ?>" style="font-size: 15px;"><i class="fas fa-tasks"></i> Quản lý</a>
												<?php endif; ?>
												<a class="dropdown-item" href="<?= base_url('index.php/users/infomation/'.$arr->id_user) ?>" style="font-size: 15px;"><i class="fas fa-address-card"></i> Thông tin cá nhân</a>
												<a class="dropdown-item" href="<?= base_url('index.php/users/logout/user') ?>" style="color: #F44336; font-size: 15px;"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
											</div>
									</div>
							<?php else: ?>
									<div class="top-social-info">
										<a href="<?= base_url('index.php/index/view_login') ?>" class="">Đăng nhập</a>
									</div>
							<?php endif; ?>


						</div>
						<!-- Nav End -->
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Hero Area Start ##### -->

	<!-- Preloader -->
	<div class="preloader d-flex align-items-center justify-content-center">
		<div class="circle-preloader">
			<div class="a" style="--n: 5;">
				<div class="dot" style="--i: 0;"></div>
				<div class="dot" style="--i: 1;"></div>
				<div class="dot" style="--i: 2;"></div>
				<div class="dot" style="--i: 3;"></div>
				<div class="dot" style="--i: 4;"></div>
			</div>
		</div>
	</div>

<?php echo $__env->yieldContent('content'); ?>


<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-12">

			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="copywrite-text">
					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="<?= base_url()?>assets/js/nikki/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="<?= base_url()?>assets/js/nikki/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="<?= base_url()?>assets/js/nikki/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="<?= base_url()?>assets/js/nikki/plugins/plugins.js"></script>
<!-- Active js -->
<script src="<?= base_url()?>assets/js/nikki/active.js"></script>
<script src="<?= base_url() ?>assets/node_modules/jquery-validation/dist/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/bower_components/jquery-treegrid/js/jquery.treegrid.js"></script>
<?php echo $__env->yieldContent('script'); ?>
</body>

</html>
