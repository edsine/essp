@extends('layouts.app')

@section('title', 'Employee')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Edit Employee</h3>
                <div class="nk-block-des text-soft">
                    <p>Edit Employee details</p>
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
                                            <li><a href="{{ route('employee.createbulk') }}"><em
                                                        class="icon ni ni-upload-cloud"></em><span>Upload
                                                        Bulk Employees</span></a></li>
                                            <li><a href="{{ Storage::url('employees.xlsx') }}"><em
                                                        class="icon ni ni-download-cloud"></em><span>Bulk
                                                        Employee Template</span></a></li>
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
                <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('employees.form')
                </form>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            function isInt(value) {
  return !isNaN(value) && (function(x) { return (x | 0) === x; })(parseFloat(value))
}

            let lga = '{{ $employee->local_govt_area ?? '' }}';
            lga = isInt(lga) ? lga : 1;
            //FETCH LGAs FROM STATE ID
            const lUrl = "{{ route('employer.lgas') }}?state=";
            $('#state_of_origin').change(function() {
                $.ajax({
                    url: lUrl + $(this).val(),
                    type: "GET",
                    data: null,
                    dataType: 'json',
                }).done(function(response) {
                    $('#local_govt_area').empty();
                    var lgas = '';
                    $.each(response.data, function(a, b) {
                        lgas += '<option value="' + b.id + '" '+(lga==b.id? 'selected':'')+'>' + b.name + '</option>';
                    });
                    $('#local_govt_area').html(lgas);
                });
            });

            $('#state_of_origin').trigger('change');
        });
    </script>
@endpush
