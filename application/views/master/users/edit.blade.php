<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 19/03/2019
 * Time: 16:38
 */
?>
@extends('master.layouts.main')
@section('header')
	Quản lý người dùng
@endsection
@section('title')
	Cập nhật người dùng
@endsection
@section('lead')
	Trang hiển thị form sửa người dùng
@endsection
@section('content')
	<div class="card card-primary">
		<div class="card-header"><h4>Cập nhật người dùng</h4></div>

		<div class="card-body">
			<form method="POST" id="formRegister" action="<?= base_url('index.php/users/edit_user/'.$user->id_user) ?>" enctype="multipart/form-data">
				<input type="hidden" value="<?= $user->id_user ?>" id="txtId">
				<div class="form-group">
					<label for="last_name">Họ và tên</label>
					<input id="last_name" type="text" class="form-control" name="txtName" value="<?= $user->name ?>">
				</div>

				<div class="form-group">
					<label for="email">Email</label>
					<input id="email" type="email" class="form-control" name="txtEmail" value="<?= $user->email ?>">
					<div class="invalid-feedback">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-6">
						<label for="password" class="d-block">Mật khẩu</label>
						<input id="password" type="password" class="form-control pwstrength"
							   data-indicator="pwindicator" name="txtPassword" value="<?= $user->password ?>">
						<div id="pwindicator" class="pwindicator">
							<div class="bar"></div>
							<div class="label"></div>
						</div>
					</div>
					<div class="form-group col-6">
						<label for="password2" class="d-block">Xác nhận mật khẩu</label>
						<input id="password2" type="password" class="form-control" name="passwordConfirm" value="<?= $user->password ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="address">Địa chỉ</label>
					<input id="address" type="text" class="form-control" name="txtAddress" value="<?= $user->address ?>">
					<div class="invalid-feedback">
					</div>
				</div>
				<div class="form-group">
					<label for="role">Vai trò</label>
					<select id="role" class="form-control" name="txtRole">
						@foreach($role as $key => $item)
							@if($item->id != 1)
								<option value="<?= $item->id ?>" @if($user->id_per == $item->id) selected @endif><?= $item->name ?></option>
							@endif
						@endforeach
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
							<img id="imgPreview" src="<?= base_url('assets/upload_images/'.$user->avatar) ?>" style="width: 80%; height: 250px;">
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg btn-block" style="width: 30%; margin: auto">
						Cập nhật người dùng
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('script')
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
			var id = $('#txtId').val();
			$("#formRegister").validate({
				rules: {
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
							url: '<?= base_url() ?>/index.php/index/check_mail_edit',
							type: 'post',
							async: false,
							data: {id : id}
						}
					}

				},
				messages: {
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
@endsection
