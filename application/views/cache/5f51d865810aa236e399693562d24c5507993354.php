<?php /* /var/www/articles/application/views/users/detail.blade.php */ ?>
<?php $__env->startSection('title'); ?>
    Detail
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-nav-area">
                            <h1 class="text-white"><?php echo e($new->title); ?></h1>
                            <p class="text-white link-nav"><a href="index.html">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span><a href="#"><?php echo e($new->name_type); ?> </a><span class="lnr lnr-arrow-right"></span><a href="image-post.html">Bài viết</a></p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="news-tracker-wrap">
                            <h6><span>Breaking News:</span>   <a href="#">Astronomy Binoculars A Great Alternative</a></h6>
                        </div>
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
                        <!-- Start single-post Area -->
                        <div class="single-post-wrap">
                            <div class="feature-img-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="<?php echo e(base_url('assets/upload_images/')); ?><?php echo e($new->thumbnail); ?>" alt="">
                            </div>
                            <div class="content-wrap">
                                <ul class="tags mt-10">
                                    <li><a href="#" class="font-weight-bold"><?php echo e($new->name_type); ?></a></li>
                                </ul>
                                <a href="#">
                                    <h3><?php echo e($new->title); ?></h3>
                                </a>
                                <ul class="meta pb-20">
                                    <li><a href="#"><span class="lnr lnr-user"></span><?php echo e($new->name_user); ?></a></li>
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo e(date("j F, Y",strtotime($new->day_update))); ?></a></li>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span><?php echo e($new->comment['count']); ?> </a></li>
                                </ul>
                                <p class="font-weight-bold"><?php echo e($new->describe); ?></p>
                                <?php echo $new->content; ?>

                                <div class="popular-post-wrap">
                                    <h4 class="title" style="text-transform: uppercase;">Bài viết liên quan</h4>
                                <div class="row mt-20 medium-gutters">
                                    <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-6 single-popular-post">
                                            <div class="feature-img-wrap relative">
                                                <div class="feature-img relative">
                                                    <div class="overlay overlay-bg"></div>
                                                    <img class="img-fluid" style="width: 345px; height: 185.36px;" src="<?php echo e(base_url('assets/upload_images')); ?>/<?php echo e($item->thumbnail); ?>" alt="">
                                                </div>
                                                <ul class="tags">
                                                    <li><a href="<?php echo e(base_url('index.php/index/category/'.$item->id_type)); ?>"><b><?php echo e($item->name_type); ?></b></a></li>
                                                </ul>
                                            </div>
                                            <div class="details">
                                                <a href="<?php echo e(base_url('index.php/index/detail/'.$item->   id)); ?>">
                                                    <h4><?php echo e($item->title); ?></h4>
                                                </a>
                                                <ul class="meta">
                                                    <li><a href="#"><span class="lnr lnr-user"></span><?php echo e($item->name_user); ?></a></li>
                                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo e(date("j F, Y",strtotime($item->day_update))); ?></a></li>
                                                    <li><a href="#"><span class="lnr lnr-bubble"></span><?php echo e($item->comment['count']); ?> </a></li>
                                                </ul>
                                                <p class="excert">
                                                    <?php echo e($item->describe); ?>

                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                </div>
                                <div class="comment-sec-area">
                                    <div class="container">
                                        <div class="row flex-column">
                                            <h6><?php echo e($new->comment['count']); ?> Comments</h6>
                                            <div class="show-comment">
                                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <?php if(strpos($value->avatar,'http') !== FALSE): ?>
                                                                <img src="<?php echo e($value->avatar); ?>" style="width: 60px; height: 60px;" alt="">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(base_url('assets/upload_images/')); ?><?php echo e($value->avatar); ?>" style="width: 60px; height: 60px;" alt="">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#"><?php echo e($value->name); ?></a></h5>
                                                            <p class="date"><?php echo e(date("j F, Y",strtotime($value->date))); ?></p>
                                                            <p class="comment">
                                                                <?php echo e($value->content); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a class="btn-reply text-uppercase reply" data-id="<?= $value->id_com ?>">reply</a>
                                                    </div>
                                                </div>
                                                <form class="form-reply<?php echo e($value->id_com); ?> rep-form rep-submit" data-id="<?php echo e($new->id); ?>" data-com="<?php echo e($value->id_com); ?>" style="margin-top: 2%; display: none;">
                                                    <input type="text" placeholder="Viết câu trả lời của bạn" class="form-control reply-content<?php echo e($value->id_com); ?>" style="border-radius: 30px;">
                                                </form>
                                            </div>
                                             <div class="show-reply<?php echo e($value->id_com); ?>">
                                                <?php $__currentLoopData = $value->con; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="comment-list left-padding">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb">
                                                                <?php if(strpos($item->avatar,'http') !== FALSE): ?>
                                                                    <img src="<?php echo e($item->avatar); ?>" style="width: 60px; height: 60px;" alt="">
                                                                <?php else: ?>
                                                                    <img src="<?php echo e(base_url('assets/upload_images/')); ?><?php echo e($item->avatar); ?>" style="width: 60px; height: 60px;" alt="">
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="desc">
                                                                <h5><a href="#"><?php echo e($item->name); ?></a></h5>
                                                                <p class="date"><?php echo e(date("j F, Y",strtotime($item->date))); ?></p>
                                                                <p class="comment">
                                                                    <?php echo e($item->content); ?>

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-form">
                                <h4>Post Comment</h4>
                                <form id="formComment">
                                    <div class="form-group">
                                        <textarea class="form-control mb-10" id="message" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                    </div>
                                    <a class="primary-btn text-uppercase btn-comments" data-id="<?php echo e($new->id); ?> ">Post Comment</a>
                                </form>
                            </div>
                        </div>
                        <!-- End single-post Area -->
                    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
   <script>
        $(document).ready(function () {
            $('.btn-comments').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var content = $('#message').val();
                $.ajax({
                    url: "<?= base_url('index.php/comments/add_comment') ?>",
                    type: "post",
                    data: {id: id, content: content},
                    async: true,
                    success: function (result) {
                        console.log(result);
                        $('.show-comment').append(result);
                        $('#formComment')[0].reset();
                    }
                });
            });
            $(document).on('click','.reply', function (e) {
                var id = $(this).data('id');
                $('.setValue').val(id);
                $('.rep-form').not('.form-reply'+id).hide();
                $('.form-reply'+id).toggle();
                console.log(id);
            });
            $(document).on('submit','.rep-submit', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                var id_com = $(this).data('com');
                var rep = $(".reply-content"+id_com).val();
                $.ajax({
                    url: "<?= base_url('index.php/comments/add_reply') ?>",
                    type: "post",
                    data: {id: id,id_com: id_com, reply: rep},
                    async: true,
                    success: function (data) {
                        $('.rep-form').not('.form-reply'+id).hide();
                        $('.show-reply'+id_com).append(data);
                        $('.reply-content'+id_com).val('');
                    }
                })
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>