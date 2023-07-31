@extends('layouts.app')

@section('title', 'Death Claims')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Occupational Disease Claim Application
                </h3>
                <div class="nk-block-des text-soft">
                    <p>Application for Employee.</p>
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
                <form action="{{ route('disease.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <option value="{{ $employee->id }}">
                                                    {{ $employee->last_name }}
                                                    {{ $employee->first_name }}
                                                    {{ $employee->middle_name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label-outlined" for="outlined-select">Select Employee</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-briefcase"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="nature_of_work" name="nature_of_work" value="{{ old('nature_of_work') }}">
                                        <label class="form-label-outlined" for="nature_of_work">Nature of Work</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-covid"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="nature_of_disease" name="nature_of_disease"
                                            value="{{ old('nature_of_disease') }}">
                                        <label class="form-label-outlined" for="nature_of_disease">Nature of Disease</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-calendar-alt"></em>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-xl form-control-outlined date-picker"
                                            id="date_disease_diagnosed" name="date_disease_diagnosed"
                                            data-date-format="yyyy-mm-dd" value="{{ old('date_disease_diagnosed') }}">
                                        <label class="form-label-outlined" for="date_disease_diagnosed">Date Disease
                                            Diagnosed</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="default-textarea"> Suspected
                                        cause of disease (State the agent(s) present in the work
                                        place and with which he/she had contact that caused the
                                        disease; see list of approved diseases and their
                                        responsible agent(s) as contained in the first schedule
                                        of the ECA for guidance)
                                    </label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" rows="10" id="nature_of_injury" name="nature_of_injury"
                                            placeholder="State the nature of injury sustained (see options attached)">{{ old('nature_of_injury') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="preview-hr">
                        <span class="preview-title-lg overline-title">Duration of exposure
                            details</span>
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-hash"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="exposure_years" name="exposure_years" value="{{ old('exposure_years') }}">
                                        <label class="form-label-outlined" for="exposure_years">Years</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-hash"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="exposure_months" name="exposure_months"
                                            value="{{ old('exposure_months') }}">
                                        <label class="form-label-outlined" for="exposure_months">Months</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-hash"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="exposure_days" name="exposure_days" value="{{ old('exposure_days') }}">
                                        <label class="form-label-outlined" for="exposure_days">Days</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="preview-hr">
                        <span class="preview-title-lg overline-title">Exposure report
                            details</span>
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-calendar-alt"></em>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-xl form-control-outlined date-picker"
                                            data-date-format="yyyy-mm-dd" id="accident_report_date"
                                            name="accident_report_date" value="{{ old('accident_report_date') }}">
                                        <label class="form-label-outlined" for="accident_report_date">Date Employee
                                            Reported
                                            Accident</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <label for=""> Was the accident in the course
                                        of
                                        his/her work? </label>
                                    <ul class="custom-control-group g-3 align-center flex-wrap">
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="course_of_work"
                                                    id="cw_yes" value="Yes">
                                                <label class="custom-control-label" for="cw_yes">Yes</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="course_of_work"
                                                    id="cw_no" value="No">
                                                <label class="custom-control-label" for="cw_no">No</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <label for="">If yes, name his registered
                                        dependant(s) with you: (Attach list if more than one
                                        dependent) </label>
                                </div>
                            </div>
                        </div>

                        <hr class="preview-hr">
                        <span class="preview-title-lg overline-title">Other details</span>
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-user"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="medical_last_name" name="medical_last_name"
                                            value="{{ old('medical_last_name') }}">
                                        <label class="form-label-outlined" for="medical_last_name">Medical Practitioner's Surname Name</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-user"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="medical_first_name" name="medical_first_name"
                                            value="{{ old('medical_first_name') }}">
                                        <label class="form-label-outlined" for="medical_first_name">Medical Practitioner's First Name</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-cc-alt"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="medical_practice_number" name="medical_practice_number"
                                            value="{{ old('medical_practice_number') }}">
                                        <label class="form-label-outlined" for="medical_practice_number">Medical Practitioner's Practice
                                            Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-hash"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="employment_years" name="employment_years"
                                            value="{{ old('employment_years') }}">
                                        <label class="form-label-outlined" for="employment_years">Period in your
                                            employment
                                            (Years)</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-hash"></em>
                                        </div>
                                        <input type="text" class="form-control form-control-xl form-control-outlined"
                                            id="employment_months" name="employment_months"
                                            value="{{ old('employment_months') }}">
                                        <label class="form-label-outlined" for="employment_months">Period in your
                                            employment (Months)</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-06"> Upload
                                        document:
                                        (Pdf only: .pdf) </label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input type="file" multiple class="form-file-input" id="document"
                                                name="document" accept=".pdf">
                                            <label class="form-file-label" for="document">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="form-group">
                                    <label class="form-label" for="former_employers"> Please,
                                        mention the name(s) and address(es) of former employers,
                                        if the employee did not contract the disease in your
                                        employment
                                    </label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" id="former_employers" name="former_employers" rows="7"
                                            placeholder="State the nature of injury sustained (see options attached)">{{ old('former_employers') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="preview-hr">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block"><em
                                            class="icon ni ni-send me-2"></em> Submit</button>
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
