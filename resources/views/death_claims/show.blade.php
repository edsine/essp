@extends('layouts.app')

@section('title', 'Death Claims')


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
            <th>Last Salary</th>
            <td>{{ $incident->last_salary }}</td>
        </tr>
        <tr>
            <th>Monthly Contribution</th>
            <td>{{ $incident->monthly_contribution }}</td>
        </tr>
        <tr>
            <th>Incident Description</th>
            <td>{{ $incident->incident_description }}</td>
        </tr>
        <tr>
            <th>Incident Date</th>
            <td>{{ $incident->incident_date }}</td>
        </tr>
        <tr>
            <th>Incident Time</th>
            <td>{{ $incident->incident_time }}</td>
        </tr>
        <tr>
            <th>Employer Account Name</th>
            <td>{{ $incident->employer_account_name }}</td>
        </tr>
        <tr>
            <th>Employer Account Number</th>
            <td>{{ $incident->employer_account_number }}</td>
        </tr>
        <tr>
            <th>Employer Bank Name</th>
            <td>{{ $incident->employer_bank_name }}</td>
        </tr>
        <tr>
            <th>Employer Sort Code</th>
            <td>{{ $incident->employer_sort_code }}</td>
        </tr>
        <tr>
            <th>Employee Account Name</th>
            <td>{{ $incident->employee_account_name }}</td>
        </tr>
        <tr>
            <th>Employee Account Number</th>
            <td>{{ $incident->employee_account_number }}</td>
        </tr>
        <tr>
            <th>Employee Bank Name</th>
            <td>{{ $incident->employee_bank_name }}</td>
        </tr>
        <tr>
            <th>Employee Sort Code</th>
            <td>{{ $incident->employee_sort_code }}</td>
        </tr>
       {{--  <tr>
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