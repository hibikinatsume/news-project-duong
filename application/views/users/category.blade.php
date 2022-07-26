@extends('users.layouts.main')
@section('title')
    Category
@stop
@section('content')
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="news-tracker-wrap">
                            <h6><a href="{{base_url("index.php/index")}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span> <a href="{{base_url("index.php/index/category/".$category->id)}}">{{$category->name}}</a></h6>
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
                            <h3 class="cat-title">{{$category->name}}</h3>
                            <div class="append">
                            @foreach($new as $key => $value)
                            <div class="single-latest-post row align-items-center">
                                <div class="col-lg-5 post-left">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" style="width: 278.33px; height: 190.48px;" src="{{base_url('assets/upload_images/')}}{{$value['thumbnail']}}" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="{{base_url('index.php/index/category/'.$value['id_type'])}}">{{$value['name_type']}}</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-7 post-right">
                                    <a href="{{base_url('index.php/index/detail/'.$value['id'])}}">
                                        <h4>{{$value['title']}}</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>{{$value['name_user']}}</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{date("j F, Y",strtotime($value['day_update']))}}</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>{{$value['comment']['count']}} Comments</a></li>
                                    </ul>
                                    <p class="excert">
                                        {{$value['describe']}}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                            </div>
                            <div class="load-more">
                                <a class="primary-btn btn-load" data-id="<?= $category->id ?>">Load More Posts</a>
                            </div>

                        </div>
                        <!-- End latest-post Area -->
                    </div>
@stop
@section('script')
        <script>
            $(document).ready(function () {
                var page =1 ;
                $('.btn-load').click(function () {
                    var id = $(this).data('id');
                    page = page + 1;
                    $.ajax({
                        dataType: "json",
                        url: "{{base_url('index.php/index/pagintion')}}",
                        type: "GET",
                        data: {page: page, id: id},
                        async: true,
                        success: function (data){
                            console.log(data);
                            var base = "{{ base_url() }}";
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
@stop