@extends('master.layouts.main')
@section('header')
    Quản lý thông tin
@endsection
@section('title')
    Cập nhật thông tin
@endsection
@section('lead')
    Trang hiển thị form cập nhật thông tin
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Cập nhật thông tin </h4>
        </div>
        <div class="card-body">
            <form id="formRegister" action="<?= base_url('index.php/users/edit_info/'.$info->id_user.'/admin') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" value="<?= $info->name ?>" name="txtName">
                </div>
                <div class="form-group">
                    <label>Địa chỉ </label>
                    <input type="text" class="form-control" value="<?= $info->address ?>" name="txtAddress">
                </div>
                <div class="form-group">
                    <label for="introduce">Giới thiệu </label>
                    <textarea class="form-control" name="introduce" id="introduce"><?= $info->introduce ?></textarea>
                    </div>
                    @if($info->id_google == 0)
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
                                    <img id="imgPreview" src="<?= base_url('assets/upload_images/'.$info->avatar) ?>" style="width: 80%; height: 250px;">
                            </div>
                    </div>
                        @endif
                </div>
                <div class="form-group">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div>
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
        $(document).ready(function() {
            $("#formRegister").validate({
                rules: {
                    txtName: 'required'
                },
                messages: {
                    txtName: "Vui lòng nhập tên"
                }
            });
        });
    </script>
@endsection

