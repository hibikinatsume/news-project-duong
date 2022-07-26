<?php /* /var/www/codeigniter/application/views/master/info/changepass.blade.php */ ?>
<?php $__env->startSection('header'); ?>
    Quản lý thông tin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Cập nhật mật khẩu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
    Trang hiển thị form đổi mật khẩu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h4>Thay đổi mật khẩu </h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('index.php/users/change_pass/'.$info->id_user.'/admin') ?>" id="formRegister" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $info->id_user ?>" id="txtId">
                    <div class="form-group">
                        <label>Mật khẩu cũ</label>
                        <input type="password" class="form-control" name="txtOld">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" id="password" class="form-control" name="txtNew">
                    </div>
                    <div class="form-group">
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" name="txtAgain">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            var id = $('#txtId').val();
            $("#formRegister").validate({
                rules: {
                    txtOld: {
                        required: true,
                        remote: {
                            url: '<?= base_url() ?>/index.php/index/check_pass',
                            type: 'post',
                            async: false,
                            data: {id: id}
                        }
                    },
                    txtNew: 'required',
                    txtAgain: {
                        required: true,
                        equalTo: "#password"
                    }

                },
                messages: {
                    txtOld: {
                        required: "Vui lòng nhập mật khẩu cũ",
                        remote: "Mật khẩu cũ không chính xác"
                    },
                    txtNew: 'Vui lòng nhập mật khẩu mới ',
                    txtAgain: {
                        required: "Vui lòng nhập lại mật khẩu",
                        equalTo: "Mật khẩu không giống nhau "
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>