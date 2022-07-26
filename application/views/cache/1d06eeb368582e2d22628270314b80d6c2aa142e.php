<?php /* C:\xampp\htdocs\articles\application\views/master/backup/list.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 17:14
 */
?>

<?php $__env->startSection('header'); ?>
    Quản lý sao lưu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Sao lưu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
    Bảng hiển thị danh sách sao lưu
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $arr = permission(); ?>
    <div class="card">
        <div class="card-header"><h4>Sao lưu</h4></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md" style="text-align: center;">
                    <tr>
                        <th>#</th>
                        <th>Tên file</th>
                        <th>Ngày tạo</th>
                        <th width="18%" style="text-align:center">Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $item['path'] ?></td>
                            <td><?= $item['create_at'] ?></td>
                            <td style="text-align:center">
                                <a href="<?= base_url('index.php/index/restore/' . $item['path']) ?>" style="background-color: #E91E63" class="btn btn-icon" data-toggle='tooltip' data-placement='top' title='' data-original-title='Restore'><i class="fas fa-retweet"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </table>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>