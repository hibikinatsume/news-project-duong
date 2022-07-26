<?php /* /var/www/codeigniter/application/views/master/info.blade.php */ ?>
<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 m-auto">
				<div class="card card-profile">
					<div class="card-avatar">
						<a href="#hana">
							<img class="img" src="<?= base_url() ?>assets/img/myimg/avatar.jpg"/>
						</a>
					</div>
					<div class="card-body">
						<h6 class="card-category text-gray">OWS News / Master</h6>
						<h2 class="card-title">Hana</h2>
						<p class="card-description">
							Hello everyone, my name is Hana. Some of the favorite books are science fiction, detective, history and art.
							In my spare time, I also take an online piano course. In the future, I will try to get more
							experience to pursue the dream of becoming a famous pianist performing in the world.
						</p>
						<div class="mt-5">
						<a href="#hana" class="btn btn-primary btn-round mr-3 btn-br">Edit Infomation</a>
						<a href="#hana" class="btn btn-primary btn-round ml-3 btn-br">Change Password</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>