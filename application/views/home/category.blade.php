<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 18/03/2019
 * Time: 09:18
 */
?>
@extends('home.layouts.main')
@section('content')
	<?php $_SESSION['url'] = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>
	<!-- ##### Breadcrumb Area Start ##### -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?= $category->name ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ##### Breadcrumb Area End ##### -->

	<!-- ##### Blog Content Area Start ##### -->
	<section class="blog-content-area section-padding-0-100">
		<div class="container">
			<div class="row justify-content-center">
				<!-- Blog Posts Area -->
				<div class="col-12 col-lg-8">
					<div class="blog-posts-area">
						<div class="row">

							<!-- Section Heading -->
							<div class="col-12">
								<div class="section-heading">
									<h2><?= $category->name ?></h2>
									<p>Bài viết trong danh mục: <?= $category->name ?></p>
								</div>
							</div>
						@foreach($news as $key => $cateItem)
							@if($cateItem->status == 1)
								<!-- Single Blog Post -->
									<div class="col-12 col-sm-6">
										<div class="single-blog-post mb-50">
											<!-- Thumbnail -->
											<div class="post-thumbnail">
												<a href="<?= base_url('index.php/posts/post_detail/'.$cateItem->id) ?>"><img style="height: 184px;width: 100%;" src="<?= base_url()?>assets/upload_images/<?= $cateItem->thumbnail ?>" alt=""></a>
											</div>
											<!-- Content -->
											<div class="post-content">
												<p class="post-date"><?= $cateItem->day_update ?> / <?= $cateItem->name_type ?></p>
												<a href="<?= base_url('index.php/posts/post_detail/'.$cateItem->id) ?>" class="post-title">
													<h4><?= $cateItem->title ?></h4>
												</a>
												<p class="post-excerpt"><?= $cateItem->describe ?></p>
											</div>
										</div>
									</div>
							@endif
						@endforeach


						</div>
					</div>
					<!-- Pager -->
					<div>
						<ul class="pagination justify-content-center" style="padding: 3%;">
							<?php
							if ($current_page > 1 && $total_page > 1) {
								echo "<li class='page-item'><a class='page-link bg-white text-dark' href='" . base_url() . 'index.php/types/show_category/'.$category->id.'?page=' . ($current_page - 1) . "'><i class='fas fa-chevron-left'></i></a></li>";
							}
							for ($i = 1; $i <= $total_page; $i++) {
								if ($i == $current_page) {
									echo "<li class='page-item active'><span class='page-link bg-dark'>" . $i . "</span></li>";
								} else {
									echo "<li class='page-item'><a class='page-link bg-white text-dark' href='" . base_url() . 'index.php/types/show_category/'.$category->id.'?page=' . $i . "'><span>" . $i . "</span></a></li>";
								}
							}
							if ($current_page < $total_page && $total_page > 1) {
								echo "<li class='page-item'><a class='page-link bg-white text-dark' href='" . base_url() . 'index.php/types/show_category/'.$category->id.'?page=' . ($current_page + 1) . "'><i class='fas fa-chevron-right'></i></a></li>";
							}
							?>
						</ul>
					</div>
					<div class="clearfix"></div>

				</div>

				<!-- Blog Sidebar Area -->
				<div class="col-12 col-sm-9 col-md-6 col-lg-4">
					<div class="post-sidebar-area">
						<!-- ##### Single Widget Area ##### -->
						<div class="single-widget-area mb-30 mt-100">
							<!-- Title -->
							<div class="widget-title">
								<h6>Danh mục </h6>
							</div>
								<table class="tree nikki-catagories" style="width: 100%">
									{{ get_count_and() }}
								</table>
						</div>

						<!-- ##### Single Widget Area ##### -->
						<div class="single-widget-area mb-30">
							<!-- Title -->
							<div class="widget-title">
								<h6>Bài viết mới nhất </h6>
							</div>

								@foreach($newest as $k1 => $neweItem)
									@if($neweItem->status == 1)
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
										@endif
									@endforeach

						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ##### Blog Post Area End ##### -->
@endsection
@section('script')
	<script>
		$('.tree').treegrid();
	</script>
@endsection
