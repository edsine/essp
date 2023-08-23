<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>>@yield('title') | {{ env('APP_NAME') }}</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('assets/assets/images/favicon.png')}}" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/assets/css/animate.css')}}">

    <!--====== lineicons CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/assets/css/lineicons.css')}}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/assets/css/bootstrap.min.css')}}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/assets/css/default.css')}}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('assets/assets/css/style.css')}}">

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    @yield('content')

    <footer id="footer" class="footer-area">
        <!--         
        <div class="footer-shape shape-1"></div>
        <div class="footer-shape shape-2"></div>
        <div class="footer-shape shape-3"></div>
        <div class="footer-shape shape-4"></div>
        <div class="footer-shape shape-5"></div>
        <div class="footer-shape shape-6"></div> -->
        <!-- <div class="footer-shape shape-7"></div> -->
        <div class="footer-shape shape-8">
            <img class="svg" src="{{asset('assets/assets/images/footer-shape.svg')}}" alt="Shape">
        </div>

        <div class="footer-widget pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.2s">
                            <a class="navbar-brand" href="index.html" style="text-decoration: none;">
                                <img style="height: 6vh;" src="{{ asset('assets/assets/images/NSITF-logo.png') }}" alt="">
                                <!-- <b style="font-size: 30px; color: #02a14d; font-family:verdana;">Employer Self Service Portal</b> -->
                            </a>
                            <p class="text">Experience the transformational power of ESSP. We are committed to
                                continuously enhancing your journey</p>
                            <ul class="social">
                                <li><a href="#"><i class="lni lni-facebook"></i></a></li>
                                <li><a href="#"><i class="lni lni-twitter"></i></a></li>
                                <li><a href="#"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-link d-flex flex-wrap">
                            <div class="footer-link-wrapper mt-45 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Quick Links</h4>
                                </div>
                                <ul class="link">
                                    <li><a class="" href="#">Home</a></li>
                                    <li><a class="" href="#">Login</a></li>
                                    <li><a class="" href="#">Contact</a></li>
                                </ul>
                            </div> <!-- footer link wrapper -->

                            <div class="footer-link-wrapper mt-45 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">Support</h4>
                                </div>
                                <ul class="link">
                                    <li><a class="" href="#">FAQ on Servicomm</a></li>
                                    <li><a class="" href="#">Privacy Policy</a></li>
                                    <li><a class="" href="#">Terms Of Use</a></li>

                                </ul>
                            </div> <!-- footer link wrapper -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact mt-45 wow fadeIn" data-wow-duration="1.3s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Quick Link</h4>
                            </div>
                            <ul class="contact-list">
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="lni lni-phone"></i> +234-8182049872</p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><a href="#"><i class="lni lni-envelope"></i>support@nsitf.gov.ng</a></p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>

                                <li>
                                    <div class="contact-info d-flex">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="lni lni-map"></i>Plot 794, Mohammadu Buhari Way, Central Business Area, P.M.B. 446, Garki, Abuja, Nigeria.
                                            </p>
                                        </div>
                                    </div> <!-- contact info -->
                                </li>
                            </ul> <!-- contact list -->
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->



        <!--====== PART ENDS ======-->

        <!--====== BACK TOP TOP PART START ======-->

        <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

        <!--====== BACK TOP TOP PART ENDS ======-->

        <!--====== PART START ======-->

        <!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-"></div> 
            </div>
        </div>
    </section>
-->

        <!--====== PART ENDS ======-->




        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js')}}"></script>
        <!--====== Jquery js ======-->
        <script src="{{asset('assets/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('assets/assets/js/vendor/modernizr-3.7.1.min.js')}}"></script>

        <!--====== Bootstrap js ======-->
        <script src="{{asset('assets/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/assets/js/bootstrap.min.js')}}"></script>


        <!--====== WOW js ======-->
        <script src="{{asset('assets/assets/js/wow.min.js')}}"></script>


        <!--====== Scrolling Nav js ======-->
        <script src="{{asset('assets/assets/js/jquery.easing.min.js')}}"></script>
        <script src="{{asset('assets/assets/js/scrolling-nav.js')}}"></script>

        <!--====== Main js ======-->
        <script src="{{asset('assets/assets/js/main.js')}}"></script>

</body>

</html>