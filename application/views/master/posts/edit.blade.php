<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 18/03/2019
 * Time: 17:19
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 18/03/2019
 * Time: 17:00
 */
?>
@extends('master.layouts.main')
@section('header')
	Quản lý bài viết
@endsection
@section('title')
	Sửa bài viết
@endsection
@section('lead')
	Sủa bài viết của <b><?= $new->name_user ?></b>
@endsection
@section('content')
	<?php
	function showCategories_select($categories,$new, $parent_id = 0, $char = '&nbsp;')
	{

		foreach ($categories as $key => $item)
		{
			if ($item->id_parent == $parent_id)
			{
				echo "<option value='".$item->id."'";
				if ($item->id == $new->id_type)
					{
						echo 'selected';
					}
				echo '>';
				echo $char . $item->name;
				echo '</option>';
				unset($categories[$key]);
				showCategories_select($categories,$new, $item->id, '&nbsp;&nbsp;&nbsp;'.$char.'&nbsp;');
			}
		}
	}
	?>
	<div class="card">
		<div class="card-header">
			<h4>Cập nhật bài viết</h4>
		</div>
		<div class="card-body">
            <form action="<?= base_url('index.php/posts/edit_post/'.$new->id) ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row mb-4">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tiêu đề</label>
				<div class="col-sm-12 col-md-7">
					<input type="text" class="form-control"  name="txtTitle" value="<?= $new->title ?>">
				</div>
			</div>
			<div class="form-group row mb-4">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Danh mục </label>
				<div class="col-sm-12 col-md-7">
					<select class="form-control selectric"  name="txtCategory">
						<?php showCategories_select($type,$new); ?>
					</select>
				</div>
			</div>
			<div class="form-group row mb-4">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mô tả</label>
				<div class="col-sm-12 col-md-7">
					<textarea class="form-control" name="txtDesc"><?= $new->describe ?></textarea>
				</div>
			</div>
			<div class="form-group row mb-4">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nội dung</label>
				<div class="col-sm-12 col-md-7">
					<textarea class="" id="editor1" name="txtContent"><?= $new->content ?></textarea>
				</div>
			</div>
			<div class="form-group row mb-4">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hình nền</label>
				<div class="col-sm-3">
					<div id="image-preview" class="image-preview">
						<label for="image-upload" id="image-label">Choose File</label>
						<input type="file" name="image" id="image-upload"/>
					</div>
				</div>
				<div class="col-sm-5">
					<img id="imgPreview" src="<?= base_url('assets/upload_images/'.$new->thumbnail) ?>" style="width: 80%; height: 250px;">
				</div>
			</div>
			<div class="form-group row mb-6">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Loại tin tức</label>
				<div class="col-sm-6 col-md-7">
					<select class="form-control selectric" name="txtType">
						<option value="">Chọn loại</option>
						<option value="1" @if($new->hot == 1) selected @endif>Hot</option>
					</select>
				</div>
			</div>
			<div class="form-group row mb-4">
				<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
				<div class="col-sm-12 col-md-7">
					<a  href='<?php echo $_SERVER['HTTP_REFERER'];?>' class="btn btn-dark float-left">Trở về</a>
					<input type="submit" class="btn btn-success float-right" value="Cập nhật">
				</div>
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
		CKEDITOR.replace( 'editor1',{

		} );
	</script>
@endsection

