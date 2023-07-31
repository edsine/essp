@extends('layouts.app')

@section('title', 'Death Claims')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Death Claim Application</h3>
                <div class="nk-block-des text-soft">
                    <p>Application for dead Employee.</p>
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
                        <span class="preview-title-lg overline-title">Employee Details</span>
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" data-ui="xl" id="employee_id"
                                        data-search="on" name="employee_id">
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->last_name }}
                                                    {{ $employee->first_name }} {{ $employee->middle_name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label-outlined" for="outlined-select">Select Employee</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-money"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="last_salary" name="last_salary" value="{{old('last_salary')}}">
                                        <label class="form-label-outlined" for="last_salary">Last Salary</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-sign-kobo"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="monthly_contribution" name="monthly_contribution" value="{{old('monthly_contribution')}}">
                                        <label class="form-label-outlined" for="monthly_contribution">Monthly
                                            Contribution</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-calendar-alt"></em>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-xl form-control-outlined date-picker"
                                            id="incident_date" name="incident_date" value="{{old('incident_date')}}" data-date-format="yyyy-mm-dd">
                                        <label class="form-label-outlined" for="incident_date">Incident Date</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-clock"></em>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-xl form-control-outlined time-picker"
                                            id="incident_time" name="incident_time" value="{{old('incident_time')}}">
                                        <label class="form-label-outlined" for="incident_time">Incident Time</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 col-sm-12">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" rows="2" id="incident_description" name="incident_description"
                                            placeholder="Incident Description">{{old('incident_description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12">
                                <hr class="preview-hr">
                                <span class="preview-title-lg overline-title">Employer Bank
                                    Details</span>
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-user"></em>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="employer_account_name" name="employer_account_name" value="{{old('employer_account_name')}}">
                                                <label class="form-label-outlined" for="employer_account_name">Account
                                                    Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-cc-alt"></em>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="employer_account_number" name="employer_account_number" value="{{old('employer_account_number')}}">
                                                <label class="form-label-outlined" for="employer_account_number">Account
                                                    Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-building"></em>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="employer_bank_name" name="employer_bank_name" value="{{old('employer_bank_name')}}">
                                                <label class="form-label-outlined" for="employer_bank_name">Bank
                                                    Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-hash"></em>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="employer_sort_code" name="employer_sort_code" value="{{old('employer_sort_code')}}">
                                                <label class="form-label-outlined" for="employer_sort_code">Sort
                                                    Code</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <hr class="preview-hr">
                                <span class="preview-title-lg overline-title">Employee Bank
                                    Details</span>
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-user"></em>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="employee_account_name" name="employee_account_name" value="{{old('employee_account_name')}}">
                                                <label class="form-label-outlined" for="employee_account_name">Account
                                                    Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-cc-alt"></em>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="employee_account_number" name="employee_account_number" value="{{old('employee_account_number')}}">
                                                <label class="form-label-outlined" for="employee_account_number">Account
                                                    Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-building"></em>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="employee_bank_name" name="employee_bank_name" value="{{old('employee_bank_name')}}">
                                                <label class="form-label-outlined" for="employee_bank_name">Bank
                                                    Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-hash"></em>
                                                </div>
                                                <input type="text"
                                                    class="form-control form-control-xl form-control-outlined"
                                                    id="employee_sort_code" name="employee_sort_code" value="{{old('employee_sort_code')}}">
                                                <label class="form-label-outlined" for="employee_sort_code">Sort
                                                    Code</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <hr class="preview-hr">
                                <span class="preview-title-lg overline-title">Required Documents</span>
                                <div class="row gy-4">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">Upload file (Pdf only: .pdf)
                                            </label>
                                            <div class="form-control-wrap">
                                                <div class="form-file">
                                                    <input type="file" multiple class="form-file-input" id="document"
                                                        name="document">
                                                    <label class="form-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Scan and organise the follwing document
                                                as listed below in PDF format</label>
                                            <span class="list text-muted">
                                                <ol>
                                                    <li>Employee Letter</li>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <li>CCF 01</li>
                                                        </div>
                                                        <div class="col-6">
                                                            <li>CCF 02</li>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <li>CCF 03</li>
                                                        </div>
                                                        <div class="col-6">
                                                            <li>CCF 04</li>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <li>CCF 05</li>
                                                        </div>
                                                        <div class="col-6">
                                                            <li>CCF 06</li>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <li>MR 01</li>
                                                        </div>
                                                        <div class="col-6">
                                                            <li>Police Report</li>
                                                        </div>
                                                    </div>

                                                    <li>Health Care Bills / Receipts / Invoices</li>
                                                </ol>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr class="preview-hr">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block"><em
                                            class="icon ni ni-send me-2"></em> Submit Death Claim</button>
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
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
