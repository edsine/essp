@extends('layouts.app')

@section('title', 'Accident Claims')


@push('styles')
@endpush


@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>
                    Accident Claims Details
                </h3>
            </div>
            <div class="col-sm-6">
                {{-- <a class="btn btn-default float-right" href="{{ url('claim/accident/') }}">
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
            <th>Accident Date</th>
            <td>{{ $incident->accident_date }}</td>
        </tr>
        <tr>
            <th>Accident Time</th>
            <td>{{ $incident->accident_time }}</td>
        </tr>
        <tr>
            <th>Accident Town</th>
            <td>{{ $incident->accident_town }}</td>
        </tr>
        <tr>
            <th>Employee Earning</th>
            <td>{{ $incident->employee_earning }}</td>
        </tr>
        <tr>
            <th>Employee Task</th>
            <td>{{ $incident->employee_task }}</td>
        </tr>
        <tr>
            <th>Nature Of Injury</th>
            <td>{{ $incident->nature_of_injury }}</td>
        </tr>
        <tr>
            <th>Course Of Work</th>
            <td>{{ $incident->course_of_work }}</td>
        </tr>
        <tr>
            <th>First Aid Given</th>
            <td>{{ $incident->first_aid_given }}</td>
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