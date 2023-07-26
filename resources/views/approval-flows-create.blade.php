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
                                                            <h6 class="timeline-head">Details</h6>

                                                            <div class="row gy-4">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Approval Type</label>
                                                                        <div class="form-control-wrap">
                                                                            <select class="form-select js-select2">
                                                                                <option>DTA
                                                                                    Request</option>
                                                                                <option>Leave Request</option>
                                                                                <option>Expense Request</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">

                                                                    <div class="form-group">
                                                                        <label class="form-label"
                                                                            for="outlined-date-picker">Duration</label>
                                                                        <div class="form-control-wrap">
                                                                            <select class="form-select js-select2">
                                                                                <option>Days</option>
                                                                                <option>Weeks</option>
                                                                                <option>Months</option>
                                                                                <option>Years</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">

                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="form-label">Period</label>
                                                                        <div
                                                                            class="form-control-wrap number-spinner-wrap">
                                                                            <button
                                                                                class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                                                data-number="minus"><em
                                                                                    class="icon ni ni-minus"></em></button>
                                                                            <input type="number"
                                                                                class="form-control number-spinner"
                                                                                value="0">
                                                                            <button
                                                                                class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                                                data-number="plus"><em
                                                                                    class="icon ni ni-plus"></em></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Zone</label>
                                                                        <div class="form-control-wrap">
                                                                            <select class="form-select js-select2">
                                                                                <option>All</option>
                                                                                <option>North Central</option>
                                                                                <option>South South</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">

                                                                    <div class="form-group">
                                                                        <label class="form-label">Branch</label>
                                                                        <div class="form-control-wrap">
                                                                            <select class="form-select js-select2">
                                                                                <option>All</option>
                                                                                <option>Abuja</option>
                                                                                <option>Niger</option>
                                                                                <option>Kaduna</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-4">

                                                                    <div class="form-group">
                                                                        <label class="form-label">Department</label>
                                                                        <div class="form-control-wrap">
                                                                            <select class="form-select js-select2">
                                                                                <option>All</option>
                                                                                <option>ICT</option>
                                                                                <option>Finance</option>
                                                                                <option>Human Resource</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    {{-- <div class="form-group">
                                                                        <label class="form-label">Unit</label>
                                                                        <div class="form-control-wrap">
                                                                            <select class="form-select js-select2">
                                                                                <option>All</option>
                                                                                <option>ITP</option>
                                                                                <option>ITS</option>
                                                                            </select>
                                                                        </div>
                                                                    </div> --}}
                                                                </div><!-- .col -->
                                                            </div><!-- .row -->

                                                            <hr class="preview-hr">
                                                            <h6 class="timeline-head">Define Flow</h6>

                                                            <div class="row gy-4">
                                                                <div class="col-12">
                                                                    <table class="table">
                                                                        <thead class="table-light">
                                                                            <tr>
                                                                                <th>
                                                                                    <div class="row">
                                                                                        <div class="col-3">
                                                                                            Step
                                                                                        </div>
                                                                                        <div class="col-5">
                                                                                            Role(s)
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            Actions
                                                                                        </div>
                                                                                    </div>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-3 my-1">
                                                                                            <div
                                                                                                class="form-control-wrap number-spinner-wrap">
                                                                                                <button
                                                                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                                                                    data-number="minus"><em
                                                                                                        class="icon ni ni-minus"></em></button>
                                                                                                <input type="number"
                                                                                                    class="form-control number-spinner"
                                                                                                    value="1">
                                                                                                <button
                                                                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                                                                    data-number="plus"><em
                                                                                                        class="icon ni ni-plus"></em></button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-5 my-1">
                                                                                            <div class="form-group">
                                                                                                <div
                                                                                                    class="form-control-wrap">
                                                                                                    <select
                                                                                                        class="form-select js-select2"
                                                                                                        multiple="multiple"
                                                                                                        data-placeholder="Select Role(s)">
                                                                                                        <option>Backend
                                                                                                            Developer
                                                                                                        </option>
                                                                                                        <option>Frontend
                                                                                                            Developer
                                                                                                        </option>
                                                                                                        <option>
                                                                                                            Fullstack
                                                                                                            Developer
                                                                                                        </option>
                                                                                                        <option>Mobile
                                                                                                            Developer
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 my-1">
                                                                                            <div class="form-group">
                                                                                                <div
                                                                                                    class="form-control-wrap">
                                                                                                    <select
                                                                                                        class="form-select js-select2"
                                                                                                        multiple="multiple"
                                                                                                        data-placeholder="Select Actions(s)">
                                                                                                        <option>Create
                                                                                                        </option>
                                                                                                        <option>Modify
                                                                                                        </option>
                                                                                                        <option>Approve
                                                                                                        </option>
                                                                                                        <option>Decline
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-3 my-1">
                                                                                            <div
                                                                                                class="form-control-wrap number-spinner-wrap">
                                                                                                <button
                                                                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-minus"
                                                                                                    data-number="minus"><em
                                                                                                        class="icon ni ni-minus"></em></button>
                                                                                                <input type="number"
                                                                                                    class="form-control number-spinner"
                                                                                                    value="2">
                                                                                                <button
                                                                                                    class="btn btn-icon btn-outline-light number-spinner-btn number-plus"
                                                                                                    data-number="plus"><em
                                                                                                        class="icon ni ni-plus"></em></button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-5 my-1">
                                                                                            <div class="form-group">
                                                                                                <div
                                                                                                    class="form-control-wrap">
                                                                                                    <select
                                                                                                        class="form-select js-select2"
                                                                                                        multiple="multiple"
                                                                                                        data-placeholder="Select Role(s)">
                                                                                                        <option>Head of Unit
                                                                                                        </option>
                                                                                                        <option>Head of Department
                                                                                                        </option>
                                                                                                        <option>
                                                                                                            Human Resource
                                                                                                        </option>
                                                                                                        <option>Manager
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-4 my-1">
                                                                                            <div class="form-group">
                                                                                                <div
                                                                                                    class="form-control-wrap">
                                                                                                    <select
                                                                                                        class="form-select js-select2"
                                                                                                        multiple="multiple"
                                                                                                        data-placeholder="Select Actions(s)">
                                                                                                        <option>Create
                                                                                                        </option>
                                                                                                        <option>Modify
                                                                                                        </option>
                                                                                                        <option>Approve
                                                                                                        </option>
                                                                                                        <option>Decline
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col mt-0">
                                                                    <a href="#" class="btn btn-primary mt-0"><em
                                                                            class="icon ni ni-plus-sm"></em></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner border-top">
                                                        <div class="row gy-4">
                                                            <div class="col">
                                                                <a href="/approval/flows"
                                                                    class="btn btn-primary mt-2">Create
                                                                    Approval
                                                                    Flow</a>
                                                            </div>
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
