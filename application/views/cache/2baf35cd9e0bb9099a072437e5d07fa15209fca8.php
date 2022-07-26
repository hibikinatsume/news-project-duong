<?php /* /var/www/codeigniter/application/views/master/posts/search.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 15/03/2019
 * Time: 18:05
 */
?>

<?php $__env->startSection('header'); ?>
    Quản lý bài viết
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Danh sách bài viết
<?php $__env->stopSection(); ?>
<?php $__env->startSection('lead'); ?>
    Trang hiển thị danh sách bài viết
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-6">
            <form method="post" action="<?= base_url('index.php/posts/filter') ?>">
                <div class="row">
                    <div class="form-group col-6">
                        <select class="form-control" name="txtCategory">
                            <option value="0">Category</option>
                            <?php showCategories_select($type); ?>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <select class="form-control" name="txtStatus">
                            <option value="0">Status</option>
                            <option value="1">Published</option>
                            <option value="2">Pending</option>
                        </select>
                    </div>
                    <div class="form-group col-2">
                        <input type="submit" class="btn btn-primary" value="Lọc">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <form action="<?= base_url('index.php/posts/search_posts') ?>" method="get">
                <div class="row">
                    <div class="form-group col-10 float-right">
                        <input type="text" class="form-control" name="txtKey">
                    </div>
                    <div class="form-group col-2 float-right">
                        <input type="submit" class="btn btn-primary" value="Ok">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-md-4 col-lg-4" style="height: 600px;">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-image"
                             data-background="<?= base_url('assets/upload_images/' . $item->thumbnail)?>">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-category"><a href="#"><?= $item->name_type ?></a></div>
                        <div class="article-title">
                            <h2>
                                <a href="<?= base_url('index.php/posts/post_admin_detail/' . $item->id_new) ?>"><?= $item->title ?></a>
                            </h2>
                        </div>
                        <p class="block-with-text"><?= $item->describe ?></p>
                        <div class="article-user">
                            <img alt="image" src="<?= base_url('assets/upload_images/' . $item->avatar)?>"
                                 style="width: 45px; height: 45px;">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#"><?= $item->name_user ?></a>
                                </div>
                                <div class="text-job"><?= $item->name_per ?></div>
                            </div>
                            <div class="article-cta text-right mt-1">
                                <?php if($item->status == 1): ?>
                                    <div class="badge badge-secondary float-left">Published</div>
                                <?php elseif($item->status == 2): ?>
                                    <div class="badge badge-warning float-left">Pending</div>
                                <?php elseif($item->status == 3): ?>
                                    <div class="badge badge-danger float-left">Draft</div>
                                <?php endif; ?>
                                <a href="<?= base_url('index.php/posts/post_admin_detail/' . $item->id_new) ?>">Read
                                    More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
    <?php
    function showCategories_select($categories, $parent_id = 0, $char = '&nbsp;')
    {
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->id_parent == $parent_id)
            {
                echo '<option value="'.$item->id.'">';
                echo $char . $item->name;
                echo '</option>';

                // Xóa chuyên mục đã lặp
                unset($categories[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories_select($categories, $item->id, '&nbsp;&nbsp;&nbsp;'.$char.'&nbsp;');
            }
        }
    }
    ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('master.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>