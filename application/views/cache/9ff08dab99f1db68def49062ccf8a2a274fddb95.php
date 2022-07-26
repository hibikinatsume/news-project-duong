<?php /* C:\xampp\htdocs\articles\application\views/master/posts/detail.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 18/03/2019
 * Time: 15:17
 */
?>

<?php $__env->startSection('header'); ?>
    Chi tiết bài viết
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?= $new->name_type ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
    Bài viết của <b><?= $new->name_user ?></b>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $arr = permission(); ?>
    <div class="card">
        <div class="card-header" style="text-align: center;">
            <h4 style="text-align: center; width: 100%;"><?= $new->title ?></h4>
        </div>
        <div class="card-body">
            <div id="accordion">
                <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse"
                         data-target="#panel-body-4" aria-expanded="false">
                        <h4>Hình ảnh</h4>
                    </div>
                    <div class="accordion-body collapse show" id="panel-body-4" data-parent="#accordion" style="">
                        <img src="<?= base_url('assets/upload_images/' . $new->thumbnail)?>" width="100%">
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-header collapsed" role="button" data-toggle="collapse"
                         data-target="#panel-body-1" aria-expanded="false">
                        <h4>Mô tả</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
                        <?= $new->describe ?>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-header collapsed" role="button" data-toggle="collapse"
                         data-target="#panel-body-2" aria-expanded="false">
                        <h4>Nội dung</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion" style="">
                        <?= $new->content ?>
                    </div>
                </div>
                <div class="accordion">
                    <div class="accordion-header collapsed" role="button" data-toggle="collapse"
                         data-target="#panel-body-3" aria-expanded="false">
                        <h4>Bình luận</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion" style="">
                        <?php if(in_array('0',$arr->comments) || in_array('1',$arr->comments)): ?>
                            <?php $__currentLoopData = $cm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="user-cm mt-1 com<?= $comment->id_com ?>">
                                <span class="comment<?= $comment->id_com ?>"
                                      <?php if($comment->status == 2): ?> style="opacity: 0.4" <?php endif; ?>>
                                        <?php if($comment->id_google != 0): ?>
                                            <img src="<?= $comment->avatar ?>" width="30px"
                                                 height="30px" style="border-radius: 50%;">
                                        <?php else: ?>
                                            <img alt="image" src="<?= base_url('assets/upload_images/' . $comment->avatar)?>"
                                                 width="30px"
                                                 height="30px" style="border-radius: 50%;">
                                        <?php endif; ?>
                                <a href="#"><?= $comment->name ?></a>: <?= $comment->content ?>
                                </span>
                                    <?php if(in_array('0',$arr->comments) || in_array('3',$arr->comments) || in_array('4',$arr->comments)): ?>
                                        <a class="dropdown-toggle ml-2" id="dropdownMenuButton2"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </a>

                                        <div class="dropdown-menu" x-placement="bottom-start"
                                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 27px, 0px);">
                                            <?php if(in_array('0',$arr->comments) || in_array('3',$arr->comments)): ?>
                                            <a class="dropdown-item has-icon hide hidden<?= $comment->id_com ?>"
                                               href="#" data-id="<?= $comment->id_com ?>"
                                               <?php if($comment->status == 2): ?> style="display: none;" <?php endif; ?>><i
                                                        class="fas fa-exclamation-triangle"></i>Ẩn
                                                bình luận</a>
                                            <a class="dropdown-item has-icon show-block show<?= $comment->id_com ?>"
                                               href="#" data-id="<?= $comment->id_com ?>"
                                               <?php if($comment->status == 1): ?> style="display: none;" <?php endif; ?>><i
                                                        class="fas fa-exclamation-triangle"></i>Hiển thị
                                                bình luận</a>
                                            <?php endif; ?>
                                            <?php if(in_array('0',$arr->comments) || in_array('4',$arr->comments)): ?>
                                            <a class="dropdown-item has-icon remove" href="#"
                                               data-id="<?= $comment->id_com ?>"><i class="fas fa-times"></i>Xóa bình
                                                luận</a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="reply ml-5 replycomment<?= $comment->id_com ?>">
                                    <?php $__currentLoopData = $comment->con; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="user-cm mt-1 com<?= $reply->id_com ?>">
                                        <span class="comment<?= $reply->id_com ?> replycom<?= $comment->id_com ?>"
                                              <?php if($reply->status == 2): ?> style="opacity: 0.4" <?php endif; ?>>
                                             <?php if($reply->id_google != 0): ?>
                                                    <img src="<?= $reply->avatar ?>" width="30px"
                                                         height="30px" style="border-radius: 50%;">
                                                <?php else: ?>
                                                    <img alt="image" src="<?= base_url('assets/upload_images/' . $reply->avatar)?>"
                                                         width="30px"
                                                         height="30px" style="border-radius: 50%;">
                                                <?php endif; ?>
                                        <a href="#"><?= $reply->name ?></a>: <?= $reply->content ?>
                                        </span>
                                            <?php if(in_array('0',$arr->comments) || in_array('3',$arr->comments) || in_array('4',$arr->comments)): ?>
                                            <a class="dropdown-toggle ml-2" id="dropdownMenuButton2"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </a>
                                            <div class="dropdown-menu" x-placement="bottom-start"
                                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 27px, 0px);">
                                                <?php if(in_array('0',$arr->comments) || in_array('3',$arr->comments)): ?>
                                                <a class="dropdown-item has-icon hide hidden<?= $reply->id_com ?>"
                                                   href="#" data-id="<?= $reply->id_com ?> "
                                                   <?php if($reply->status == 2): ?> style="display: none;" <?php endif; ?>><i
                                                            class="fas fa-exclamation-triangle"></i>Ẩn
                                                    bình luận</a>
                                                <a class="dropdown-item has-icon show-block show<?= $reply->id_com ?>"
                                                   href="#" data-id="<?= $reply->id_com ?>"
                                                   <?php if($reply->status == 1): ?> style="display: none;" <?php endif; ?>><i
                                                            class="fas fa-exclamation-triangle"></i>Hiển thị
                                                    bình luận</a>
                                                <?php endif; ?>
                                                    <?php if(in_array('0',$arr->comments) || in_array('4',$arr->comments)): ?>
                                                <a class="dropdown-item has-icon remove" href="#"
                                                   data-id="<?= $reply->id_com ?>"><i class="fas fa-times"></i>Xóa
                                                    bình luận</a>
                                                <?php endif; ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $html = "";
    if (isset($new->url)) {
        if (strpos($new->url, 'my_posts')) {
            $html = "my_posts";
        } else {
            $html = "all_posts";
        }
    }
    ?>
    <div class="footer-detail float-right">
        <?php if(in_array('0',$arr->news) || in_array('3',$arr->news)): ?>
            <?php if($new->status != 1): ?>
                <a href="<?= base_url('index.php/posts/view_edit/' . $new->id) ?>"
                   class="btn btn-icon icon-left btn-primary"><i
                            class="far fa-edit"></i>Sửa bài viết</a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(in_array('0',$arr->news) || in_array('4',$arr->news)): ?>
            <a href="<?= base_url('index.php/posts/remove_post/' . $new->id . '/' . $html) ?>"
               class="btn btn-icon icon-left btn-danger" id="btn-remove" onClick="return confirm(`Are you sure?`)"><i
                        class="fas fa-times"></i>Xóa bài viết</a>
        <?php endif; ?>
        <?php if(in_array('0',$arr->news)): ?>
            <?php if($new->status != 1): ?>
                <a href="<?= base_url('index.php/posts/approved/' . $new->id) ?>"
                   class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i>Duyệt bài viết</a>
            <?php else: ?>
                <a href="<?= base_url('index.php/posts/recalled/' . $new->id) ?>"
                   class="btn btn-icon icon-left btn-warning"><i class="fas fa-check"></i>Thu hồi bài viết</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $('.hide').click(function (e) {
                e.preventDefault();
                var id_com = $(this).data('id');
                $.ajax({
                    url: "<?= base_url('index.php/comments/hide_comment')?>",
                    type: "POST",
                    data: {id: id_com},
                    success: function (data) {
                        console.log(data);
                        if (data === 'hide') {
                            $('.comment' + id_com).css('opacity', '0.4');
                            $('.hidden' + id_com).css('display', 'none');
                            $('.show' + id_com).css('display', 'block');
                        }
                    }
                })
            });
            $('.show-block').click(function (e) {
                e.preventDefault();
                var id_com = $(this).data('id');
                $.ajax({
                    url: "<?= base_url('index.php/comments/show_comment')?>",
                    type: "POST",
                    data: {id: id_com},
                    success: function (data) {
                        console.log(data);
                        if (data === 'show') {
                            $('.comment' + id_com).css('opacity', '1.0');
                            $('.replycom' + id_com).css('opacity', '1.0');
                            $('.hidden' + id_com).css('display', 'block');
                            $('.show' + id_com).css('display', 'none');
                        }
                    }
                })
            });
            $('.remove').click(function (e) {
                e.preventDefault();
                var id_com = $(this).data('id');
                $.ajax({
                    url: "<?= base_url('index.php/comments/remove_comment')?>",
                    type: "POST",
                    data: {id: id_com},
                    success: function (data) {
                        console.log(data);
                        if (data === 'remove') {
                            $('.com' + id_com).html('');
                            $('.replycomment' + id_com).html('');
                        }
                    }
                })
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>