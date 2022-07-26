<?php /* /var/www/codeigniter/application/views/master/info/info.blade.php */ ?>
<?php $__env->startSection('header'); ?>
    Quản lý thông tin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Thông tin cá nhân
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
    Trang hiển thị thông tin cá nhân
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card profile-widget">
        <div class="profile-widget-header">
            <?php if(isset($_SESSION['google']) && $_SESSION['google'] != 0): ?>
                <img src="<?= $info->avatar ?>" class="rounded-circle mr-1" style="width: 200px; height: 200px;">
            <?php else: ?>
                <img alt="image" src="<?= base_url() ?>assets/upload_images/<?= $info->avatar ?>"
                     style="width: 200px; height: 200px;" class="rounded-circle profile-widget-picture">
            <?php endif; ?>
            <div class="profile-widget-items">
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Số bài viết</div>
                    <div class="profile-widget-item-value"><?= $info->news ?></div>
                </div>
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Bình luận</div>
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
        <div class="card-footer text-center">
            <a href="<?= base_url('index.php/users/view_edit_info/'.$info->id_user) ?>" class="btn btn-icon icon-left float-left" style="background-color: #34395e; color: #fff;"><i class="far fa-edit"></i>Cập nhật thông tin</a>
            <?php if($info->password != ''): ?>
            <a href="<?= base_url('index.php/users/view_pass/'.$info->id_user) ?>" class="btn btn-icon icon-left float-right" style="background-color: #34395e; color: #fff;"><i class="far fa-edit"></i>Đổi mật khẩu</a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>