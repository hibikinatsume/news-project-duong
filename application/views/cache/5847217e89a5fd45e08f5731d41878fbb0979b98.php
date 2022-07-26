<?php /* /var/www/articles/application/views/login.blade.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Login</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-social/bootstrap-social.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/stisla/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/stisla/components.css">
</head>

<body>
<?php $_SESSION['key'] = 'user'; ?>
<div id="app">
	<section class="section">
		<div class="d-flex flex-wrap align-items-stretch">
			<div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
				<div class="p-4 m-3">
					<img src="<?= base_url() ?>assets/img/stisla/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
					<h4 class="text-dark font-weight-normal mb-5">Welcome to <span class="font-weight-bold">OWS News</span></h4>

					<form method="POST" action="<?= base_url('index.php/users/check_login/user') ?>" class="needs-validation" novalidate="">
						<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" <?php if(isset($_COOKIE['emailUser'])): ?>  value="<?= $_COOKIE['emailUser'] ?>" <?php endif; ?> class="form-control" name="email" tabindex="1" required autofocus>
							<div class="invalid-feedback">
								Vui lòng nhập email
							</div>
						</div>

						<div class="form-group">
							<div class="d-block">
								<label for="password" class="control-label">Password</label>
							</div>
							<input id="password" type="password" <?php if(isset($_COOKIE['passwordUser'])): ?> value="<?= $_COOKIE['passwordUser'] ?>" <?php endif; ?> class="form-control" name="password" tabindex="2" required>
							<div class="invalid-feedback">
								Vui lòng nhập mật khẩu
							</div>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="rememberUser" <?php if(isset($_COOKIE['emailUser'])): ?> checked <?php endif; ?> class="custom-control-input" tabindex="3" id="remember-me">
								<label class="custom-control-label" for="remember-me">Remember Me</label>
							</div>
						</div>

						<div class="form-group text-center">

							<button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" style="width: 100%;" tabindex="4">
								Đăng nhập
							</button>
						</div>
						<div class="form-group text-center">

							<a href="<?= base_url('index.php/users/loginGoogle?key=user') ?>"  class="btn btn-danger btn-lg btn-icon icon-right" tabindex="4" style="width: 100%;">
								<i class="fab fa-google"></i> Đăng nhập với Google
							</a>
						</div>
					</form>

					<div class="text-center mt-5 text-small">
						Copyright &copy; Your Company. Made with 💙by OWS.
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url() ?>assets/img/stisla/unsplash/login-bg.jpg">
				<div class="absolute-bottom-left index-2">
					<div class="text-light p-5 pb-2">
						<div class="mb-5 pb-3">
							<h1 class="mb-2 display-4 font-weight-bold">Hello</h1>
							<h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
						</div>
						Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() ?>assets/js/stisla/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="<?= base_url() ?>assets/js/stisla/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/stisla/custom.js"></script>
</body>
</html>
