<?php /* /var/www/articles/application/views/register.blade.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Register</title>
	<link rel="icon" type="image/png"  sizes="192x192">
	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/selectric/public/selectric.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/summernote/dist/summernote-bs4.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/owl.carousel/dist/assets/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/owl.carousel/dist/assets/owl.theme.default.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/jquery-treegrid/css/jquery.treegrid.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/dist/css/select2.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/combotree/style.css') ?>">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/stisla/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/stisla/components.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/mycss.css">
</head>

<body>
<div id="app">
	<section class="section">
		<div class="container mt-5">
			<div class="row">
				<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
					<div class="login-brand">
						<img src="<?= base_url() ?>assets/img/stisla/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
					</div>

					<div class="card card-primary">
						<div class="card-header"><h4>Đăng ký tài khoản</h4></div>

						<div class="card-body">
							<form method="POST" id="formRegister" action="<?= base_url('index.php/users/register') ?>" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group col-12">
										<label for="frist_name">Họ và tên</label>
										<input id="frist_name" type="text" class="form-control" name="name" autofocus>
									</div>
								</div>

								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" name="txtEmail">
									<div class="invalid-feedback">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-6">
										<label for="password" class="d-block">Mật khẩu</label>
										<input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
										<div id="pwindicator" class="pwindicator">
											<div class="bar"></div>
											<div class="label"></div>
										</div>
									</div>
									<div class="form-group col-6">
										<label for="password2" class="d-block">Xác nhận mật khẩu</label>
										<input id="password2" type="password" class="form-control" name="passwordConfirm">
									</div>
								</div>

								<div class="row">
									<div class="form-group col-12">
										<label for="address">Địa chỉ</label>
										<input id="address" type="text" class="form-control" name="address" >
									</div>
								</div>
								<div class="row">
									<div class="form-group col-12">
										<label for="introduce">Giới thiệu </label>
										<textarea class="form-control" name="introduce" id="introduce"></textarea>
									</div>
								</div>
								<label for="image-preview" ><b>Avatar</b></label>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-5">
											<div id="image-preview" class="image-preview">
												<label for="image-upload" id="image-label">Choose File</label>
												<input type="file" name="img" id="image-upload">
											</div>
										</div>
										<div class="col-sm-5">
											<img id="imgPreview" style="width: 100%; height: 250px;">
										</div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-lg btn-block">
										Register
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="simple-footer">
						Copyright &copy; Stisla 2018
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
<script src="<?= base_url() ?>assets/bower_components/jquery-treegrid/js/jquery.treegrid.js"></script>
<script src="<?= base_url() ?>assets/node_modules/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/node_modules/chart.js/dist/Chart.js"></script>
<script src="<?= base_url() ?>assets/node_modules/owl.carousel/dist/owl.carousel.js"></script>
<script src="<?= base_url() ?>assets/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="<?= base_url() ?>assets/node_modules/chocolat/dist/js/jquery.chocolat.js"></script>
<script src="<?= base_url() ?>assets/node_modules/jquery-validation/dist/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/bower_components/select2/dist/js/select2.js"></script>
<script src="<?= base_url('assets/js/combotree/comboTreePlugin.js')?>"></script>
<script src="<?= base_url('assets/js/combotree/icontains.js')?>"></script>
<!-- Page Specific JS File -->


<!-- Template JS File -->
<script src="<?= base_url() ?>assets/js/stisla/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/stisla/custom.js"></script>
<script>
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#imgPreview').attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#image-upload").change(function() {
		readURL(this);
	});
	$(document).ready(function() {
		$("#formRegister").validate({
			rules: {
				img: {
					required: true
				},
				name: 'required',
				password: 'required',
				passwordConfirm: {
					required: true,
					equalTo: "#password"
				},
				txtEmail: {
					required: true,
					email: true,
					remote: {
						url: '<?= base_url() ?>/index.php/index/check_mail',
						type: 'post',
						async: false,
						data: {id: ''}
					}
				}

			},
			messages: {
				img: {
					required: "Vui lòng chon avatar"
				},
				name: "Vui lòng nhập tên",
				password: 'Vui lòng nhập mật khẩu ',
				passwordConfirm: {
					required: "Vui lòng nhập lại mật khẩu ",
					equalTo: "Mật khẩu không giống nhau "
				},
				email: {
					required: "Vui lòng nhập email",
					email: "Email không đúng định dạng ",
					remote: "Email đã tồn tại"
				}

			}
		});
	});
</script>
</body>
</html>