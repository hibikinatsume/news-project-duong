<?php
/**
 * Created by PhpStorm.
 * User: hana
 * Date: 28/03/2019
 * Time: 15:46
 */
?>
@extends('master.layouts.main')
@section('header')
	Quản lý bài viết
@endsection
@section('title')
	Bài viết của tôi
@endsection
@section('lead')
	Trang hiển thị danh sách bài viết
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="get" action="<?= base_url('index.php/posts/my_filter') ?>">
                <div class="row">
                    <div class="form-group col-4">
                        <select class="form-control" name="txtCategory">
                            <option value="0">Category</option>
                            <?php showCategories_select($type,$category); ?>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <select class="form-control" name="txtStatus">
                            <option value="0">Status</option>
                            <option value="1" @if(isset($news_status)) @if($news_status == 1) selected @endif @endif >Published</option>
                            <option value="2"  @if(isset($news_status)) @if($news_status == 2) selected @endif @endif>Pending</option>
                        </select>
                    </div>
                    <div class="form-group col-4 float-right">
                        <input type="text" class="form-control" name="txtKey" placeholder="Nhập tiêu đề " @if(isset($key_word)) value="<?= $key_word ?>" @endif>
                    </div>
                    <div class="form-group col-1">
                        <input type="submit" class="btn btn-primary" value="Lọc">
                    </div>
                </div>
            </form>
        </div>
    </div>
	<div class="row">
		@foreach($my as $key => $item)
			<div class="col-12 col-md-4 col-lg-4">
				<article class="article article-style-c">
					<div class="article-header">
						<div class="article-image" data-background="<?= base_url('assets/upload_images/'.$item->thumbnail)?>">
						</div>
					</div>
					<div class="article-details">
						<div class="article-category"><a href="#"><?= $item->name_type ?></a></div>
						<div class="article-title">
							<h2><a href="<?= base_url('index.php/posts/post_admin_detail/'.$item->id_new) ?>"><?= $item->title ?></a></h2>
						</div>
						<p class="block-with-text"><?= $item->describe ?> </p>
						<div class="article-user">
							<img alt="image" src="<?= base_url('assets/upload_images/'.$item->avatar)?>" style="width: 45px; height: 45px;">
							<div class="article-user-details">
								<div class="user-detail-name">
									<a href="#"><?= $item->name_user ?></a>
								</div>
								<div class="text-job"><?= $item->name_per ?></div>
							</div>
							<div class="article-cta text-right mt-1">
								@if($item->status == 1)
									<div class="badge badge-secondary float-left">Published</div>
								@elseif($item->status == 2)
									<div class="badge badge-warning float-left">Pending</div>
								@elseif($item->status == 3)
									<div class="badge badge-danger float-left">Draft</div>
								@endif
								<a href="<?= base_url('index.php/posts/post_admin_detail/'.$item->id_new) ?>">Read More <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
				</article>
			</div>
		@endforeach
	</div>
    <?php if (isset($category) && isset($news_status) && isset($key_word))
    {
    ?>
    <div>
        <ul class="pagination justify-content-center" style="padding: 3%;">
            <?php
            if ($current_page > 1 && $total_page > 1) {
                echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/posts/my_filter/?page=' . ($current_page - 1) . "&txtCategory=" . $category . "&txtStatus=" . $news_status . "&txtKey=" . $key_word . "'><i class='fas fa-chevron-left'></i></a></li>";
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo "<li class='page-item active'><span class='page-link bg-primary'>" . $i . "</span></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/posts/my_filter/?page=' . $i . "&txtCategory=" . $category . "&txtStatus=" . $news_status . "&txtKey=" . $key_word . "'><span>" . $i . "</span></a></li>";
                }
            }
            if ($current_page < $total_page && $total_page > 1) {
                echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/posts/my_filter/?page=' . ($current_page + 1) . "&txtCategory=" . $category . "&txtStatus=" . $news_status . "&txtKey=" . $key_word . "'><i class='fas fa-chevron-right'></i></a></li>";
            }
            ?>
        </ul>
    </div>
    <?php
    }
    else
    {
    ?>
    <div>
        <ul class="pagination justify-content-center" style="padding: 3%;">
            <?php
            if ($current_page > 1 && $total_page > 1) {
                echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/posts/my_posts/'.$_SESSION['id'].'/?page=' . ($current_page - 1) . "'><i class='fas fa-chevron-left'></i></a></li>";
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo "<li class='page-item active'><span class='page-link bg-primary'>" . $i . "</span></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/posts/my_posts/'.$_SESSION['id'].'/?page=' . $i . "'><span>" . $i . "</span></a></li>";
                }
            }
            if ($current_page < $total_page && $total_page > 1) {
                echo "<li class='page-item'><a class='page-link bg-white text-primary' href='" . base_url() . 'index.php/posts/my_posts/'.$_SESSION['id'].'/?page=' . ($current_page + 1) . "'><i class='fas fa-chevron-right'></i></a></li>";
            }
            ?>
        </ul>
    </div>
    <?php
    }
    ?>


    <?php
    function showCategories_select($categories,$cate = null, $parent_id = 0, $char = '&nbsp;')
    {

        foreach ($categories as $key => $item)
        {
            if ($item->id_parent == $parent_id)
            {
                echo "<option value='".$item->id."'";
                if ($item->id == $cate)
                {
                    echo 'selected';
                }
                echo '>';
                echo $char . $item->name;
                echo '</option>';
                unset($categories[$key]);
                showCategories_select($categories,$new, $item->id, '&nbsp;&nbsp;&nbsp;'.$char.'&nbsp;');
            }
        }
    }
    ?>
@endsection
