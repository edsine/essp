<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>User settings | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.3">
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
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-inner card-inner-lg">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content">
                                                            <h5 class="title fw-medium">Approval Flow</h5>
                                                            <span>These settings are helps youto add or manage
                                                                user.</span>
                                                            <span class="text-success"><em
                                                                    class="icon ni ni-shield-check"></em></span>
                                                        </div><!-- .nk-block-head-content -->
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#"
                                                                class="toggle btn btn-icon btn-trigger mt-n1"
                                                                data-target="userAside"><em
                                                                    class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div><!-- .nk-block-between -->
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block card card-bordered mt-3">
                                                    <div class="card-inner border-bottom">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Leave Request</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                        <div class="timeline">
                                                            <h6 class="timeline-head">Department (ICT)</h6>
                                                            <ul class="timeline-list">
                                                                <li class="timeline-item">
                                                                    <div class="timeline-status bg-teal is-outline">
                                                                    </div>
                                                                    <div class="timeline-date">Step 1 {{-- <em
                                                                            class="icon ni ni-alarm-alt"></em> --}}</div>
                                                                    <div class="timeline-data">
                                                                        <h6 class="timeline-title">[All Users]</h6>
                                                                        <div class="timeline-des">
                                                                            <p><span class="badge bg-outline-success">Create</span></p>
                                                                            <span class="time">09:30am</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <div class="timeline-status bg-primary is-outline"></div>
                                                                    <div class="timeline-date">Step 2 <em
                                                                            class="icon ni ni-alarm-alt"></em></div>
                                                                    <div class="timeline-data">
                                                                        <h6 class="timeline-title">[Head of Department], [Head of Unit]</h6>
                                                                        <div class="timeline-des">
                                                                            <p>
                                                                                <span class="badge bg-outline-primary">Approve</span>
                                                                                <span class="badge bg-outline-info">Modify</span>
                                                                                <span class="badge bg-outline-danger">Decline</span>
                                                                            </p>
                                                                            <span class="time">09:30am</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <div class="timeline-status bg-primary is-outline"></div>
                                                                    <div class="timeline-date">Step 3 <em
                                                                            class="icon ni ni-alarm-alt"></em></div>
                                                                    <div class="timeline-data">
                                                                        <h6 class="timeline-title">[HR]</h6>
                                                                        <div class="timeline-des">
                                                                            <p>
                                                                                <span class="badge bg-outline-primary">Approve</span>
                                                                                <span class="badge bg-outline-warning">Return</span>
                                                                            </p>
                                                                            <span class="time">09:30am</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-item">
                                                                    <div class="timeline-status bg-primary"></div>
                                                                    <div class="timeline-date">Step 4 <em
                                                                            class="icon ni ni-alarm-alt"></em></div>
                                                                    <div class="timeline-data">
                                                                        <h6 class="timeline-title">[Manager]</h6>
                                                                        <div class="timeline-des">
                                                                            <span class="badge bg-outline-primary">Approve</span>
                                                                                <span class="badge bg-outline-warning">Return</span>
                                                                                <span class="badge bg-outline-danger">Decline</span>
                                                                            <span class="time">09:30am</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .card -->
                                            </div>
                                            @include('partials.approval-navs')
                                        </div><!-- card-aside-wrap -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
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
</body>

</html>
