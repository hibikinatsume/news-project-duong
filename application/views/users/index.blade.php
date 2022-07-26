@extends('users.layouts.main')
@section('title')
    Home
@endsection
@section('content')
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row small-gutters">
                    <div class="col-lg-8 top-post-left">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" style="width: 756.66px; height: 442.89px;"
                                 src="{{base_url('assets/upload_images')}}/{{$hot->thumbnail}}" alt="">
                        </div>
                        <div class="top-post-details">
                            <ul class="tags">
                                <li><a href="{{base_url('index.php/index/category/'.$hot->id_type)}}"><b>{{$hot->name_type}}</b></a></li>
                            </ul>
                            <a href="{{base_url('index.php/index/detail/'.$hot->id)}}">
                                <h3>{{$hot->title}}</h3>
                            </a>
                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span>{{$hot->name_user}}</a></li>
                                <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{date("j F, Y",strtotime($hot->day_update))}}</a></li>
                                <li><a href="#"><span class="lnr lnr-bubble"></span>{{$hot->comment['count']}} Comments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 top-post-right">
                        <?php $i = 1; ?>
                        @foreach($view as $key => $value)
                        <div class="single-top-post number-{{$i++}}">
                            <div class="feature-image-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" style="width: 373.33px; height: 216.13px;" src="{{base_url('assets/upload_images')}}/{{$value->thumbnail}}" alt="">
                            </div>
                            <div class="top-post-details">
                                <ul class="tags">
                                    <li><a href="{{base_url('index.php/index/category/'.$value->id_type)}}"><b>{{$value->name_type}}</b></a></li>
                                </ul>
                                <a href="{{base_url('index.php/index/detail/'.$value->id)}}">
                                    <h4>{{$value->title}}</h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span>{{$value->name_user}}</a></li>
                                    <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{date("j F, Y",strtotime($value->day_update))}}</a></li>
                                    <li><a href="#"><span class="lnr lnr-bubble"></span>{{$value->comment['count']}} Comments</a></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
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
                        @foreach($category as $key => $value)
                            @if ($value->viewest != NULL)


                        <!-- Start popular-post Area -->
                        <div class="popular-post-wrap">
                            <h4 class="title" style="text-transform: uppercase;color: #FFF;"><a style="color: #fff;" href="{{base_url('index.php/index/category/'.$value->id)}}"> {{$value->name}}</a></h4>
                            <div class="feature-post relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" style="width: 710px; height: 442.89px;" src="{{base_url('assets/upload_images')}}/{{$value->viewest['thumbnail']}}" alt="">
                                </div>
                                <div class="details">
                                    <ul class="tags">
                                        <li><a href="{{base_url('index.php/index/category/'.$value->id)}}"><b>{{$value->viewest['name_type']}}</b></a></li>
                                    </ul>
                                    <a href="{{base_url('index.php/index/detail/'.$value->viewest['id'])}}">
                                        <h3>{{$value->viewest['title']}}</h3>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>{{$value->viewest['name_user']}}</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{date("j F, Y",strtotime($value->viewest['day_update']))}}</a>
                                        </li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>{{$value->viewest['comment']['count']}} Comments</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-20 medium-gutters">
                                @foreach ($value->newest as $k => $item)
                                <div class="col-lg-6 single-popular-post">
                                    <div class="feature-img-wrap relative">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" style="width: 345px; height: 185.36px;" src="{{base_url('assets/upload_images')}}/{{$item['thumbnail']}}" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="{{base_url('index.php/index/category/'.$item['id_type'])}}"><b>{{$item['name_type']}}</b></a></li>
                                        </ul>
                                    </div>
                                    <div class="details">
                                        <a href="{{base_url('index.php/index/detail/'.$item['id'])}}">
                                            <h4>{{$item['title']}}</h4>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-user"></span>{{$item['name_user']}}</a></li>
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{date("j F, Y",strtotime($item['day_update']))}}</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>{{$item['comment']['count']}} </a></li>
                                        </ul>
                                        <p class="excert">
                                           {{$item['describe']}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <!-- End popular-post Area -->
                        <!-- Start banner-ads Area -->
                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                            <img class="img-fluid" src="{{base_url('assets/img')}}/banner-ad.jpg" alt="">
                        </div>
                        <!-- End banner-ads Area -->
                                @endif
                        @endforeach
                    </div>
@stop