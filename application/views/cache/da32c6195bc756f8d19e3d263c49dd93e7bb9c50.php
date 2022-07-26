<?php /* C:\xampp\htdocs\articles\application\views/home/info.blade.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>OWS News</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/node_modules/summernote/dist/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/stisla/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/stisla/components.css">
</head>

<body>
        <!-- Main Content -->
        <div class="card-body">
            <section class="section">
                <div class="section-header">
                    <h1>Thông tin cá nhân</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a  href='<?= base_url('index.php/index/index') ?>' class="btn btn-dark float-left">Trở về</a></div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">Xin chào, <?= $info->name ?></h2>
                    <p class="section-lead">
                    </p>

                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card profile-widget">
                                <div class="profile-widget-header">
                                    <img alt="image" style="width: 150px; height: 150px;" src="<?= base_url('assets/upload_images/'.$info->avatar) ?>" class="rounded-circle profile-widget-picture">
                                    <div class="profile-widget-items">
                                        <?php if($info->id_per == 1 || $info->id_per == 2): ?>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Số bài viết</div>
                                            <div class="profile-widget-item-value"><?= $info->news ?></div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Bình luận </div>
                                            <div class="profile-widget-item-value"><?= $info->comments ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name"><?= $info->name ?>
                                        <div class="text-muted d-inline font-weight-normal">
                                            <div class="slash"></div> <?= $info->name_per ?></div>
                                    </div>
                                    <p><?= $info->introduce ?></p>
                                </div>
                                <?php if($info->password != ''): ?>
                                <div class="card-footer text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Đổi mật khẩu
                                    </button>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="card">
                                <div class="card-header"><h3>Cập nhật thông tin </h3></div>
                                <div class="card-body">
                                <form action="<?= base_url('index.php/users/edit_info/'.$info->id_user.'/user') ?>" method="post" enctype="multipart/form-data">
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
                                    <?php if($info->id_google == 0): ?>
                                        <label for="image-preview" ><b>Avatar</b></label>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div id="image-preview" class="image-preview">
                                                        <label for="image-upload" id="image-label">Choose File</label>
                                                        <input type="file" name="img" id="image-upload">
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <img id="imgPreview" src="<?= base_url('assets/upload_images/'.$info->avatar) ?>" style="width: 100%; height: 250px;">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div>
                                                <input type="submit" class="btn btn-success float-right" value="Cập nhật">
                                            </div>
                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('index.php/users/change_pass/'.$info->id_user.'/user') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Mật khẩu cũ</label>
                                <input type="password" class="form-control" name="txtOld">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu mới</label>
                                <input type="password" class="form-control" name="txtNew">
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input type="password" class="form-control" name="txtAgain">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <input type="submit" class="btn btn-primary">
                    </div>
                   </form>
                </div>
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
<script src="<?= base_url() ?>assets/node_modules/summernote/dist/summernote-bs4.js"></script>

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="<?= base_url() ?>assets/js/stisla/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/stisla/custom.js"></script>
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
        </script>
</body>
</html>
