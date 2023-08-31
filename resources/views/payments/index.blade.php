@extends('layouts.app')

@section('title', 'Payments')


@push('styles')
@endpush


@section('content')
    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Payments</h3>
                <div class="nk-block-des text-soft">
                    <p>List of Payments.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                            class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            {{-- <li class="nk-block-tools-opt">
                                <a href="#" class="btn btn-primary">
                                    <em class="icon ni ni-money"></em>
                                    <span>Make ECS Payment</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->

    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="col-xxl-6 col-sm-12">
                <div class="card h-100">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            @if (auth()->user()->employees->count() > 0)
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">ECS Payment</h6>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="data-group">
                                        <div class="form-group w-100">
                                            @if (!$pending_payment || $paid_months != 0)
                                                {{-- <div class="form-group"> --}}
                                                <form method="POST" action="{{ route('payment.remita') }}">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="year">Payment year:</label>
                                                            <select name="year" id="year" class="form-select">
                                                                <option @selected(date('Y') == $start_year)>{{ $start_year }}
                                                                </option>
                                                                {{-- @if (date('Y') > $start_year)
                                                                    @for ($i = $start_year + 1; $i <= date('Y'); $i++)
                                                                        <option @selected(date('Y') == $i)>
                                                                            {{ $i }}</option>
                                                                    @endfor
                                                                @endif --}}
                                                            </select>

                                                            <label for="contribution_period">Contribution Period:</label>
                                                            <select name="contribution_period" id="contribution_period"
                                                                class="form-select">
                                                                @if ($paid_months == 0)
                                                                    <option>Annually</option>
                                                                @endif
                                                                <option>Monthly</option>
                                                            </select>

                                                            <div id="nom_div" class="d-none">
                                                                <label for="number_of_months">Number of months</label>
                                                                <select name="number_of_months" id="number_of_months"
                                                                    class="form-select">
                                                                    @for ($i = 1; $i <= 12-$paid_months; $i++)
                                                                        <option>{{ $i }}</option>
                                                                    @endfor
                                                                </select>
                                                            </div>

                                                            <button type="submit" class="btn btn-secondary btn-lg mt-2"><em
                                                                    class="icon ni ni-save me-2"></em> Generate Invoice
                                                                (Remita
                                                                RR)</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="">Payment due is:</label><br />
                                                            <p>
                                                                <strong class="fs-3"
                                                                    id="contribution_amount">&#8358;{{ number_format($payment_due, 2) }}</strong>
                                                            </p>

                                                            <input type="hidden" name="payment_type" id="payment_type"
                                                                value="4">
                                                            <input type="hidden" name="employees" id="employees"
                                                                value="{{ $employees_count }}">
                                                            <input type="hidden" name="amount" id="amount"
                                                                value="{{ $payment_due }}">

                                                            <label for=""><b>Note: </b>Only one contribution type
                                                                can be
                                                                used for a selected year.</label>
                                                        </div>
                                                    </div>

                                                </form>
                                                {{--  </div> --}}
                                            @elseif($pending_payment->payment_status == 0)
                                                <div class="form-group mt-2">
                                                    <div class="row">
                                                        <div class="col-6 fw-bold">RRR:</div>
                                                        <div class="col-6">{{ $pending_payment->rrr }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 fw-bold">Invoice:</div>
                                                        <div class="col-6">{{ $pending_payment->invoice_number }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 fw-bold">Amount:</div>
                                                        <div class="col-6">
                                                            &#8358;{{ number_format($pending_payment->amount, 2) }}</div>
                                                    </div>
                                                    <div>
                                                        <form onsubmit="makePayment()" id="payment-form">
                                                            <input type="hidden" class="form-control" id="js-rrr"
                                                                name="rrr" value="{{ $pending_payment->rrr }}"
                                                                placeholder="Enter RRR" />
                                                            <button type="button" onclick="makePayment()"
                                                                class="btn btn-primary btn-lg mt-2"><em
                                                                    class="icon ni ni-send me-2"></em> Click to pay online
                                                                now!</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-12 my-2">
                                                            <p>
                                                                <label for="">Your ECS Payment for the year <span
                                                                        {{-- class="fw-bold">{{ date('Y', strtotime($pending_payment->paid_at)) }}</span> --}}
                                                                        class="fw-bold">{{ $pending_payment->contribution_year }}</span>
                                                                    of <span
                                                                        class="fw-bold">{{ $pending_payment->employees }}</span>
                                                                    Employees with the amount <span
                                                                        class="fw-bold">&#8358;{{ number_format(\App\Models\Payment::where('payment_type', 4)
                                                                        ->whereRaw('contribution_year = ' . $pending_payment->contribution_year)
                                                                        ->sum('amount'), 2) }}</span>
                                                                    has been PAID!</label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Notice!</h6>
                                    </div>
                                </div>
                                <div class="data">
                                    <div class="data-group">
                                        <div class="form-group">
                                            <label for="">You have not added any employees!</label>
                                            <div class="form-group">
                                                <div class="toggle-wrap nk-block-tools-toggle">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                    <div class="toggle-expand-content" data-content="pageMenu">
                                                        <ul class="nk-block-tools g-3">
                                                            <li>
                                                                <div class="dropdown">
                                                                    <a href="#" class="btn btn-primary"
                                                                        data-bs-toggle="dropdown"><em
                                                                            class="icon ni ni-user-add"></em> <span>Add New
                                                                            Employee(s)</span></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="/employee/create"><em
                                                                                        class="icon ni ni-file-plus"></em><span>Add
                                                                                        New
                                                                                        Employee</span></a></li>
                                                                            <li><a
                                                                                    href="{{ route('employee.createbulk') }}"><em
                                                                                        class="icon ni ni-upload-cloud"></em><span>Upload
                                                                                        Bulk
                                                                                        Employees</span></a></li>
                                                                            <li><a
                                                                                    href="{{ Storage::url('employees.xlsx') }}"><em
                                                                                        class="icon ni ni-download-cloud"></em><span>Bulk
                                                                                        Employee
                                                                                        Template</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Employees</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">{{ $employees_count }}</div>
                                    <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Payments</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount">&#8358;{{ number_format($year_total_payment, 2) }}</div>
                                    <div class="nk-ecwg6-ck">
                                        <canvas class="ecommerce-line-chart-s3" id="todayRevenue"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
        </div><!-- .row -->

        @include('partials.payments-table')

    </div> <!-- nk-block -->

    {{-- </div><!-- .components-preview --> --}}
@endsection


@push('scripts')
    <!-- JavaScript -->
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>

    <script type="text/javascript" src="https://remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>
    <script>
        var cUrl = "{{ route('payment.callback') }}?";
        var pubKey = "{{ env('REMITA_PUBLIC_KEY') }}";

        function makePayment() {
            var form = document.querySelector("#payment-form");
            var paymentEngine = RmPaymentEngine.init({
                key: pubKey,
                processRrr: true,
                transactionId: Math.floor(Math.random() * 1101233),
                // Replace with a reference you generated or remove the entire field for us to auto-generate a reference for you. Note that you will be able to check the status of this transaction using this transaction Id
                extendedData: {
                    customFields: [{
                        name: "rrr",
                        value: form.querySelector('input[name="rrr"]').value
                    }, {
                        name: "payment_type",
                        value: 4
                    }]
                },
                onSuccess: function(response) {
                    console.log('callback Successful Response', response);
                    window.location.href = cUrl + 'ref=' + form.querySelector('input[name="rrr"]').value +
                        '&tid=' + response.transactionId;
                },
                onError: function(response) {
                    console.log('callback Error Response', response);
                },
                onClose: function() {
                    console.log("closed");
                }
            });
            paymentEngine.showPaymentWidget();
        }
        /* window.onload = function() {
            //setDemoData();
        }; */
    </script>

    <script>
        $(document).ready(function() {
            const annual_pay = {{ $payment_due }};
            const month_pay = annual_pay / 12;
            console.log(month_pay);
            $('#contribution_period, #number_of_months').change(function() {
                if ($('#contribution_period').val() == 'Monthly') {
                    $('#nom_div').removeClass('d-none');
                    //if its the last month
                    //((100000 - ((100000/12).toFixed(2)*11)).toFixed(2) ++++ ((100000/12).toFixed(2)*11))
                    //left of++++ is 12th month; right is sum of other months
                    const current_due = (month_pay * $('#number_of_months').val()).toLocaleString(
                        undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                    $('#contribution_amount').html('&#8358;' + current_due);
                    $('#amount').val(current_due.replace(',', ''));
                } else {
                    $('#nom_div').addClass('d-none');
                    $('#contribution_amount').html('&#8358;' + annual_pay.toLocaleString(
                        undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }));
                    $('#amount').val(annual_pay);
                }
            });
            $('#contribution_period').trigger('change');
        });
    </script>
@endpush
