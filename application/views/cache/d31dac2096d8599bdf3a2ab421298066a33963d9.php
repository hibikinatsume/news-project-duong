<?php /* /var/www/codeigniter/application/views/master/users.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 17:14
 */
?>

<?php $__env->startSection('content'); ?>
	<div class="card">
		<div class="card-header card-header-primary">
			<h3 class="card-title ">List Users</h3>
			<p class="card-category">This table display list users</p>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table">
					<thead class=" text-primary">
					<th>
						#
					</th>
					<th>
						Name
					</th>
					<th>
						Email
					</th>
					<th>
						Role
					</th>
					<th>
					</th>
					</thead>
					<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							Hana
						</td>
						<td>
							hana@gmail.com
						</td>
						<td>
							Master
						</td>
						<td class="td-actions text-right">
							<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
								<i class="material-icons">edit</i>
							</button>
							<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
								<i class="material-icons">close</i>
							</button>
						</td>
					</tr>
					<tr>
						<td>
							2
						</td>
						<td>
							Yuna
						</td>
						<td>
							yuna@gmail.com
						</td>
						<td>
							Mod
						</td>
						<td class="td-actions text-right">
							<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
								<i class="material-icons">edit</i>
							</button>
							<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
								<i class="material-icons">close</i>
							</button>
						</td>
					</tr>
					<tr>
						<td>
							3
						</td>
						<td>
							Luna
						</td>
						<td>
							luna@gmail.com
						</td>
						<td>
							Mod
						</td>
						<td class="td-actions text-right">
							<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
								<i class="material-icons">edit</i>
							</button>
							<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
								<i class="material-icons">close</i>
							</button>
						</td>
					</tr>
					<tr>
						<td>
							4
						</td>
						<td>
							Anna
						</td>
						<td>
							anna@gmail.com
						</td>
						<td>
							User
						</td>
						<td class="td-actions text-right">
							<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
								<i class="material-icons">edit</i>
							</button>
							<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
								<i class="material-icons">close</i>
							</button>
						</td>
					</tr>
					<tr>
						<td>
							5
						</td>
						<td>
							Mina
						</td>
						<td>
							mina@gmail.com
						</td>
						<td>
							User
						</td>
						<td class="td-actions text-right">
							<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
								<i class="material-icons">edit</i>
							</button>
							<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
								<i class="material-icons">close</i>
							</button>
						</td>
					</tr>
					<tr>
						<td>
							6
						</td>
						<td>
							Lena
						</td>
						<td>
							lena@gmail.com
						</td>
						<td>
							User
						</td>
						<td class="td-actions text-right">
							<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
								<i class="material-icons">edit</i>
							</button>
							<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
								<i class="material-icons">close</i>
							</button>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>