<?php /* /var/www/pj/application/views/home/index.blade.php */ ?>
<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 16/03/2019
 * Time: 07:33
 */
?>

<?php $__env->startSection('content'); ?>
	<?php $_SESSION['url'] = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>
	<div class="hero-post-slides owl-carousel">
		<?php foreach ($hot as $key => $hotItem){


					?>
		<!-- Single Hero Post -->
			<div class="single-hero-post d-flex flex-wrap">
				<!-- Post Thumbnail -->
				<div class="slide-post-thumbnail h-100 bg-img" style="background-image: url(<?= base_url("assets/upload_images/".$hotItem->thumbnail) ?>);"></div>
				<!-- Post Content -->
				<div class="slide-post-content h-100 d-flex align-items-center">
					<div class="slide-post-text">
						<p class="post-date" data-animation="fadeIn" data-delay="100ms"><?= $hotItem->day_update .' / '. $hotItem->name_type ?></p>
						<a href="<?= base_url('index.php/posts/post_detail/'.$hotItem->id) ?>" class="post-title" data-animation="fadeIn" data-delay="300ms">
							<h2><?= $hotItem->title ?></h2>
						</a>
						<p class="post-excerpt" data-animation="fadeIn" data-delay="500ms"><?= $hotItem->describe ?></p>
						<a href="<?= base_url('index.php/posts/post_detail/'.$hotItem->id) ?>" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Xem thêm</a>
					</div>

					<!-- Page Count -->
					<div class="page-count"></div>
				</div>
			</div>
		<?php

			}
			?>
	</div>
	<!-- ##### Hero Area End ##### -->

	<!-- ##### Blog Content Area Start ##### -->
	<section class="blog-content-area section-padding-100">
		<div class="container">

			<div class="row justify-content-center">
				<!-- Blog Posts Area -->
				<div class="col-12 col-lg-8">
					<div class="blog-posts-area">
						<div class="row">

							<!-- Featured Post Area -->
							<div class="col-12">
								<div class="featured-post-area mb-50">
									<!-- Thumbnail -->
									<div class="post-thumbnail mb-30">
										<a href="<?= base_url('index.php/posts/post_detail/'.$premium->id) ?>"><img src="<?= base_url("assets/upload_images/".$premium->thumbnail) ?>" alt="" style="width: 100%"></a>
									</div>
									<!-- Featured Post Content -->
									<div class="featured-post-content">
										<p class="post-date"><?= $premium->day_update ?> / <?= $premium->name_type ?> </p>
										<a href="<?= base_url('index.php/posts/post_detail/'.$premium->id) ?>" class="post-title">
											<h2><?= $premium->title ?> </h2>
										</a>
										<p class="post-excerpt"><?= $premium->describe ?> </p>
									</div>
									<!-- Post Meta -->
									<div class="post-meta d-flex align-items-center justify-content-between">
										<!-- Author Comments -->
										<div class="author-comments">
											<a href="#"><span>Tác giả</span> <?= $premium->name_user ?> </a>
											<a href="#"><?= $premium->count ?> <span>Comments</span></a>
										</div>
										<!-- Social Info -->
									</div>
								</div>
							</div>

						<?php foreach ($pagin as $k => $newItem)
						{

						?>
						<!-- Single Blog Post -->
							<div class="col-12 col-sm-6">
								<div class="single-blog-post mb-50">
									<!-- Thumbnail -->
									<div class="post-thumbnail">
										<a href="<?= base_url('index.php/posts/post_detail/'.$newItem->id) ?>"><img src="<?= base_url("assets/upload_images/".$newItem->thumbnail) ?>" alt="" style="height: 184px;width: 100%;"></a>
									</div>
									<!-- Content -->
									<div class="post-content">
										<p class="post-date"><?= $newItem->day_update ?> / <?= $newItem->name_type ?></p>
										<a href="<?= base_url('index.php/posts/post_detail/'.$newItem->id) ?>" class="post-title">
											<h4><?= $newItem->title ?></h4>
										</a>
										<p class="post-excerpt"><?= $newItem->describe ?></p>
									</div>
								</div>
							</div>
							<?php

							}
							?>

						</div>
					</div>

					<!-- Pager -->
					<?php $base = base_url(); ?>

					<ul class="pagination justify-content-center" style="padding: 3%;">
						<?php
						if ($current_page > 1 && $total_page > 1) {
							echo "<li class='page-item'><a class='page-link bg-white text-dark' href='" . base_url() . 'index.php/index/index/?page=' . ($current_page - 1) . "'><i class='fas fa-chevron-left'></i></a></li>";
						}
						for ($i = 1; $i <= $total_page; $i++) {
							if ($i == $current_page) {
								echo "<li class='page-item active'><span class='page-link bg-dark'>" . $i . "</span></li>";
							} else {
								echo "<li class='page-item'><a class='page-link bg-white text-dark' href='" . base_url() . 'index.php/index/index/?page=' . $i . "'><span>" . $i . "</span></a></li>";
							}
						}
						if ($current_page < $total_page && $total_page > 1) {
							echo "<li class='page-item'><a class='page-link bg-white text-dark' href='" . base_url() . 'index.php/index/index/?page=' . ($current_page + 1) . "'><i class='fas fa-chevron-right'></i></a></li>";
						}
						?>
					</ul>
					</div>
					<div class="clearfix"></div>
					<!-- <ol class="nikki-pager">
						<li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
						<li><a href="#">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
					</ol> -->

				<!-- Blog Sidebar Area -->
				<div class="col-12 col-sm-9 col-md-6 col-lg-4">
					<div class="post-sidebar-area">

						<!-- ##### Single Widget Area ##### -->
						<div class="single-widget-area mb-30">
							<!-- Title -->
							<div class="widget-title">
								<h6>Bài viết nhiều người xem</h6>
							</div>
						<?php $__currentLoopData = $viewest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k2 => $viewItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<!-- Single Latest Posts -->
									<div class="single-latest-post d-flex">
										<div class="post-thumb">
											<img src="<?= base_url('assets/upload_images/'.$viewItem->thumbnail) ?>" alt="">
										</div>
										<div class="post-content">
											<a href="<?= base_url('index.php/posts/post_detail/'.$viewItem->id) ?>" class="post-title">
												<h6><?= $viewItem->title ?></h6>
											</a>
											<a href="#" class="post-author"><span>by</span> <?= $viewItem->name_user ?></a>
										</div>
									</div>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


						</div>

						<!-- ##### Single Widget Area ##### -->
						<div class="single-widget-area mb-30">
							<!-- Title -->
							<div class="widget-title">
								<h6>Bài viết mới nhất</h6>
							</div>
						<?php $__currentLoopData = $newest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $neweItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<!-- Single Latest Posts -->
									<div class="single-latest-post d-flex">
										<div class="post-thumb">
											<img src="<?= base_url('assets/upload_images/'.$neweItem->thumbnail) ?>" alt="">
										</div>
										<div class="post-content">
											<a href="<?= base_url('index.php/posts/post_detail/'.$neweItem->id) ?>" class="post-title">
												<h6><?= $neweItem->title ?></h6>
											</a>
											<a href="#" class="post-author"><span>by</span> <?= $neweItem->name_user ?></a>
										</div>
									</div>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ##### Blog Content Area End ##### -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>