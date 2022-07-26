<?php /* /var/www/codeigniter/application/views/master/posts.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 18:05
 */
?>

<?php $__env->startSection('content'); ?>
	Posts
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>