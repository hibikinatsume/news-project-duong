<?php /* /var/www/codeigniter/application/views/master/index.blade.php */ ?>
<?php $__env->startSection('header'); ?>
	Bảng điều khiển
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	Bảng điều khiển chung
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-primary">
					<i class="far fa-user"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Total Member</h4>
					</div>
					<div class="card-body">
						<?=

						$dashbroad['member'] ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-danger">
					<i class="far fa-newspaper"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>News</h4>
					</div>
					<div class="card-body">
						<?= $dashbroad['news'] ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-warning">
                    <i class="fas fa-eye"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Views</h4>
					</div>
					<div class="card-body">
                        <?= $dashbroad['view'] ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-success">
                    <i class="fas fa-comments"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Comments</h4>
					</div>
					<div class="card-body">
                        <?= $dashbroad['comments'] ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>