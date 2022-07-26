<?php /* C:\xampp\htdocs\articles\application\views/users/index.blade.php */ ?>
<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row small-gutters">
                    <div class="col-lg-8 top-post-left">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" style="width: 756.66px; height: 442.89px;"
                                 src="<?php echo e(base_url('assets/upload_images')); ?>/<?php echo e($hot->thumbnail); ?>" alt="">
                        </div>
                        <div class="top-post-details">
                            <ul class="tags">
                                <li><a href="<?php echo e(base_url('index.php/index/category/'.$hot->id_type)); ?>"><b><?php echo e($hot->name_type); ?></b></a></li>
                            </ul>
                            <a href="<?php echo e(base_url('index.php/index/detail/'.$hot->id)); ?>">
                                <h3><?php echo e($hot->title); ?></h3>
                            </a>
                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span><?php echo e($hot->name_user); ?></a></li>
                                <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo e(date("j F, Y",strtotime($hot->day_update))); ?></a></li>
                                <li><a href="#"><span class="lnr lnr-bubble"></span><?php echo e($hot->comment['count']); ?> Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 top-post-right">
                        <?php $i = 1; ?>
                        <?php $__currentLoopData = $view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-top-post number-<?php echo e($i++); ?>">
                            <div class="feature-image-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" style="width: 373.33px; height: 216.13px;" src="<?php echo e(base_url('assets/upload_images')); ?>/<?php echo e($value->thumbnail); ?>" alt="">
                            </div>
                            <div class="top-post-details">
                                <ul class="tags">
                                    <li><a href="<?php echo e(base_url('index.php/index/category/'.$value->id_type)); ?>"><b><?php echo e($value->name_type); ?></b></a></li>
                                </ul>
                                <a href="<?php echo e(base_url('index.php/index/detail/'.$value->id)); ?>">
                                    <h4><?php echo e($value->title); ?></h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span><?php echo e($value->name_user); ?></a></li>
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo e(date("j F, Y",strtotime($value->day_update))); ?></a></li>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span><?php echo e($value->comment['count']); ?> Comments</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->viewest != NULL): ?>


                        <!-- Start popular-post Area -->
                        <div class="popular-post-wrap">
                            <h4 class="title" style="text-transform: uppercase;color: #FFF;"><a style="color: #fff;" href="<?php echo e(base_url('index.php/index/category/'.$value->id)); ?>"> <?php echo e($value->name); ?></a></h4>
                            <div class="feature-post relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" style="width: 710px; height: 442.89px;" src="<?php echo e(base_url('assets/upload_images')); ?>/<?php echo e($value->viewest['thumbnail']); ?>" alt="">
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li><a href="<?php echo e(base_url('index.php/index/category/'.$value->id)); ?>"><b><?php echo e($value->viewest['name_type']); ?></b></a></li>
                                    </ul>
                                    <a href="<?php echo e(base_url('index.php/index/detail/'.$value->viewest['id'])); ?>">
                                        <h3><?php echo e($value->viewest['title']); ?></h3>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?php echo e($value->viewest['name_user']); ?></a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo e(date("j F, Y",strtotime($value->viewest['day_update']))); ?></a>
                                        </li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span><?php echo e($value->viewest['comment']['count']); ?> Comments</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-20 medium-gutters">
                                <?php $__currentLoopData = $value->newest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 single-popular-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" style="width: 345px; height: 185.36px;" src="<?php echo e(base_url('assets/upload_images')); ?>/<?php echo e($item['thumbnail']); ?>" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="<?php echo e(base_url('index.php/index/category/'.$item['id_type'])); ?>"><b><?php echo e($item['name_type']); ?></b></a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="<?php echo e(base_url('index.php/index/detail/'.$item['id'])); ?>">
                                            <h4><?php echo e($item['title']); ?></h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span><?php echo e($item['name_user']); ?></a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo e(date("j F, Y",strtotime($item['day_update']))); ?></a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span><?php echo e($item['comment']['count']); ?> </a></li>
                                        </ul>
                                        <p class="excert">
                                           <?php echo e($item['describe']); ?>

                                        </p>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>
                        <!-- End popular-post Area -->
                        <!-- Start banner-ads Area -->
                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                            <img class="img-fluid" src="<?php echo e(base_url('assets/img')); ?>/banner-ad.jpg" alt="">
                        </div>
                        <!-- End banner-ads Area -->
                                <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>