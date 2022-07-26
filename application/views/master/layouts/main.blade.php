<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 14:36
 */
?>
		<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Hana</title>
	<link rel="icon" type="image/png" sizes="192x192">
	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/jquery-treegrid/css/jquery.treegrid.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/select2/dist/css/select2.css">
	<link rel="stylesheet" href="<?= base_url('assets/css/combotree/style.css') ?>">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/stisla/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/stisla/components.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/mycss.css">
</head>

<body>
<?php  $arr = permission();?>
<div id="app">
	<div class="main-wrapper main-wrapper-1">
		<div class="navbar-bg" style="background-color: #34395e;"></div>
		<nav class="navbar navbar-expand-lg main-navbar">
			<form class="form-inline mr-auto">
				<ul class="navbar-nav mr-3">
					<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
					<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
				</ul>
				<div class="search-element">

				</div>
			</form>
			@if(isset($_SESSION['name']))
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							@if(isset($_SESSION['google']) && $_SESSION['google'] != 0)
								<img src="<?= $arr->avatar ?>" class="rounded-circle mr-1" style="width: 40px; height: 40px">
							@else
								<img alt="image" src="<?= base_url() ?>assets/upload_images/<?= $arr->avatar ?>" class="rounded-circle mr-1" style="width: 40px; height: 40px">
							@endif
							<div class="d-sm-none d-lg-inline-block">Xin chào, <?= $_SESSION['name'] ?></div></a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title"></div>
							<a href="<?= base_url('index.php/users/view_info/'.$_SESSION['id']) ?>" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Thông tin cá nhân
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('index.php/users/logout/admin') ?>" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Đăng xuất
							</a>
						</div>
					</li>
				</ul>
			@endif

		</nav>
		<div class="main-sidebar sidebar-style-2">
			<aside id="sidebar-wrapper">
				<div class="sidebar-brand">
					<!-- <a href="index.html"><img src="<?= base_url()?>assets/img/myimg/ows-logo-01.png" height="45px"></a> -->
				</div>
				<div class="sidebar-brand sidebar-brand-sm">
					<!-- <a href="index.html"><img src="<?= base_url()?>assets/img/myimg/ows-1.png" height="45px"></a> -->
				</div>
				<ul class="sidebar-menu">
					<li class="menu-header">Bảng điều khiển</li>
					<li class="nav-item dropdown ">
						<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Bảng điều khiển</span></a>
						<ul class="dropdown-menu">
							<li><a class="nav-link" href="<?= base_url('index.php/index/view_admin') ?>">Bảng điều khiển chung</a></li>

						</ul>
					</li>
					<li class="menu-header">Quản lý</li>
					@if(in_array('0',$arr->users) || in_array('1',$arr->users))
						<li class="nav-item dropdown ">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i><span>Người dùng</span></a>
							<ul class="dropdown-menu">
								@if(in_array('0',$arr->users) || in_array('1',$arr->users))
									<li><a class="nav-link" href="<?= base_url('index.php/users/index') ?>">Danh sách người dùng</a></li>
								@endif
								@if(in_array('0',$arr->users) || in_array('2',$arr->users))
								<li><a class="nav-link" href="<?= base_url('index.php/users/view_add') ?>">Thêm người dùng</a></li>
								@endif
							</ul>
						</li>
					@endif
					@if(in_array('0',$arr->news) || in_array('1',$arr->news))
						<li class="nav-item dropdown ">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file"></i><span>Bài viết</span></a>
							<ul class="dropdown-menu">
								@if(in_array('0',$arr->news))
									<li><a class="nav-link" href="<?= base_url('index.php/posts/index') ?>">Danh sách bài viết</a></li>
								@endif
								@if(in_array('0',$arr->news) || in_array('1',$arr->news))
									<li><a class="nav-link" href="<?= base_url('index.php/posts/my_posts/'.$_SESSION['id']) ?>">Bài viết của tôi</a></li>
								@endif
								@if(in_array('0',$arr->news) || in_array('2',$arr->news))
									<li><a class="nav-link" href="<?= base_url('index.php/posts/view_write') ?>">Viết bài</a></li>
								@endif
							</ul>
						</li>
					@endif
					@if(in_array('0',$arr->category) || in_array('1',$arr->category))
						<li class="nav-item dropdown ">
							<a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Danh mục</span></a>
							<ul class="dropdown-menu">
								@if(in_array('0',$arr->category) || in_array('1',$arr->category))
									<li><a class="nav-link" href="<?= base_url('index.php/types/index') ?>">Danh sách danh mục</a></li>
								@endif
								@if(in_array('0',$arr->category) || in_array('2',$arr->category))
									<li>
										<a class="nav-link" data-toggle="modal" data-target="#modal-02">Thêm danh mục</a>
									</li>
								@endif
							</ul>
						</li>
					@endif
					@if(in_array('0',$arr->permission) || in_array('1',$arr->permission))
						<li class="nav-item dropdown ">
							<a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Phân quyền</span></a>
							<ul class="dropdown-menu">
								@if(in_array('0',$arr->permission) || in_array('1',$arr->permission))
									<li><a class="nav-link" href="<?= base_url('index.php/permission/index') ?>">Danh sách phân quyền</a></li>
								@endif
								@if(in_array('0',$arr->permission) || in_array('2',$arr->permission))
								<li><a class="nav-link" href="<?= base_url('index.php/permission/view_add') ?>">Thêm phân quyền</a></li>
								@endif
							</ul>
						</li>
					@endif
					@if($arr->id_per == 1)
						<li class="nav-item dropdown">
							<a href="#" class="nav-link has-dropdown"><i class="fas fa-window-restore"></i><span>Sao lưu </span></a>
							<ul class="dropdown-menu">

									<li><a class="nav-link" href="<?= base_url('index.php/index/list_backup') ?>">Danh sách sao lưu </a></li>


									<li><a class="nav-link" href="<?= base_url('index.php/index/view_backup') ?>">Sao lưu </a></li>
							</ul>
						</li>
					@endif
				</ul>
			</aside>
		</div>

		<!-- Main Content -->
		<div class="main-content">
			<section class="section">
				<div class="section-header"><h1>@yield('header')</h1></div>
				<div class="section-body">
					<div class="section-title">
						@yield('title')
					</div>
					<p class="section-lead">
						@yield('lead')
					</p>
					@yield('content')

				</div>
			</section>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="modal-02" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">THÊM DANH MỤC</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="formAdd" method="post" action="<?= base_url('index.php/types/add_category') ?>">
						<div class="modal-body">
							<div class="form-group">
								<label>Tên danh mục </label>
								<input type="text" class="form-control" name="txtName">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
							<input type="submit" class="btn btn-success" value="Lưu">
						</div>
					</form>
				</div>
			</div>
		</div>
		@yield('modal')
		<footer class="main-footer">
			<div class="footer-left">
				Copyright &copy; 2019 <div class="bullet"></div>
			</div>
			<div class="footer-right">
				2.3.0
			</div>
		</footer>
	</div>
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
<script src="<?= base_url() ?>assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url() ?>assets/node_modules/jquery-validation/dist/jquery.validate.js"></script>
<script src="<?= base_url() ?>assets/node_modules/ckeditor/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/node_modules/ckfinder/ckfinder.js"></script>
<script src="<?= base_url() ?>assets/bower_components/select2/dist/js/select2.js"></script>
<script src="<?= base_url('assets/js/combotree/comboTreePlugin.js')?>"></script>
<script src="<?= base_url('assets/js/combotree/icontains.js')?>"></script>
<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="<?= base_url() ?>assets/js/stisla/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/stisla/custom.js"></script>
@yield('script')
</body>
</html>


