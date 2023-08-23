@extends('layouts.landing')


@section('content')


<header class="header-area">
    <div class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="background-color: #ffffff;">
                    <nav class="navbar navbar-expand-lg" style="background-color: #ffffff;">
                        <a class="navbar-brand" href="{{ url('/') }}" style="text-decoration: none;">
                            <img style="height: 6vh;" src="{{ asset('assets/assets/images/NSITF-logo.png') }}" alt="">
                            <!-- <b style="font-size: 30px; color: #02a14d; font-family:verdana;">Employer Self Service Portal</b> -->
                        </a>


                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="page-scroll" href="#home">Home</a>
                                </li>


                                <li class="nav-item">
                                    <a class="page-scroll1" href="{{ route('register') }}">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll1" href="{{ route('login') }}">Login</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- navbar area -->

    <div id="home" class="header-hero bg_cover d-lg-flex align-items-center">
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="col-lg-6 col-md-10">
                    <div class="header-hero-content">
                        <h3 class="header-title wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                            Welcome to the Employer Self Service Portal (ESSP)</h3>
                        <p class="text wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.6s">Welcome to
                            a new era of employer interaction with the Nigeria Social Insurance Trust Fund. Harness
                            the power of ESSP and experience a future where administrative tasks are effortless,
                            communication is seamless, and convenience is paramount.</p>
                        <ul class="d-flex">
                            <li><a href="{{ route('register') }}" rel="nofollow"
                                    class="main-btn wow fadeInLeftBig" data-wow-duration="1.3s"
                                    data-wow-delay="0.8s">Register
                                </a>
                            </li>
                            <li><a href="{{ route('login') }}" rel="nofollow" class="main-btn wow fadeInLeftBig" data-wow-duration="1.3s"
                                    data-wow-delay="0.8s">Login
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-10">
                    <div class="px-5">
                        <div class="">
                            <!-- <lottie-player src="https://lottie.host/32660aa6-4f6d-4480-a91b-d9ca8cb9d9d7/x1Fk9UJwm2.json" background="#ffffff"
                                speed="1" style="width: 600px; height: 600px; background: transparent;" loop autoplay direction="1" mode="normal">
                            </lottie-player> -->
                            <img src="{{ asset('assets/assets/images/businessperson.png') }}" alt="">
                        </div>
                    </div>
                </div> <!-- header image -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="header-shape-1"></div>
    <div class="header-shape-2">
        <!-- <img src="assets/assets/images/header-shape-2.svg" alt="shape"> -->
    </div> <!-- header shape -->
    </div> <!-- header hero -->
</header>
<!--====== SERVICES PART START ======-->

<section id="why" class="services-area pt-110 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center pb-25">
                    <h3 class="title">Unparalleled Convenience</h3>
                    <p class="text">Experience a new level of convenience with ESSP's array of benefits</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-services shadow text-center mt-30 wow fadeInUpBig" style="" data-wow-duration="1.3s" data-wow-delay="0.2s">
                    <div class="services-icon d-flex align-items-center justify-content-center" style="background-color:#02a14d;border:7px solid rgb(226, 226, 226);">
                        <i class="lni lni-layers"></i>
                    </div>
                    <div class="services-content">
                        <h4 class="services-title"><a href="#">Time Efficiency</a></h4>
                        <p class="text">Streamline tasks, allowing you allocate more time to business operations.
                        </p>
                    </div>
                </div> <!-- single services -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-services text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.4s">
                    <div class="services-icon d-flex align-items-center justify-content-center" style="background-color:rgba(0, 0, 0, 0.81);border:7px solid rgb(230, 228, 228);">
                        <i class="lni lni-layout"></i>
                    </div>
                    <div class="services-content">
                        <h4 class="services-title"><a href="#">Transparency</a></h4>
                        <p class="text">Track the progress of your requests ensuring you're always in the loop..</p>
                    </div>
                </div> <!-- single services -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-services shadow text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.6s">
                    <div class="services-icon d-flex align-items-center justify-content-center" style="background-color:#02a14d;border:7px solid rgb(230, 229, 229);">
                        <i class="lni lni-bolt"></i>
                    </div>
                    <div class="services-content">
                        <h4 class="services-title"><a href="#">Communication</a></h4>
                        <p class="text">Stay informed through real-time updates related to your submissions.</p>
                    </div>
                </div> <!-- single services -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-services shadowservices-color-4 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                    <div class="services-icon d-flex align-items-center justify-content-center" style="background-color:rgba(0, 0, 0, 0.813);border-color: 2px solid white;">
                        <i class="lni lni-protection"></i>
                    </div>
                    <div class="services-content">
                        <h4 class="services-title"><a href="#">Accessibility</a></h4>
                        <p class="text">Access the portal anytime, anywhere, eliminating geographical barriers.</p>
                    </div>
                </div> <!-- single services -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== SERVICES PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about" class="about-area pt-70 pb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-image mt-50 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                    <!-- <div class="about-shape"></div> -->
                    <img class="app" src="{{ asset('assets/cc.jpg') }}" alt="app">
                </div> <!-- about image -->
            </div>
            <div class="col-lg-6">
                <div class="about-content mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                    <div class="section-title">
                        <h3 class="title">Instant Certificate Access</h3>
                        <p class="text">Gone are the days of waiting weeks for your certificates. ESSP empowers you
                            to access your certificates swiftly. Whether it's insurance certificates or
                            compensation-related documents, our portal provides secure and immediate access to your
                            important paperwork.
                        </p>
                    </div> <!-- section title -->
                    <a href="{{ route('verification') }}" rel="nofollow" class="main-btn">Verify
                        Certificates</a>
                </div> <!-- about content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== ABOUT PART ENDS ======-->


<!--====== DOWNLOAD PART START ======-->

<section id="download" class="download-area pt-70 pb-40">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-9">
                <div class="download-image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                    <img class="" style="border-radius:25px;" src="{{ asset('assets/reps.jpg') }}" alt="download">

                    <!-- <div class="download-shape-1"></div> -->
                    <div class="download-shape-2">
                        <!-- <img class="svg" src="assets/assets/images/download-shape.svg" alt="shape"> -->
                    </div>
                </div> <!-- download image -->
            </div>
            <div class="col-lg-6">
                <div class="download-content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                    <h3 class="download-title">Dedicated 24/7 Support from Servicom</h3>
                    <p class="text">Experience the transformational power of ESSP, backed by the unwavering support of Servicom, our specialized department within NSITF. We understand that your needs don't adhere to a 9-to-5 schedule, which is why we offer round-the-clock assistance to ensure your journey is always smooth, your feedback continues to play a vital role in the evolution of our platform.
                    </p>
                    <ul>
                        <a href="http://servicomnsitf.gov.ng" rel="nofollow" class="main-btn">Explore 24/7 Support</a>
                    </ul>
                </div> <!-- download image -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== DOWNLOAD PART ENDS ======-->
@endsection
<!--====== DOWNLOAD PART ENDS ======-->

<!--====== PART START ======-->