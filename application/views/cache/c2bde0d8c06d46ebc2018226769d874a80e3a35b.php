<?php /* C:\xampp\htdocs\articles\application\views/master/posts/write.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 18/03/2019
 * Time: 17:00
 */
?>

<?php $__env->startSection('header'); ?>
	Quản lý bài viết
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
	Viết bài mới
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
	Trang tạo bài viết mới
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<?php
	function showCategories_select($categories, $parent_id = 0, $char = '-&nbsp;')
	{
		foreach ($categories as $key => $item)
		{
			// Nếu là chuyên mục con thì hiển thị
			if ($item->id_parent == $parent_id)
			{
				echo '<option value="'.$item->id.'">';
				echo $char . $item->name;
				echo '</option>';

				// Xóa chuyên mục đã lặp
				unset($categories[$key]);

				// Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
				showCategories_select($categories, $item->id, '&nbsp;&nbsp;&nbsp;'.$char.'&nbsp;');
			}
		}
	}
	?>
	<div class="card">
		<div class="card-header">
			<h4>Viết bài của bạn</h4>
		</div>
		<div class="card-body">
			<form action="<?= base_url('index.php/posts/add_post') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tiêu đề</label>
				<div class="col-sm-12 col-md-7">
					<input type="text" class="form-control" name="txtTitle">
				</div>
			</div>
			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Danh mục </label>
				<div class="col-sm-12 col-md-7">
					<select class="form-control selectric" name="txtCategory">
						<?php showCategories_select($type); ?>
					</select>
				</div>
			</div>
			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mô tả</label>
				<div class="col-sm-12 col-md-7">
					<textarea name="txtDesc" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nội dung</label>
				<div class="col-sm-12 col-md-7">
					<textarea id="editor1" name="txtContent"></textarea>
				</div>
			</div>
			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hình nền</label>
				<div class="col-sm-3">
					<div id="image-preview" class="image-preview">
						<label for="image-upload" id="image-label">Choose File</label>
						<input type="file" name="image" id="image-upload" />
					</div>

				</div>
				<div class="col-sm-5">
					<img id="imgPreview" style="width: 80%; height: 250px;">
				</div>
			</div>

			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Loại tin tức</label>
				<div class="col-sm-6 col-md-7">
					<select class="form-control selectric" name="txtType">
						<option value="">Chọn loại</option>
						<option value="1">Hot</option>
					</select>
				</div>
			</div>
			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
				<div class="col-sm-6 col-md-7">
					<select class="form-control selectric" name="txtStatus">
						<option value="2">Pending</option>
					</select>
				</div>
			</div>
			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
				<div class="col-sm-12 col-md-7 text-center">
					<button class="btn btn-success " ><i class="fas fa-check"></i> Tạo bài viết </button>
				</div>
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
		CKEDITOR.replace( 'editor1',{

		} );
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>