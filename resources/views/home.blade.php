@extends('layouts.app')

@section('title', 'Dashboard')


@push('styles')
@endpush


@section('content')

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Dashboard</h3>
                <div class="nk-block-des text-soft">
                    <p>Welcome to the Employer Dashboard.</p>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Employees</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">{{ number_format($metrics['employees']) }}</div>
                                    <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Accident Claims</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">&#8358;{{ number_format($metrics['accident_claims']['amount'], 2) }}
                                    </div>
                                    <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Occupational Disease Claims</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">&#8358;{{ number_format($metrics['disease_claims']['amount'], 2) }}
                                    </div>
                                    <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayCustomers"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Death Claims</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">&#8358;{{ number_format($metrics['death_claims']['amount'], 2) }}
                                    </div>
                                    <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayVisitors"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-6">
                <div class="card card-full">
                    <div class="nk-ecwg nk-ecwg8 h-100">
                        <div class="card-inner">
                            <div class="card-title-group mb-3">
                                <div class="card-title">
                                    <h6 class="title">Payments Statistics</h6>
                                </div>
                            </div>
                            <ul class="nk-ecwg8-legends">
                                <li>
                                    <div class="title">
                                        <span class="dot dot-lg sq" data-bg="#0fac81"></span>
                                        <span>Yearly Contribution</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="nk-ecwg8-ck">
                                <canvas class="ecommerce-line-chart-s4" id="salesStatistics"></canvas>
                            </div>
                            <div class="chart-label-group ps-5">
                                <div class="chart-label">01 Jul, 2020</div>
                                <div class="chart-label">30 Jul, 2023</div>
                            </div>
                        </div><!-- .card-inner -->
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-3 col-md-6">
                <div class="card card-full overflow-hidden">
                    <div class="nk-ecwg nk-ecwg7 h-100">
                        <div class="card-inner flex-grow-1">
                            <div class="card-title-group mb-4">
                                <div class="card-title">
                                    <h6 class="title">Compensation Distribution</h6>
                                </div>
                            </div>
                            <div class="nk-ecwg7-ck">
                                <canvas class="ecommerce-doughnut-s1" id="orderStatistics"></canvas>
                            </div>
                            <ul class="nk-ecwg7-legends">
                                <li>
                                    <div class="title">
                                        <span class="dot dot-lg sq" data-bg="#0fac81"></span>
                                        <span>Accident</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <span class="dot dot-lg sq" data-bg="#816bff"></span>
                                        <span>Occupational Disease</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <span class="dot dot-lg sq" data-bg="#e85347"></span>
                                        <span>Death</span>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- .card-inner -->
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-3 col-md-6">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="card-title-group mb-2">
                            <div class="card-title">
                                <h6 class="title">Claims & Compensation Statistics</h6>
                            </div>
                        </div>
                        <ul class="nk-store-statistics">
                            <li class="item">
                                <div class="info">
                                    <div class="title">Accident Claims</div>
                                    <div class="count">{{ $metrics['accident_claims']['number'] }}</div>
                                </div>
                                <em class="icon bg-primary-dim ni ni-user-add"></em>
                            </li>
                            <li class="item">
                                <div class="info">
                                    <div class="title">Occupation Disease Claims</div>
                                    <div class="count">{{ $metrics['disease_claims']['number'] }}</div>
                                </div>
                                <em class="icon bg-purple-dim ni ni-user-list"></em>
                            </li>
                            <li class="item">
                                <div class="info">
                                    <div class="title">Death Claims</div>
                                    <div class="count">{{ $metrics['death_claims']['number'] }}</div>
                                </div>
                                <em class="icon bg-danger-dim ni ni-user-cross"></em>
                            </li>
                            <li class="item">
                                <div class="info">
                                    <div class="title">Total</div>
                                    <div class="count">
                                        {{ $metrics['accident_claims']['number'] + $metrics['disease_claims']['number'] + $metrics['death_claims']['number'] }}
                                    </div>
                                </div>
                                <em class="icon bg-info-dim ni ni-users"></em>
                            </li>
                        </ul>
                    </div><!-- .card-inner -->
                </div><!-- .card -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .nk-block -->

@endsection


@push('scripts')
    <!-- JavaScript -->
    <script>
        //for doughnut chart
        var claims = [
            {{ $metrics['accident_claims']['number'] }},
            {{ $metrics['disease_claims']['number'] }},
            {{ $metrics['death_claims']['number'] }}
        ];
    </script>
    <script src="./assets/js/charts/chart-ecommerce.js?ver=3.1.3"></script>
@endpush
