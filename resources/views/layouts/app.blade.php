<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="PGL - Ben Onabe">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nigerian Social Insurance Trust Fund (NSITF), Employer Self Service Portal (ESSP).">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./assets/images/NSITF-logo.png">
    <!-- Page Title  -->
    <title>@yield('title') | {{ env('APP_NAME') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.3">
    @stack('styles')
</head>

<body class="nk-body ui-rounder npc-default has-sidebar ">
    <div class="nk-app-root">

        @include('layouts.sidebar')

        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">

                @include('layouts.navbar')

                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">

                                @if (session('success') || session('info') || session('warning') || session('error') || $errors->any())
                                    <div class="row">
                                        <div class="col-12 my-4">
                                            @if (session('success'))
                                                <div class="example-alert">
                                                    <div class="alert alert-primary alert-icon alert-dismissible">
                                                        <em class="icon ni ni-alert-circle"></em>
                                                        <strong>Success:</strong>
                                                        <span>{{ session('success') }}</span>
                                                        <button class="close" data-bs-dismiss="alert"></button>
                                                    </div>
                                                </div>
                                            @elseif (session('info'))
                                                <div class="example-alert">
                                                    <div class="alert alert-info alert-icon alert-dismissible">
                                                        <em class="icon ni ni-alert-circle"></em>
                                                        <strong>Info:</strong>
                                                        <span>{{ session('info') }}</span>
                                                        <button class="close" data-bs-dismiss="alert"></button>
                                                    </div>
                                                </div>
                                            @elseif (session('warning'))
                                                <div class="example-alert">
                                                    <div class="alert alert-warning alert-icon alert-dismissible">
                                                        <em class="icon ni ni-alert-circle"></em>
                                                        <strong>Warning:</strong>
                                                        <span>{{ session('warning') }}</span>
                                                        <button class="close" data-bs-dismiss="alert"></button>
                                                    </div>
                                                </div>
                                            @elseif (session('error'))
                                                <div class="example-alert">
                                                    <div class="alert alert-danger alert-icon alert-dismissible">
                                                        <em class="icon ni ni-alert-circle"></em>
                                                        <strong>Error:</strong>
                                                        <span>{{ session('error') }}</span>
                                                        <button class="close" data-bs-dismiss="alert"></button>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($errors->any())
                                                <div class="example-alert">
                                                    <div class="alert alert-danger alert-icon alert-dismissible">
                                                        <em class="icon ni ni-alert-circle"></em>
                                                        <strong>Error:</strong>
                                                        <p>
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                        </p>
                                                        <button class="close" data-bs-dismiss="alert"></button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                {{-- CHECK IF ECS REGISTRATION DONE --}}
                                @if (Auth::user()->paid_registration != 1)
                                    @include('payments.ecs')
                                @else
                                    @yield('content')
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=3.1.3"></script>
    <script src="./assets/js/scripts.js?ver=3.1.3"></script>
    <script></script>
    @stack('scripts')

    @if (env('APP_ENV') == 'production')
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/64ef0da4a91e863a5c10a087/1h92sqjuh';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    @endif
</body>

</html>

{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
 --}}
