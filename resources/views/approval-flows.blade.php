<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
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

        @include("layouts.sidebar")

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
                                                            <h5 class="title fw-medium">Approval Flows</h5>
                                                            <span>These settings are helps youto add or manage user.</span>
                                                            <span class="text-success"><em class="icon ni ni-shield-check"></em></span>
                                                        </div><!-- .nk-block-head-content -->
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div><!-- .nk-block-between -->
                                                </div><!-- .nk-block-head -->
                                                <div class="form-group">
                                                    <a href="/approval/flows/create" class="btn btn-primary mt-2">Create Approval Flow</a>
                                                </div>
                                                <div class="nk-block card card-bordered mt-3">
                                                    <table class="table table-ulogs">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th class="tb-col-os"><span class="overline-title">Approval Type</span></th>
                                                                <th class="tb-col-ip"><span class="overline-title">Scope</span></th>
                                                                <th class="tb-col-ip"><span class="overline-title">Steps</span></th>
                                                                <th class="tb-col-ip"><span class="overline-title">Timeline</span></th>
                                                                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="tb-col-os">Budget Approval Request</td>
                                                                <td class="tb-col-ip"><span class="sub-text">Organization [ All ]</span></td>
                                                                <td class="tb-col-ip"><span class="sub-text">9</span></td>
                                                                <td class="tb-col-ip"><span class="sub-text">3 months</span></td>
                                                                <td class="tb-col-action">
                                                                    <a href="/approval/flows/show" class="btn btn-dim btn-sm btn-primary">View</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tb-col-os">DTA Request</td>
                                                                <td class="tb-col-ip"><span class="sub-text">Branch [ ABUJA ]</span></td>
                                                                <td class="tb-col-ip"><span class="sub-text">7</span></td>
                                                                <td class="tb-col-ip"><span class="sub-text">7 days</span></td>
                                                                <td class="tb-col-action">
                                                                    <a href="/approval/flows/show" class="btn btn-dim btn-sm btn-primary">View</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="tb-col-os">Leave Request</td>
                                                                <td class="tb-col-ip"><span class="sub-text">Department [ ICT ]</span></td>
                                                                <td class="tb-col-ip"><span class="sub-text">4</span></td>
                                                                <td class="tb-col-ip"><span class="sub-text">2 weeks</span></td>
                                                                <td class="tb-col-action">
                                                                    <a href="/approval/flows/show" class="btn btn-dim btn-sm btn-primary">View</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
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
