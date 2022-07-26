<?php /* /var/www/codeigniter/application/views/master/permission/add.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 19/03/2019
 * Time: 16:38
 */
?>

<?php $__env->startSection('header'); ?>
    Quản lý phân quyền
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Thêm phân quyền
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
    Trang hiển thị form thêm phân quyền
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card card-primary">
        <div class="card-header"><h4>Thêm phân quyền</h4></div>

        <div class="card-body">
            <form method="POST" action="<?= base_url('index.php/permission/add_per') ?>">
                <div class="form-group">
                    <label for="last_name">Vai trò </label>
                    <input id="last_name" type="text" class="form-control" name="txtName">
                </div>

                <div class="form-group">
                    <label for="email">User</label>
                    <select class="form-control js-example-basic-multiple" name="users[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">News</label>
                    <select class="form-control js-example-basic-multiple" name="news[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Permission</label>
                    <select class="form-control js-example-basic-multiple" name="permission[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Category</label>
                    <select class="form-control js-example-basic-multiple" name="category[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Comments</label>
                    <select class="form-control js-example-basic-multiple" name="comments[]" multiple="multiple" style="width: 100%;">
                        <option value="0">Tất cả </option>
                        <option value="1">Xem </option>
                        <option value="2">Thêm </option>
                        <option value="3">Sửa </option>
                        <option value="4">Xóa </option>
                    </select>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg btn-block" style="width: 30%; margin: auto" value="Thêm phân quyền">
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                placeholder: "Chọn phân quyền"
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>