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
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">ECS Payment</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="form-group">
                                        @if (!$pending_payment)
                                            <label for="">Payment due is:
                                                <strong>&#8358;{{ number_format($payment_due, 2) }}</strong></label>
                                            <div class="form-group">
                                                <form method="POST" action="{{ route('payment.remita') }}">
                                                    @csrf
                                                    <input type="hidden" name="payment_type" id="payment_type"
                                                        value="4">
                                                    <input type="hidden" name="employee" id="employee"
                                                        value="{{ $employees_count }}">
                                                    <input type="hidden" name="amount" id="amount"
                                                        value="{{ $payment_due }}">
                                                    <button type="submit" class="btn btn-secondary btn-lg mt-2"><em
                                                            class="icon ni ni-save me-2"></em> Generate Invoice (Remita
                                                        RR)</button>
                                                </form>
                                            </div>
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
                                                                    class="fw-bold">{{ date('Y', strtotime($pending_payment->paid_at)) }}</span>
                                                                of <span
                                                                    class="fw-bold">{{ $pending_payment->employees }}</span>
                                                                Employees with the amount <span
                                                                    class="fw-bold">&#8358;{{ number_format($pending_payment->amount, 2) }}</span>
                                                                has been PAID!</label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
                                    <h6 class="title">2023 Payments</h6>
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
@endpush
