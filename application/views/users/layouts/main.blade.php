<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{base_url('assets/img')}}/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
    CSS
    ============================================= -->
    <link rel="stylesheet" href="{{base_url('assets/css/linearicons.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{base_url('assets/bower_components/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{base_url('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{base_url('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{base_url('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{base_url('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{base_url('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{base_url('assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{base_url('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{base_url('assets/css/mycss.css')}}">
</head>
<body>
<header>

    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
                    <ul>
                        <li><a href="#" class="font-weight-bold"><?php $date = get_current_weekday() ?>{{$date['day']}}, {{date("j F, Y",$date['date'])}}</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
                    <ul>
                        @if(isset($_SESSION['name']))
                            <?php $arr = permission(); ?>
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;">Xin chào, <b>{{$arr->name}}</b></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @if($arr->id_per == 1 || $arr->id_per == 2)
                                    <a class="dropdown-item" href="<?= base_url('index.php/index/view_admin') ?>" style="font-size: 15px;"><i class="fas fa-tasks"></i> Trang quản lý</a>
                                @endif
                                <a class="dropdown-item" href="<?= base_url('index.php/users/infomation/'.$arr->id_user) ?>" style="font-size: 15px;"><i class="fas fa-address-card"></i> Thông tin cá nhân</a>
                                <a class="dropdown-item" href="<?= base_url('index.php/users/logout/user') ?>" style="color: #F44336; font-size: 15px;"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                            </div>
                        @else
                            <li><a href="{{base_url('index.php/index/view_login')}}"><span class="lnr lnr-phone-handset"></span><span class="font-weight-bold">Đăng nhập</span></a></li>
                            <li><a href="{{base_url('index.php/index/view_reg')}}"><span class="lnr lnr-envelope"></span><span class="font-weight-bold">Đăng ký</span></a></li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-wrap">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                    <a href="{{base_url('index.php/index')}}">
                        <img class="img-fluid" src="{{base_url('assets/img')}}/logo.png" alt="">
                    </a>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                    <img class="img-fluid" src="{{base_url('assets/img')}}/banner-ad.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="{{base_url('index.php/index')}}">Trang chủ</a></li>
                    <?php $type = get_category() ?>
                    @foreach($type as $key => $value)
                        <li><a href="{{base_url('index.php/index/category/'.$value['id'])}}"> {{$value['name']}} </a></li>
                    @endforeach
                </ul>
            </nav><!-- #nav-menu-container -->
            <div class="navbar-right">
                <form class="Search">
                    <input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
                    <label for="Search-box" class="Search-box-label">
                        <span class="lnr lnr-magnifier"></span>
                    </label>
                    <span class="Search-close">
								<span class="lnr lnr-cross"></span>
							</span>
                </form>
            </div>
        </div>
    </div>
</header>

