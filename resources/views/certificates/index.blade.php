@extends('layouts.landing')


@section('content')




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
                <div class="single-services shadow text-center mt-30 wow fadeInUpBig" style=""
                    data-wow-duration="1.3s" data-wow-delay="0.2s">
                    <div class="services-icon d-flex align-items-center justify-content-center"
                        style="background-color:#02a14d;border:7px solid rgb(226, 226, 226);">
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
                <div class="single-services text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                    data-wow-delay="0.4s">
                    <div class="services-icon d-flex align-items-center justify-content-center"
                        style="background-color:rgba(0, 0, 0, 0.81);border:7px solid rgb(230, 228, 228);">
                        <i class="lni lni-layout"></i>
                    </div>
                    <div class="services-content">
                        <h4 class="services-title"><a href="#">Transparency</a></h4>
                        <p class="text">Track the progress of your requests ensuring you're always in the loop..</p>
                    </div>
                </div> <!-- single services -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-services shadow text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                    data-wow-delay="0.6s">
                    <div class="services-icon d-flex align-items-center justify-content-center"
                        style="background-color:#02a14d;border:7px solid rgb(230, 229, 229);">
                        <i class="lni lni-bolt"></i>
                    </div>
                    <div class="services-content">
                        <h4 class="services-title"><a href="#">Communication</a></h4>
                        <p class="text">Stay informed through real-time updates related to your submissions.</p>
                    </div>
                </div> <!-- single services -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="single-services shadowservices-color-4 text-center mt-30 wow fadeInUpBig"
                    data-wow-duration="1.3s" data-wow-delay="0.8s">
                    <div class="services-icon d-flex align-items-center justify-content-center"
                        style="background-color:rgba(0, 0, 0, 0.813);border-color: 2px solid white;">
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
                    <img class="" style="border-radius:25px;" src="{{ asset('assets/oo.jpg') }}" alt="download">

                    <!-- <div class="download-shape-1"></div> -->
                    <div class="download-shape-2">
                        <!-- <img class="svg" src="assets/assets/images/download-shape.svg" alt="shape"> -->
                    </div>
                </div> <!-- download image -->
            </div>
            <div class="col-lg-6">
                <div class="download-content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s"
                    data-wow-delay="0.5s">
                    <h3 class="download-title">Elevate Your Experience!</h3>
                    <p class="text">Experience the transformational power of ESSP. We are committed to continuously
                        enhancing your journey through ongoing updates and improvements. Your feedback shapes the
                        evolution of our platform, ensuring it remains tailored to your needs.
                    </p>
                    <ul>

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

   