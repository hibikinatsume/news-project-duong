<?php /* C:\xampp\htdocs\articles\application\views/master/permission/per.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 18:05
 */
?>

<?php $__env->startSection('header'); ?>
	Quản lý phân quyền
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	Danh sách phân quyền
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
	Trang hiển thị danh sách phân quyền
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<?php $arr = permission(); ?>
	<div class="card">
		<div class="card-header"><h4>Phân quyền</h4></div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-md" style="text-align: center;">
					<tr>
						<th>#</th>
						<th>Vai trò</th>
						<th>News</th>
						<th>Users</th>
						<th>Category</th>
						<th>Permission</th>
						<th>Comment</th>
						<th width="18%" style="text-align:center">Action</th>
					</tr>
					<?php $i = 1; ?>
					<?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><b><?= $item->name ?></b></td>
							<td>
								<?php $html = ""; ?>
								<?php if(in_array('0',$item->news)): ?>
									<?php $html .= "<div class='badge badge-secondary'>Tất cả</div>" ?>
								<?php endif; ?>
								<?php if(in_array('1',$item->news)): ?>
									<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='View'><i class='fas fa-eye'></i> </div >" ?>
								<?php endif; ?>
								<?php if(in_array('2',$item->news)): ?>
									<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Insert'><i class='fas fa-plus'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('3',$item->news)): ?>
									<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Update'><i class='fas fa-pen'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('4',$item->news)): ?>
									<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'><i class='fas fa-trash'></i></div >" ?>
								<?php endif; ?>
								<?= $html ?>
							</td>
							<td>
								<?php $html = ""; ?>
								<?php if(in_array('0',$item->users)): ?>
									<?php $html .= "<div class='badge badge-secondary'>Tất cả</div>" ?>
								<?php endif; ?>
								<?php if(in_array('1',$item->users)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='View'><i class='fas fa-eye'></i> </div >" ?>
								<?php endif; ?>
								<?php if(in_array('2',$item->users)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Insert'><i class='fas fa-plus'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('3',$item->users)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Update'><i class='fas fa-pen'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('4',$item->users)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'><i class='fas fa-trash'></i></div >" ?>
								<?php endif; ?>
								<?= $html ?>
							</td>
							<td>
								<?php $html = ""; ?>
								<?php if(in_array('0',$item->category)): ?>
									<?php $html .= "<div class='badge badge-secondary'>Tất cả</div>" ?>
								<?php endif; ?>
								<?php if(in_array('1',$item->category)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='View'><i class='fas fa-eye'></i> </div >" ?>
								<?php endif; ?>
								<?php if(in_array('2',$item->category)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Insert'><i class='fas fa-plus'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('3',$item->category)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Update'><i class='fas fa-pen'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('4',$item->category)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'><i class='fas fa-trash'></i></div >" ?>
								<?php endif; ?>
								<?= $html ?>
							</td>
							<td>
								<?php $html = ""; ?>
								<?php if(in_array('0',$item->permission)): ?>
									<?php $html .= "<div class='badge badge-secondary'>Tất cả</div>" ?>
								<?php endif; ?>
								<?php if(in_array('1',$item->permission)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='View'><i class='fas fa-eye'></i> </div >" ?>
								<?php endif; ?>
								<?php if(in_array('2',$item->permission)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Insert'><i class='fas fa-plus'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('3',$item->permission)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Update'><i class='fas fa-pen'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('4',$item->permission)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'><i class='fas fa-trash'></i></div >" ?>
								<?php endif; ?>
								<?= $html ?>
							</td>
							<td>
								<?php $html = ""; ?>
								<?php if(in_array('0',$item->comments)): ?>
									<?php $html .= "<div class='badge badge-secondary'>Tất cả</div>" ?>
								<?php endif; ?>
								<?php if(in_array('1',$item->comments)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='View'><i class='fas fa-eye'></i> </div >" ?>
								<?php endif; ?>
								<?php if(in_array('2',$item->comments)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Insert'><i class='fas fa-plus'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('3',$item->comments)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Update'><i class='fas fa-pen'></i></div >" ?>
								<?php endif; ?>
								<?php if(in_array('4',$item->comments)): ?>
										<?php $html .= "<div  class='badge badge-secondary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'><i class='fas fa-trash'></i></div >" ?>
								<?php endif; ?>
								<?= $html ?>
							</td>
							<td style="text-align:center">
								<?php if(in_array('0',$arr->permission) || in_array('3',$arr->permission) || in_array('4',$arr->permission)): ?>
									<?php if(in_array('0',$arr->permission) || in_array('3',$arr->permission)): ?>
										<a href="<?= base_url('index.php/permission/view_edit/'.$item->id) ?>" class="btn btn-icon btn-success"><i class="far fa-edit"></i> Sửa</a>
									<?php endif; ?>
									<?php if(in_array('0',$arr->permission) || in_array('4',$arr->permission)): ?>
										<a href="<?= base_url('index.php/permission/remove_per/'.$item->id) ?>" onclick="return confirm('Are you sure?')" class="btn btn-icon btn-danger"><i class="fas fa-times"></i> Xóa</a>
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
					echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/permission/index/?page=' . ($current_page - 1) . "'><i class='fas fa-chevron-left'></i></a></li>";
				}
				for ($i = 1; $i <= $total_page; $i++) {
					if ($i == $current_page) {
						echo "<li class='page-item active'><span class='page-link bg-primary'>" . $i . "</span></li>";
					} else {
						echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/permission/index/?page=' . $i . "'><span>" . $i . "</span></a></li>";
					}
				}
				if ($current_page < $total_page && $total_page > 1) {
					echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/permission/index/?page=' . ($current_page + 1) . "'><i class='fas fa-chevron-right'></i></a></li>";
				}
				?>
			</ul>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>