@yield('content')
                <div class="col-lg-4">
                    <div class="sidebars-area">
                        <div class="single-sidebar-widget editors-pick-widget">
                            <h6 class="title">Latest news</h6>
                            <div class="editors-pick-post">
                                <div class="post-lists">
                                    <div class="post-lists">
                                        <?php $news = get_news(); ?>
                                        @foreach($news as $key => $value)
                                            <div class="single-post d-flex flex-row">
                                                <div class="thumb">
                                                    <img src="{{base_url('assets/upload_images')}}/{{$value->thumbnail}}" alt="" style="width: 100px; height: 80px;">
                                                </div>
                                                <div class="detail">
                                                    <a href="{{base_url('index.php/index/detail/'.$value->id)}}"><h6>{{$value->title}}</h6></a>
                                                    <ul class="meta">
                                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{date("j F, Y",strtotime($value->day_update))}}</a></li>
                                                        <li><a href="#"><span class="lnr lnr-bubble"></span>{{$value->comment['count']}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar-widget ads-widget">
                            <img class="{{base_url('assets/img')}}-fluid" src="{{base_url('assets/img')}}/sidebar-ads.jpg" alt="">
                        </div>

                        <div class="single-sidebar-widget most-popular-widget">
                            <h6 class="title">Most Popular</h6>
                            <?php $pop = get_views(); ?>
                            @foreach($pop as $key => $value)
                            <div class="single-list flex-row d-flex">
                                <div class="thumb">
                                    <img src="{{base_url('assets/upload_images')}}/{{$value->thumbnail}}" alt="" style="width: 100px; height: 80px;">
                                </div>
                                <div class="details">
                                    <a href="{{base_url('index.php/index/detail/'.$value->id)}}">
                                        <h6>{{$value->title}}</h6>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{date("j F, Y",strtotime($value->day_update))}}</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>{{$value->comment['count']}}</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="single-sidebar-widget ads-widget">
                            <img class="{{base_url('assets/img')}}-fluid" src="{{base_url('assets/img')}}/sidebar-ads.jpg" alt="">
                        </div>

                        <div class="single-sidebar-widget most-popular-widget">
                            <h6 class="title">Most Comments</h6>
                            <?php $comment = get_comments(); ?>
                            @foreach($comment as $key => $value)
                                <div class="single-list flex-row d-flex">
                                    <div class="thumb">
                                        <img src="{{base_url('assets/upload_images')}}/{{$value->thumbnail}}" alt="" style="width: 100px; height: 80px;">
                                    </div>
                                    <div class="details">
                                        <a href="{{base_url('index.php/index/detail/'.$value->id)}}">
                                            <h6>{{$value->title}}</h6>
                                        </a>
                                        <ul class="meta">
                                            <li><a href="#"><span class="lnr lnr-calendar-full"></span>{{date("j F, Y",strtotime($value->day_update))}}</a></li>
                                            <li><a href="#"><span class="lnr lnr-bubble"></span>{{$value->comment['count']}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="single-sidebar-widget ads-widget">
                            <img class="{{base_url('assets/img')}}-fluid" src="{{base_url('assets/img')}}/sidebar-ads.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>

<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Top Products</h4>
                <ul>
                    <li><a href="#">Managed Website</a></li>
                    <li><a href="#">Manage Reputation</a></li>
                    <li><a href="#">Power Tools</a></li>
                    <li><a href="#">Marketing Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Brand Assets</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Features</h4>
                <ul>
                    <li><a href="#">Jobs</a></li>
                    <li><a href="#">Brand Assets</a></li>
                    <li><a href="#">Investor Relations</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Resources</h4>
                <ul>
                    <li><a href="#">Guides</a></li>
                    <li><a href="#">Research</a></li>
                    <li><a href="#">Experts</a></li>
                    <li><a href="#">Agencies</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>Instragram Feed</h4>
                <ul class="instafeed d-flex flex-wrap">
                    <li><img src="{{base_url('assets/img')}}/i1.jpg" alt=""></li>
                    <li><img src="{{base_url('assets/img')}}/i2.jpg" alt=""></li>
                    <li><img src="{{base_url('assets/img')}}/i3.jpg" alt=""></li>
                    <li><img src="{{base_url('assets/img')}}/i4.jpg" alt=""></li>
                    <li><img src="{{base_url('assets/img')}}/i5.jpg" alt=""></li>
                    <li><img src="{{base_url('assets/img')}}/i6.jpg" alt=""></li>
                    <li><img src="{{base_url('assets/img')}}/i7.jpg" alt=""></li>
                    <li><img src="{{base_url('assets/img')}}/i8.jpg" alt=""></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-4 col-md-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- End footer Area -->
<script src="{{base_url('assets/js')}}/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{base_url('assets/js')}}/vendor/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{base_url('assets/js')}}/easing.min.js"></script>
<script src="{{base_url('assets/js')}}/hoverIntent.js"></script>
<script src="{{base_url('assets/js')}}/superfish.min.js"></script>
<script src="{{base_url('assets/js')}}/jquery.ajaxchimp.min.js"></script>
<script src="{{base_url('assets/js')}}/jquery.magnific-popup.min.js"></script>
<script src="{{base_url('assets/js')}}/mn-accordion.js"></script>
<script src="{{base_url('assets/js')}}/jquery-ui.js"></script>
<script src="{{base_url('assets/js')}}/jquery.nice-select.min.js"></script>
<script src="{{base_url('assets/js')}}/owl.carousel.min.js"></script>
<script src="{{base_url('assets/js')}}/mail-script.js"></script>
<script src="{{base_url('assets/js')}}/main.js"></script>
@yield('script')
</body>
</html>