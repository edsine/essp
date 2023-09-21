@extends('layouts.app')

@section('title', 'Employers')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Upload Bulk Employers</h3>
                {{-- <div class="nk-block-des text-soft">
                    <p>List of registered Employers.</p>
                </div> --}}
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="preview-block">
                    <div class="row gy-4">
                        <div class="col-lg-6 col-sm-6">
                            <form action="{{ route('employer.uploadbulk') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="default-06">Select bulk
                                        Employee file (Excel only: .xls, .xlsx) <a
                                            href="{{ Storage::url('employers.xlsx') }}">Download bulk Employee
                                            template</a></label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input type="file" multiple class="form-file-input" id="excel"
                                                name="excel" accept=".xlsx, .xls">
                                            <label class="form-file-label" for="excel">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary"><em
                                            class="icon ni ni-upload-cloud me-2"></em> Upload Employers</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .card-preview -->
        {{-- <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Date of Birth</th>
                            <th>Phone</th>
                            <th>Alternate Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>LGA</th>
                            <th>Mode of Identity</th>
                            <th>Identity Number</th>
                            <th>Issue Date</th>
                            <th>Work ID</th>
                            <th>Employment Date</th>
                            <th>Job Title</th>
                            <th>Monthly Remuneration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <hr class="preview-hr">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary"><em class="icon ni ni-save me-2"></em>
                                Save Bulk Employees</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}


@endsection

{{-- @push('scripts')
    <!-- JavaScript -->
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>
@endpush --}}
