@extends('layouts.app')

@section('title', 'Employees')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Employees</h3>
                <div class="nk-block-des text-soft">
                    <p>List of registered Employees.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                            class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-primary" data-bs-toggle="dropdown"><em
                                            class="icon ni ni-user-add"></em> <span>Add New Employee(s)</span></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="/employee/create"><em class="icon ni ni-file-plus"></em><span>Add
                                                        New
                                                        Employee</span></a></li>
                                            <li><a href="{{ route('employee.createbulk') }}"><em
                                                        class="icon ni ni-upload-cloud"></em><span>Upload Bulk
                                                        Employees</span></a></li>
                                            <li><a href="{{ Storage::url('employees.xlsx') }}"><em
                                                        class="icon ni ni-download-cloud"></em><span>Bulk Employee
                                                        Template</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Contact Phone</th>
                            <th>Job Title</th>
                            <th>Monthly Remuneration</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->last_name }} {{ $employee->first_name }} {{ $employee->middle_name }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>{{ $employee->job_title ?? '' }}</td>
                                <td>&#8358;{{ number_format($employee->monthly_remuneration) }}</td>
                                <td><span
                                        class="tb-status text-{{ $employee->status == 1 ? 'success' : 'danger' }}">{{ $employee->status == 1 ? 'ACTIVE' : 'NOT ACTIVE' }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('employee.edit', $employee->id) }}" title="Edit Employee"><span
                                            class="nk-menu-icon text-info"><em class="icon ni ni-edit"></em></span></a>
                                    {{-- <a data-id="{{ $employee->id }}"><span class="nk-menu-icon text-danger eg-swal-av3"><em
                                                class="icon ni ni-trash"></em></span>
                                            </a> --}}

                                    <a id="delete-employee" title="Terminate Employee" style="cursor: pointer;"
                                        onclick="event.preventDefault();
                                    document.getElementById('delete-employee-form').submit();"><span
                                            class="nk-menu-icon text-danger eg-swal-av3"><em
                                                class="icon ni ni-user-remove"></em></span>
                                    </a>
                                    <form id="delete-employee-form" action="{{ route('employee.destroy', $employee->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button onclick="return false" id="delete-employee"
                                            class="btn btn-danger">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#delete-employee').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure ?',
                    text: "You won't be able to revert this !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //redirect to database
                    if (result.isConfirmed) {
                        $('#delete-employee-form').submit();
                    }
                    //handle through ajax
                    /* if (result.value) {
                        Swal.fire('Deleted!', 'Your selected item has been deleted.', 'success');
                    } */
                })
            });
        });
    </script>
    <!-- JavaScript -->
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>
@endpush
