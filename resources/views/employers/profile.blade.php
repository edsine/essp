@extends('layouts.app')

@section('title', 'Profile')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Employer Profile</h3>
                <div class="nk-block-des text-soft">
                    <p>Details of Employer.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                            class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <form action="{{ route('death.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="preview-block">
                        <span class="preview-title-lg overline-title">Employer Details</span>
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Company Name</label>
                                        <span class="form-control">{{ auth()->user()->company_name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Business Area</label>
                                        <span class="form-control">{{ auth()->user()->business_area }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Registration Status</label>
                                        <span class="form-control">{{ auth()->user()->paid_registration == 1 ? 'PAID' : 'UNPAID' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Company RC NUMBER</label>
                                        <span class="form-control">{{ auth()->user()->company_rcnumber }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">CAC Registration Year</label>
                                        <span class="form-control">{{ auth()->user()->cac_reg_year }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">ECS Number</label>
                                        <span class="form-control">{{ auth()->user()->ecs_number }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Company Email</label>
                                        <span class="form-control">{{ auth()->user()->company_email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Company Phone</label>
                                        <span class="form-control">{{ auth()->user()->company_phone }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Company Branch</label>
                                        <span class="form-control">{{ auth()->user()->branch_id }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Company Address</label>
                                        <span class="form-control">{{ auth()->user()->company_address }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Company State</label>
                                        <span class="form-control">{{ auth()->user()->state->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Company LGA</label>
                                        <span class="form-control">{{ auth()->user()->lga->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="preview-hr">

                        <span class="preview-title-lg overline-title">Contact Details</span>
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Last Name</label>
                                        <span class="form-control">{{ auth()->user()->contact_surname }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">First Name</label>
                                        <span class="form-control">{{ auth()->user()->contact_firstname }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Middle Name</label>
                                        <span class="form-control">{{ auth()->user()->contact_middlename }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Position</label>
                                        <span class="form-control">{{ auth()->user()->contact_position }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <label class="form-label">Identity Number</label>
                                        <span class="form-control">{{ auth()->user()->contact_number }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
