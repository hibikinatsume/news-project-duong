<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 18/03/2019
 * Time: 08:57
 */
?>
@extends('home.layouts.main')
@section('content')
	<?php

		$arr = permission();
		$_SESSION['url'] = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

	?>
	<!-- ##### Breadcrumb Area Start ##### -->
	<div class="breadcrumb-area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
							<li class="breadcrumb-item"><a href="#"><?= $news_detail->name_type ?></a></li>
							<li class="breadcrumb-item active" aria-current="page"><?= $news_detail->title ?></li>
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
				<div class="col-12">

					<!-- Post Details Area -->
					<div class="single-post-details-area">
						<div class="post-content">

							<div class="text-center mb-50">
								<p class="post-date"><?= $news_detail->day_update ?> / <?= $news_detail->name_type ?></p>
								<h2 class="post-title"><?= $news_detail->title ?></h2>
								<!-- Post Meta -->
								<div class="post-meta">
									<a href="#"><span>by</span> <?= $news_detail->name_user ?></a>
									<a href="#"> <?= $news_detail->count ?><span>Bình luận</span></a>
								</div>
							</div>

							<!-- Post Thumbnail -->
							<div class="post-thumbnail mb-50">
								<img src="<?= base_url('assets/upload_images/'.$news_detail->thumbnail) ?>" alt="" style="width: 100%;">
							</div>

							<!-- Post Text -->
							<div class="post-text">
							<?= $news_detail->content ?>
								<!-- Post Tags & Share -->

								<!-- Related Post Area -->
								<div class="related-posts clearfix">
									<!-- Headline -->
									<h4 class="headline">Bài viết liên quan</h4>

									<div class="row">
									@foreach($relation as $k => $reItem)
										<!-- Single Blog Post -->
											<div class="col-12 col-lg-6">
												<div class="single-blog-post mb-50">
													<!-- Thumbnail -->
													<div class="post-thumbnail">
														<a href="<?= base_url('index.php/posts/post_detail/'.$reItem->id) ?>"><img src="<?= base_url() ?>assets/upload_images/<?= $reItem->thumbnail ?>" alt="" style="width: 100%; height: 270px;"></a>
													</div>
													<!-- Content -->
													<div class="post-content">
														<p class="post-date"><?= $reItem->day_update ?> / <?= $reItem->name_type ?></p>
														<a href="<?= base_url('index.php/posts/post_detail/'.$reItem->id) ?>" class="post-title">
															<h4><?= $reItem->title ?></h4>
														</a>
														<p class="post-excerpt"><?= $reItem->describe ?></p>
													</div>
												</div>
											</div>
									@endforeach


									</div>
								</div>

								<!-- Comment Area Start -->
								<div class="comment_area clearfix">
									<h4 class="headline"><span id="count-comment"><?= $news_detail->count ?></span> Bình Luận</h4>
									<ol id="comment-display">
										@foreach($cm as $keys => $comItem)
											@if($comItem->status == 1 && $comItem->id_rep == null)
												<li class="single_comment_area">
													<div class="comment-wrapper d-flex">
														<!-- Comment Meta -->
														<div class="comment-author">
															@if($comItem->id_google != 0)
																<img src="<?= $comItem->avatar ?>" >
															@else
																<img src="<?= base_url() ?>assets/upload_images/<?= $comItem->avatar ?>" alt="">
															@endif

														</div>
														<!-- Comment Content -->
														<div class="comment-content">
															<span class="comment-date"><?= $comItem->date ?></span>
															<h5><?= $comItem->name ?></h5>
															<p><?= $comItem->content ?></p>
															@if(isset($_SESSION['id']))
															<a class="reply"  data-id="<?= $comItem->id_com ?>">Reply</a>
																@else
															@endif
														</div>
													</div>
													<div class="formReply<?= $comItem->id_com ?> rep-form" style="display: none;margin-left: 16.5%;">

															<input type="hidden" class="setValue" name="repId">
															<input type="text" class="repContent<?= $comItem->id_com ?> form-control mb-1 " id="formRep<?= $comItem->id_com ?>" name="repContent" placeholder="Enter reply">
															<button type="button" class="btn bg-dark text-white mb-3 btn-reply" data-id="<?= $news_detail->id ?>">Submit</button>

													</div>
													<ol class="children">
													@foreach($comItem->con as $ks => $repItem)
															@if($repItem->status == 1)
																	<li class="single_comment_area">
																		<div class="comment-wrapper d-flex">
																			<!-- Comment Meta -->
																			<div class="comment-author">
																				@if($repItem->id_google != 0)
																					<img src="<?= $repItem->avatar ?>" >
																				@else
																					<img src="<?= base_url() ?>assets/upload_images/<?= $repItem->avatar ?>" alt="">
																				@endif

																			</div>
																			<!-- Comment Content -->
																			<div class="comment-content">
																				<span class="comment-date"><?= $repItem->date ?></span>
																				<h5><?= $repItem->name ?></h5>
																				<p><?= $repItem->content ?></p>
																			</div>
																		</div>
																	</li>
															@endif
													@endforeach
														<div class="showRep<?= $comItem->id_com ?>"></div>
														<div id="reply<?= $comItem->id_com ?>"></div>
													</ol>
												</li>
												@endif
											@endforeach
											<div id="display-comment"></div>
									</ol>
								</div>
								@if(isset($_SESSION['id']))
									@if($checkCM['count'] >= $checkCM['all'])
										<a class="more"  style="text-decoration: underline; margin-left: 400px; display: none;" data-idpage="<?= $news_detail->id ?>" data-page="1">Xem thêm bình luận</a>
									@else
										<a class="more"  style="text-decoration: underline; margin-left: 350px;" data-idpage="<?= $news_detail->id ?>" data-page="1">Xem thêm bình luận</a>
									@endif
								@endif
								@if(isset($_SESSION['id']))
								<!-- Leave A Comment -->
								<div class="leave-comment-area clearfix">
									<div class="comment-form">
										@if(in_array('0',$arr->comments) || in_array('2',$arr->comments))
										<h4 class="headline">Bình luận của bạn</h4>

										<!-- Comment Form -->
										<form method="post" id="formComment">
											<div class="row">
												<div class="col-12">
													<div class="form-group">
														<textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Bình luận"></textarea>
													</div>
												</div>
												<div class="col-12">
													<button type="button" class="btn nikki-btn comment" data-id="<?= $news_detail->id ?>" >Gửi bình luận</button>
												</div>
											</div>
										</form>
										@else
											<h3>Bạn không thể bình luận</h3>
										@endif
									</div>
								</div>
								@else
									Vui lòng đăng nhập để bình luận. <a href="<?= base_url('index.php/index/view_login') ?>">Đăng nhập</a>
								@endif
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- ##### Blog Content Area End ##### -->
@endsection
@section('script')
	<script>
		$(document).ready(function () {
			$(document).on('click','.reply', function (e) {
				var id = $(this).data('id');
				$('.setValue').val(id);
				$('.rep-form').not('.formReply'+id).hide();
				$('.formReply'+id).toggle();
				console.log(id);
			});
			$('.comment').click(function (e) {
				e.preventDefault();
				var id = $(this).data('id');
				var content = $('#message').val();
				var count = parseInt($('#count-comment').text());
				$.ajax({
					url: "<?= base_url('index.php/comments/add_comment') ?>",
					type: "post",
					data: {id: id, content: content},
					async: true,
					success: function (result) {
						$('#comment-display').append(result);
						$('#formComment')[0].reset();
						$('#count-comment').text(count+1);
					}
				});
			});
			$(document).on('click','.btn-reply', function (e) {
				e.preventDefault();
				var id = $(this).data('id');
				var id_com = $('.setValue').val();
				var rep = $(".repContent"+id_com).val();
				var count = parseInt($('#count-comment').text());
				$.ajax({
					url: "<?= base_url('index.php/comments/add_reply') ?>",
					type: "post",
					data: {id: id,id_com: id_com, reply: rep},
					async: true,
					success: function (data) {
						$('.rep-form').not('.formReply'+id).hide();
						$('#reply'+id_com).append(data);
						$('#formRep'+id_com).val('');
						$('#count-comment').text(count+1);
					}
				})
			});
			var page = 1;
			$('.more').click(function () {
				var id_new = $(this).data('idpage');
				page = page +1;

				$.ajax({
					dataType: "json",
					url: "<?= base_url('index.php/comments/pagin_comment') ?>",
					type: "GET",
					data: {page: page, id_new: id_new},
					async: true,
					success: function (data) {
						console.log(data);
						var base = "<?= base_url() ?>";
						var html = "";
						if (data.count >= data.all)
						{
							$.each(data.data,function (key,obj) {
								html += "<li class='single_comment_area'>"+
											"<div class='comment-wrapper d-flex'>"+
												"<div class='comment-author'>";
												if(obj.id_google != 0){
													html += "<img src="+obj.avatar +">";
												}
												else
												{
													html += "<img src='"+base+"assets/upload_images/"+obj.avatar+"' >";
												}
												html += "</div>"+
												"<div class='comment-content'>"+
													"<span class='comment-date'>"+obj.date+"</span>"+
													"<h5>"+obj.name+"</h5>"+
													"<p>"+obj.content+"</p>"+
													"<a class='reply'  data-id="+obj.id_com+">Reply</a>"+
												"</div>"+
											"</div>"+
											"<div class='formReply"+obj.id_com+" rep-form' style='display: none;margin-left: 16.5%;'>"+

													"<input type='hidden' class='setValue' name='repId'>"+
													"<input type='text' id='formRep"+obj.id_com+"' class='repContent"+obj.id_com+" form-control mb-1' name='repContent' placeholder='Enter reply'>"+
													"<button type='button' class='btn bg-dark text-white mb-3 btn-reply' data-id="+data.id_new+">Submit</button>"+

											"</div>"+
											"<ol class='children'><div>";
												$.each(obj.con,function (k,item)
												{
													html+= "<li class='single_comment_area'>"+
															"<div class='comment-wrapper d-flex'>"+
																"<div class='comment-author'>";
																if(item.id_google != 0){
																	html += "<img src="+item.avatar +">";
																}
																else
																{
																	html += "<img src='"+base+"assets/upload_images/"+item.avatar+"' >";
																}
																html += "</div>"+
																"<div class='comment-content'>"+
																	"<span class='comment-date'>"+item.date+"</span>"+
																	"<h5>"+item.name+"</h5>"+
																	"<p>"+item.content+"</p>"+
																"</div>"+
															"</div>"+
										"</li>";
												});
									html +="<div class='showRep$item->id_com'></div>"+
											"<div id='reply"+obj.id_com+"'></div>";
												html += "</div>"+
											"</ol>"+
								"</li>";
							});
							$('#display-comment').append(html);
							$('.more').css('display','none');
						}
						else
						{
							$.each(data.data,function (key,obj) {
								html += "<li class='single_comment_area'>"+
										"<div class='comment-wrapper d-flex'>"+
										"<div class='comment-author'>";
										if(obj.id_google != 0){
											html += "<img src="+obj.avatar +">";
										}
										else
										{
											html += "<img src='"+base+"assets/upload_images/"+obj.avatar+"' >";
										}
										html += "</div>"+
										"<div class='comment-content'>"+
										"<span class='comment-date'>"+obj.date+"</span>"+
										"<h5>"+obj.name+"</h5>"+
										"<p>"+obj.content+"</p>"+
										"<a class='reply'  data-id="+obj.id_com+">Reply</a>"+
										"</div>"+
										"</div>"+
										"<div class='formReply"+obj.id_com+" rep-form' style='display: none;margin-left: 16.5%;'>"+
										"<input type='hidden' class='setValue' name='repId'>"+
										"<input type='text' id='formRep"+obj.id_com+"' class='repContent"+obj.id_com+" form-control mb-1' name='repContent' placeholder='Enter reply'>"+
										"<button type='button' class='btn bg-dark text-white mb-3 btn-reply' data-id="+data.id_new+">Submit</button>"+
										"</div>"+
										"<ol class='children'><div>";
								$.each(obj.con,function (k,item)
								{
									html+= "<li class='single_comment_area'>"+
											"<div class='comment-wrapper d-flex'>"+
											"<div class='comment-author'>";
											if(item.id_google != 0){
												html += "<img src="+item.avatar +">";
											}
											else
											{
												html += "<img src='"+base+"assets/upload_images/"+item.avatar+"' >";
											}
											html += "</div>"+
											"<div class='comment-content'>"+
											"<span class='comment-date'>"+item.date+"</span>"+
											"<h5>"+item.name+"</h5>"+
											"<p>"+item.content+"</p>"+
											"</div>"+
											"</div>"+
											"</li>";
								});


								html +="<div class='showRep$item->id_com'></div>"+
										"<div id='reply"+obj.id_com+"'></div>";

								html += "</div>"+
										"</ol>"+
										"</li>";
							});
							$('#display-comment').append(html);
						}
					}
				});
			});
			$(document).on('click','.child-more',function () {
				var id_com = $(this).data('idcom');
				var pageChild = $(this).data('page');
				$.ajax({
					dataType: "json",
					url: "<?= base_url('index.php/comments/child_comment') ?>",
					type: "GET",
					data: {page: pageChild, id_com: id_com},
					async: true,
					success: function (data) {
						console.log(data);
						var html = "";
						$.each(da)
					}
				});
			});

		});
	</script>
	@endsection
