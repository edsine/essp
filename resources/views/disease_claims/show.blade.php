@extends('layouts.app')

@section('title', 'Disease Claims')


@push('styles')
@endpush


@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>
                    Death Claims Details
                </h3>
            </div>
            <div class="col-sm-6">
                {{-- <a class="btn btn-default float-right" href="{{ url('claim/death/') }}">
                    Back
                </a> --}}
            </div>
        </div>
    </div>
</section>

<div class="content">
<div class="row">
<div class="col-md-12" style="margin-bottom: 30px;">
    <table class="table">
        <tr>
            <th>Employer Name</th>
            <td>{{ $incident->employer->contact_firstname.' '.$incident->employer->contact_surname }}</td>
        </tr>
        <tr>
            <th>Employee Name</th>
            <td>{{ $incident->employee->first_name.' '.$incident->employee->last_name }}</td>
        </tr>
        <tr>
            <th>Network Of Work</th>
            <td>{{ $incident->nature_of_work }}</td>
        </tr>
        <tr>
            <th>Nature Of Disease</th>
            <td>{{ $incident->nature_of_disease }}</td>
        </tr>
        <tr>
            <th>Diagnosed Date </th>
            <td>{{ $incident->date_disease_diagnosed }}</td>
        </tr>
        <tr>
            <th>Nature Of Injury</th>
            <td>{{ $incident->nature_of_injury }}</td>
        </tr>
        <tr>
            <th>Exposure Years</th>
            <td>{{ $incident->exposure_years }}</td>
        </tr>
        <tr>
            <th>Exposure Months</th>
            <td>{{ $incident->exposure_months }}</td>
        </tr>
        <tr>
            <th>Exposure Days</th>
            <td>{{ $incident->exposure_days }}</td>
        </tr>
        <tr>
            <th>Accident Report Date</th>
            <td>{{ $incident->accident_report_date }}</td>
        </tr>
        <tr>
            <th>Course Of Work</th>
            <td>{{ $incident->course_of_work }}</td>
        </tr>
        <tr>
            <th>Employment Years</th>
            <td>{{ $incident->employment_years }}</td>
        </tr>
        <tr>
            <th>Employment Months</th>
            <td>{{ $incident->employment_months }}</td>
        </tr>
        <tr>
            <th>Former Employers</th>
            <td>{{ $incident->former_employers }}</td>
        </tr>
        <tr>
            <th>Medical First Name</th>
            <td>{{ $incident->medical_first_name }}</td>
        </tr>
        <tr>
            <th>Medical Last Name</th>
            <td>{{ $incident->medical_last_name }}</td>
        </tr>
        <tr>
            <th>Medical Practice Number</th>
            <td>{{ $incident->medical_practice_number }}</td>
        </tr>
        {{-- <tr>
            <th>Branch Name</th>
            <td>{{ $incident->branch->branch_name }}</td>
        </tr> --}}
        {{-- <tr>
            <th>Status</th>
            <td>{{ $incident->status }}</td>
        </tr> --}}
        @if ($incident->document)
        <tr>
            <th>Document</th>
            <td><a href="{{ 'storage/'.$incident->document }}" target="_blank" class="text-dark">Open PDF Document</a>
            </td>
        </tr>
        @endif
        <tr>
            <th>Created At</th>
            <td>{{ $incident->created_at }}</td>
        </tr>
    </table>
</div>
</div>
</div>

@endsection