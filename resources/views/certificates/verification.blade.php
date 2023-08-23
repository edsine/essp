@extends('layouts.landing')

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


                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="page-scroll" href="{{ url('/') }}">Home</a>
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

    </div> <!-- header hero -->
</header>
@section('content')
<section id="why" class="services-area1 pt-110 pb-120" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
   <div class="row">
  <div class="col-md-12" style="margin-top: 30px;">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
    {{ session('error') }}
    </div>
    @endif
    <form style="" action="{{ route('certificate.verify') }}" method="get" style="text-align: center;">
        <label for="ecs_number">Enter ECS Number:</label>
        <input class="form-control" type="text"  name="ecs_number" id="ecs_number" required>
        <button type="submit" class="main-btn" style="margin-top: 10px;">Verify</button>
    </form>
  </div>
   </div>
</section>

@endsection

