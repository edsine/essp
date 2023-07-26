<div class="nk-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-main is-light">
        <div class="nk-sidebar-inner" data-simplebar>
            <div class="nk-menu-content menu-active" data-content="navHospital">
                <div class="brand-logo pb-2 text-center">
                    <a href="{{url('/home')}}" class="logo-link">
                        <img class="logo-light logo-img logo-img-lg"
                            style="width: 100px !important;height: 100px !important;max-height: 100px !important;"
                            src="{{ asset('assets/images/logo.png') }}" srcset="{{ asset('assets/images/logo.png') }}"
                            alt="logo">
                        <img class="logo-dark logo-img logo-img-lg"
                            style="width: 100px !important;height: 100px !important;max-height: 100px !important;"
                            src="{{ asset('assets/images/logo.png') }}" srcset="{{ asset('assets/images/logo.png') }}"
                            alt="logo-dark">
                    </a>
                </div>
                <h5 class="title">Employee Self Service Portal</h5>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="/home" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Employees</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('employee.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Employees
                                        List</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('employee.create') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Add
                                        Employee</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('employee.createbulk') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Add Bulk
                                        Employees</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('payment.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                            <span class="nk-menu-text">Payments</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{ route('certificate.index') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-award"></em></span>
                            <span class="nk-menu-text">Certificates</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-sign-kobo"></em></span>
                            <span class="nk-menu-text">Claims and Compensation</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{ route('death.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Death
                                        Claims</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('accident.index') }}" class="nk-menu-link"><span
                                        class="nk-menu-text">Accident
                                        Claims</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('disease.index')}}" class="nk-menu-link"><span class="nk-menu-text">Occupations
                                        Disease Claims</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div>
        </div>
    </div>
</div>
