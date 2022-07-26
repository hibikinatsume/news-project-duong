<?php /* C:\xampp\htdocs\articles\application\views/master/users/add.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 19/03/2019
 * Time: 16:38
 */
?>

<?php $__env->startSection('header'); ?>
	Quản lý người dùng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	Thêm người dùng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
	Trang hiển thị form thêm người dùng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="card card-primary">
		<div class="card-header"><h4>Thêm người dùng</h4></div>

		<div class="card-body">
			<form method="POST" id="formRegister" action="<?= base_url('index.php/users/add_user') ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label for="last_name">Họ và tên</label>
					<input id="last_name" type="text" class="form-control" name="txtName">
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
						<input id="password" type="password" class="form-control pwstrength"
							   data-indicator="pwindicator" name="txtPassword">
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

				<div class="form-group">
					<label for="address">Địa chỉ</label>
					<input id="address" type="text" class="form-control" name="txtAddress">
					<div class="invalid-feedback">
					</div>
				</div>

				<div class="form-group">
					<label for="role">Vai trò</label>
					<select id="role" class="form-control" name="txtRole">
						<?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($item->id != 1): ?>
								<option value="<?= $item->id ?>"><?= $item->name ?></option>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<label for="image-preview" ><b>Avatar</b></label>
				<div class="form-group">
					<div class="row">
					<div class="col-sm-3">
						<div id="image-preview" class="image-preview">
							<label for="image-upload" id="image-label">Choose File</label>
							<input type="file" name="img" id="image-upload">
						</div>
					</div>
					<div class="col-sm-5">
						<img id="imgPreview" style="width: 80%; height: 250px;">
					</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block" style="width: 30%; margin: auto">
						Thêm người dùng
					</button>
				</div>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
					txtName: 'required',
					txtPassword: 'required',
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
					txtName: "Vui lòng nhập tên",
					txtPassword: 'Vui lòng nhập mật khẩu ',
					passwordConfirm: {
						required: "Vui lòng nhập lại mật khẩu ",
						equalTo: "Mật khẩu không giống nhau "
					},
					txtEmail: {
						required: "Vui lòng nhập email",
						email: "Email không đúng định dạng ",
						remote: "Email đã tồn tại"
					}

				}
			});
		});
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>