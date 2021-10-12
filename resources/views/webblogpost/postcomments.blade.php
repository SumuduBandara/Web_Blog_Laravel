<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diluka BLOG</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- FONTS ONLINE -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,300,700,400' rel='stylesheet' type='text/css'>

    <!--MAIN STYLE-->
    <link href="{{ asset('assets/web/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/web/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/web/css/owl.theme.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/web/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/web/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/web/css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/web/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/web/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!--======= COLOR STYLE CSS =========-->
    <link rel="stylesheet" id="color" href="{{ asset('assets/web/css/color/default.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!--======= PRELOADER =========-->
    <div class="work-in-progress">
        <div id="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>


    <!--======= WRAPPER =========-->
    <div id="wrap" class="wide">

        <!--======= TOP BAR =========-->
        <div class="top-bar">
            <div class="container">
                <ul class="left-bar-side">

                    <li> <a href="https://www.facebook.com/wikum.diluka"><i class="fa fa-facebook"></i></a></li>
                </ul>
                <ul class="right-bar-side">
                    <li> <a href="#."><i class="fa fa-phone"></i> + 94 77 302 9192</a></li>
                    <li> <a href="#."><i class="fa fa-envelope"></i> wikumdiluka1@gmail.com</a></li>


                    @if( auth()->check() )
                    <li> <a href="#."><i class="fa fa-user"></i>
                            logged user :
                            {{auth()->user()->name}}</a></li>
                    <li> <a href="{{ route("dash.board") }}"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                    <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </a>
                    @else
                    </a></li>
                    @endif
                </ul>
            </div>
        </div>

        <!--======= HEADER =========-->
        <header class="sticky">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="row">
                        <div class="navbar-header col-md-3 col-sm-3">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-res"> <span class="sr-only">Toggle navigation</span> <span class="fa fa-navicon"></span> </button>
                            <!--======= LOGO =========-->
                            <div class="logo">
                                <a class="theme-title" href="javascript:void(0)">
                                    <img src="{{ asset('assets/images/logoname.jpg') }}" class="align-top" style="height: 55px;">
                                </a>
                            </div>
                        </div>

                        <!--======= MENU =========-->
                        <div class="col-md-9 col-sm-9">
                            <div class="collapse navbar-collapse" id="nav-res">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown active"> <a href="/" class="dropdown-toggle">Home </a></li>

                                    <li class="dropdown"> <a href="{{ route("blogpost.comments") }}" class="dropdown-toggle">Blog </a></li>
                                    <li class="dropdown"> <a href="/login" class="dropdown-toggle">Login </a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!--======= BANNER =========-->
        <div id="banner">
            <div class="flexslider">
                <ul class="slides">

                    <!--======= SLIDE 1 =========-->
                    <li style="height:400px;"> <img src="{{ asset('assets/web/images/banner1.jpg') }}" alt=""></li>

                    <!--======= SLIDE 2 =========-->
                    <li> <img src="{{ asset('assets/web/images/banner2.jpg') }}" alt="">

                    </li>
                </ul>
            </div>
        </div>

        <!--======= CONTENT START =========-->
        <div class="content">


            <!--======= BANNER =========-->
            <div class="sub-banner">
                <div class="container">
                    <h2>Our Blog</h2>
                    <ul class="links">
                        <li><a href="#.">Home</a>/</li>
                        <li><a href="#.">Blog</a></li>
                    </ul>
                </div>
            </div>

            <!--======= CONTENT START =========-->
            <div class="content">

                <!--======= NEWS / FAQS =========-->
                <section class="news">
                    <div class="container">

                        <!--======= TITTLE =========-->
                        <div class="tittle">
                            <h3>Our Blog</h3>

                            <hr>
                        </div>
                        <div class="news-artical products blog single-post">
                            <div class="row">

                                <!--======= NEWS ARTICALS =========-->
                                <div class="col-md-12">

                                    <!--======= BLOG PAGE =========-->
                                    <div class="b-post"> <img class="img-responsive" src="images/product-img-5.jpg" alt="">

                                        <!--======= BLOG TEXT =========-->



                                        <!--======= ADMIN INFO =========-->
                                        <div class="auther-info">
                                            <ul>
                                                <li>

                                                </li>
                                                <li>
                                                    <h4 style="color:brown">{{ $post->title }} || {{ $post->created_at }}</h4>
                                                    <p>{{ $post->description }}</p>
                                                </li>
                                            </ul>
                                        </div>

                                        <!--======= COMMENTS  PEOPLES =========-->
                                        <div class="comments">
                                           <h3>Comments</h3>
                                            <ul class="">

                                                @if($postcomment!=NULL )
                                                @foreach($postcomment as $category)
                                                <!--======= COMMENTS  =========-->
                                                <li>
                                                    <ul class="coments">
                                                        <li>
                                                            <div class="img-admin"> <img src="images/avatar-1.jpg" alt=""> </div>
                                                        </li>
                                                        <li>
                                                            <h4>{{ $category->bloggername  }}</h4>
                                                            <span>{{ $category->commentcreatedate  }}</span>
                                                            <p>{{ $category->postcomment  }} </p>
                                                        </li>
                                                    </ul>
                                                </li>
                                                @endforeach
                                                @endif

                                            </ul>
                                        </div>

                                        <!--======= COMMENTS FORM =========-->

                                        @if( auth()->check() )
                                        <div class="commnet-form">
                                            <h3>Leave a Comment</h3>
                                            <form action="{{ route("blogpostid.store",request()->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <ul class="row">

                                                
                                                    <li class="col-md-12">
                                                        <textarea class="form-control" name="comment" id="comment"  rows="3" placeholder="Post Your Comment"></textarea>
                                                        <span class="error">{{ $errors->first('comment') }}</span>
                                                    </li>
                                                </ul>
                                               
                                                <button type="submit">SUBMIT COMMENT</button>
                                            </form>
                                        </div>
                                        @else
                                        <div class="commnet-form">
                                            <h3><a href="/login">Please login to the Leave a Comment</a></h3>
                                            @endif
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>








                <!--======= FOOTER =========-->
                <footer>

                    <!--======= RIGHTS =========-->
                    <div class="rights">
                        <div class="container">
                            <ul class="row">
                                <li class="col-md-8">
                                    <p>All Rights Reserved © News Blog | Designed & Developed By Wikum Diluka</p>
                                </li>
                                <!--======= SOCIAL ICON =========-->
                                <li class="col-md-4">
                                    <ul class="social_icons">
                                        <li class="facebook"><a href=https://www.facebook.com/wikum.diluka"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>






        <!-- ============================== LOGIN MODAL END ================================= -->
        <script src="{{ asset('assets/web/js/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('assets/web/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/web/js/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/web/js/drive-me-plugin.js') }}"></script>
        <script src="{{ asset('assets/web/js/jquery.isotope.min.js') }}"></script>
        <script src="{{ asset('assets/web/js/jquery.flexslider-min.js') }}"></script>
        <script src="{{ asset('assets/web/js/mapmarker.js') }}"></script>
        <script src="{{ asset('assets/web/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/web/js/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/web/js/main.js') }}"></script>

        <script src="{{ asset('assets/web/js/jquery.cookie.js') }}"></script>
        <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script>
        <script type="text/javascript">




        
            // Use below link if you want to get latitude & longitude
            // http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude.php
            $(document).ready(function() {
                //set up markers
                var myMarkers = {
                    "markers": [{
                        "latitude": "-37.8176419",
                        "longitude": "144.9554397",
                        "icon": "images/map-locator.png",
                        "baloon_text": '121 King St, Melbourne VIC 3000, Australia'
                    }]
                };
                //set up map options
                $("#map").mapmarker({
                    zoom: 15,
                    center: '121 King Street Melbourne Victoria 3000 Australia',
                    markers: myMarkers
                });
            });
        </script>



</body>

</html>