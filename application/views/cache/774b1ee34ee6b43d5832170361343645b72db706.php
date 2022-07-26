<?php /* /var/www/articles/application/views/users/category.blade.php */ ?>
<?php $__env->startSection('title'); ?>
    Category
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-nav-area">
                            <h1 class="text-white"><?php echo e($category->name); ?></h1>
                            <p class="text-white link-nav"><a href="index.html">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span><a href="category.html"><?php echo e($category->name); ?></a></p>
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
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">News of <?php echo e($category->name); ?></h4>
                            <div class="append">
                            <?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" style="width: 278.33px; height: 190.48px;" src="<?php echo e(base_url('assets/upload_images/')); ?><?php echo e($value['thumbnail']); ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="<?php echo e(base_url('index.php/index/category/'.$value['id_type'])); ?>"><?php echo e($value['name_type']); ?></a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="<?php echo e(base_url('index.php/index/detail/'.$value['id'])); ?>">
                                        <h4><?php echo e($value['title']); ?></h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span><?php echo e($value['name_user']); ?></a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo e(date("j F, Y",strtotime($value['day_update']))); ?></a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span><?php echo e($value['comment']['count']); ?> Comments</a></li>
                                    </ul>
                                    <p class="excert">
                                        <?php echo e($value['describe']); ?>

                                    </p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="load-more">
                                <a class="primary-btn btn-load" data-id="<?= $category->id ?>">Load More Posts</a>
                            </div>

                        </div>
                        <!-- End latest-post Area -->
                    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
        <script>
            $(document).ready(function () {
                var page =1 ;
                $('.btn-load').click(function () {
                    var id = $(this).data('id');
                    page = page + 1;
                    $.ajax({
                        dataType: "json",
                        url: "<?php echo e(base_url('index.php/index/pagintion')); ?>",
                        type: "GET",
                        data: {page: page, id: id},
                        async: true,
                        success: function (data){
                            console.log(data);
                            var base = "<?php echo e(base_url()); ?>";
                            var html = "";
                            if (data.count >= data.total_records)
                            {
                                $('.btn-load').css('display','none');
                                $.each(data.data,function (key,obj){
                                    var day = obj.day_update;
                                    html += '<div class="single-latest-post row align-items-center">\n' +
                                        '                                <div class="col-lg-5 post-left">\n' +
                                        '                                    <div class="feature-img relative">\n' +
                                        '                                        <div class="overlay overlay-bg"></div>\n' +
                                        '                                        <img class="img-fluid" style="width: 278.33px; height: 190.48px;" src="'+base+'assets/upload_images/'+obj.thumbnail+'" alt="">\n' +
                                        '                                    </div>\n' +
                                        '                                    <ul class="tags">\n' +
                                        '                                        <li><a href="#">'+obj.name_type+'</a></li>\n' +
                                        '                                    </ul>\n' +
                                        '                                </div>\n' +
                                        '                                <div class="col-lg-7 post-right">\n' +
                                        '                                    <a href="image-post.html">\n' +
                                        '                                        <h4>'+obj.title+'</h4>\n' +
                                        '                                    </a>\n' +
                                        '                                    <ul class="meta">\n' +
                                        '                                        <li><a href="#"><span class="lnr lnr-user"></span>'+obj.name_user+'</a></li>\n' +
                                        '                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>'+obj.day_update+'</a></li>\n' +
                                        '                                        <li><a href="#"><span class="lnr lnr-bubble"></span>'+obj.comment.count+' Comments</a></li>\n' +
                                        '                                    </ul>\n' +
                                        '                                    <p class="excert">\n' +
                                        '                                        '+obj.describe+'\n' +
                                        '                                    </p>\n' +
                                        '                                </div>\n' +
                                        '                            </div>';
                                });
                                $('.append').append(html);
                            }
                            else
                            {
                                $.each(data.data,function (key,obj){
                                    var day = obj.day_update;
                                    html += '<div class="single-latest-post row align-items-center">\n' +
                                        '                                <div class="col-lg-5 post-left">\n' +
                                        '                                    <div class="feature-img relative">\n' +
                                        '                                        <div class="overlay overlay-bg"></div>\n' +
                                        '                                        <img class="img-fluid" style="width: 278.33px; height: 190.48px;" src="'+base+'assets/upload_images/'+obj.thumbnail+'" alt="">\n' +
                                        '                                    </div>\n' +
                                        '                                    <ul class="tags">\n' +
                                        '                                        <li><a href="#">'+obj.name_type+'</a></li>\n' +
                                        '                                    </ul>\n' +
                                        '                                </div>\n' +
                                        '                                <div class="col-lg-7 post-right">\n' +
                                        '                                    <a href="image-post.html">\n' +
                                        '                                        <h4>'+obj.title+'</h4>\n' +
                                        '                                    </a>\n' +
                                        '                                    <ul class="meta">\n' +
                                        '                                        <li><a href="#"><span class="lnr lnr-user"></span>'+obj.name_user+'</a></li>\n' +
                                        '                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>'+obj.day_update+'</a></li>\n' +
                                        '                                        <li><a href="#"><span class="lnr lnr-bubble"></span>'+obj.comment.count+' Comments</a></li>\n' +
                                        '                                    </ul>\n' +
                                        '                                    <p class="excert">\n' +
                                        '                                        '+obj.describe+'\n' +
                                        '                                    </p>\n' +
                                        '                                </div>\n' +
                                        '                            </div>';
                                });
                                $('.append').append(html);
                            }
                        }
                    });
                })
            })

        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>