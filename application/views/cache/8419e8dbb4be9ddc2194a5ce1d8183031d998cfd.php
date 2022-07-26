<?php /* /var/www/codeigniter/application/views/master/users/users.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 17:14
 */
?>

<?php $__env->startSection('header'); ?>
	Quản lý người dùng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	Danh sách người dùng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
	Bảng hiển thị danh sách người dùng
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<?php $arr = permission(); ?>
	<div class="card">
		<div class="card-header"><h4>Users</h4></div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-md" style="text-align: center;">
					<tr>
						<th>#</th>
						<th>Họ và tên</th>
						<th>Email</th>
						<th>Address</th>
						<th>Vài trò</th>
						<th width="18%" style="text-align:center">Action</th>
					</tr>
					<?php $i = 1; ?>
					<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $item->name_user ?></td>
							<td><?= $item->email ?></td>
							<td><?= $item->address ?></td>
							<td>
								<?php if($item->id_per == 1): ?>
									<div class="badge badge-secondary"><?= $item->name_per ?></div>
								<?php elseif($item->id_per == 2): ?>
									<div class="badge badge-warning"><?= $item->name_per ?></div>
								<?php elseif($item->id_per == 3): ?>
									<div class="badge badge-info"><?= $item->name_per ?></div>
								<?php endif; ?>

							</td>
							<td style="text-align:center">
								<?php if(in_array('0',$arr->users) || in_array('3',$arr->users) || in_array('4',$arr->users)): ?>
									<?php if(in_array('0',$arr->users) || in_array('3',$arr->users)): ?>
										<a href="<?= base_url('index.php/users/view_edit/' . $item->id_user) ?>" class="btn btn-icon btn-success"><i class="far fa-edit"></i> Sửa</a>
									<?php endif; ?>
									<?php if(in_array('0',$arr->users) || in_array('4',$arr->users)): ?>
										<a href="<?= base_url('index.php/users/remove_user/' . $item->id_user) ?>" onClick="return confirm(`Are you sure?`)" class="btn btn-icon btn-danger"><i class="fas fa-times"></i> Xóa</a>
									<?php endif; ?>
								<?php else: ?>
									Not action
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


				</table>
			</div>
		</div>
		<div>
			<ul class="pagination justify-content-center" style="padding: 3%;">
				<?php
				if ($current_page > 1 && $total_page > 1) {
					echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/users/index/?page=' . ($current_page - 1) . "'><i class='fas fa-chevron-left'></i></a></li>";
				}
				for ($i = 1; $i <= $total_page; $i++) {
					if ($i == $current_page) {
						echo "<li class='page-item active'><span class='page-link bg-primary'>" . $i . "</span></li>";
					} else {
						echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/users/index/?page=' . $i . "'><span>" . $i . "</span></a></li>";
					}
				}
				if ($current_page < $total_page && $total_page > 1) {
					echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/users/index/?page=' . ($current_page + 1) . "'><i class='fas fa-chevron-right'></i></a></li>";
				}
				?>
			</ul>
		</div>
	</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>