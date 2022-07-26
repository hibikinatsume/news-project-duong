<?php /* C:\xampp\htdocs\articles\application\views/master/backup/backup.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 18/03/2019
 * Time: 17:00
 */
?>

<?php $__env->startSection('header'); ?>
    Quản lý sao lưu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Thêm sao lưu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
    Trang thêm sao lưu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h4>Sao lưu dữ liệu</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('index.php/index/backup')?>">
                <div class="form-group row mb-6">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tên file</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" id="name" class="form-control" name="txtName">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </div>

            </form>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>