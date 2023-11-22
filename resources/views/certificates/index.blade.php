@extends('layouts.app')

@section('title', 'Certificates')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Certificates</h3>
                <div class="nk-block-des text-soft">
                    <p>List of requested Certificates.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                            class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            {{-- <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em
                                        class="icon ni ni-award"></em><span>Request New
                                        Certificate</span></a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h6 class="title">Certificate Request</h6>
                    </div>
                </div>
                <div class="preview-block mt-3">
                    <div class="row gy-4">
                        @if ($certificates->count() < 1 || $pending->payment_status == 1)
                            <div class="col-lg-6 col-sm-6 w-75">

                                @if (count($certificate_years) > 0)
                                    <form action="{{ route('certificate.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="application_letter">Upload your application
                                                letter
                                                below
                                            </label>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="application_year">Application Year</label>
                                                        <select name="application_year" id="application_year"
                                                            class="form-select">
                                                            @foreach ($certificate_years as $year)
                                                                <option @selected($year == date('Y'))>{{ $year }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <input type="hidden" name="payment_fee" id="payment_fee"
                                                        value="50000">
                                                    <input type="hidden" name="branch_id" id="branch_id"
                                                        value="{{ auth()->user()->branch_id }}">

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-primary"><em
                                                                class="icon ni ni-upload-cloud me-2"></em> Upload
                                                            Certificate</button>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="application_letter">Upload Application Letter</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file" multiple class="form-file-input"
                                                                    name="application_letter" id="application_letter">
                                                                <label class="form-file-label"
                                                                    for="application_letter">Choose
                                                                    file</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <p>
                                                        <b>Note:</b> This application will cost you: <span
                                                            class="fs-3">&#8358;50,000</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    {{--  --}}
                                    @php
                                        $payments = auth()
                                            ->user()
                                            ->payments()
                                            ->where('payment_type', 4)
                                            ->where('payment_status', 1)
                                            ->selectRaw('SUM(contribution_months) AS contribution_months, contribution_period')
                                            ->groupBy(['contribution_year', 'contribution_period'])
                                            ->count();
                                    @endphp

                                    @if ($payments > 0)
                                        <div class="form-group">
                                            <label for="" class="">You do not have any outstanding
                                                certificates to generate.</label>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="" class="">You have not made any ECS
                                                Payments.</label>
                                                <br/>
                                                <a class="btn btn-primary me-n1" href="{{route('payment.index')}}">Make ECS Payments</a>
                                        </div>
                                    @endif
                                @endif

                            </div>
                        @else
                            @if ($pending && $pending->payment == null)
                                <div class="col-lg-6 col-sm-6">
                                    <form action="{{ route('payment.remita') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for=""> You can now make payment of
                                                <strong>&#8358;{{ number_format($amount, 2) }}</strong> for certificate
                                                processing.
                                            </label>
                                            <div class="form-group">
                                                <form method="POST" action="{{ route('payment.remita') }}">
                                                    @csrf
                                                    <input type="hidden" name="payment_type" id="payment_type"
                                                        value="2">
                                                    <input type="hidden" name="amount" id="amount"
                                                        value="{{ $amount }}">
                                                    <input type="hidden" name="certificate_id" id="certificate_id"
                                                        value="{{ $pending->id }}">
                                                    <button type="submit" class="btn btn-secondary btn-lg mt-2"><em
                                                            class="icon ni ni-save me-2"></em> Generate Invoice (Remita
                                                        RR)</button>
                                                </form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group mt-2">
                                        <div class="row">
                                            <div class="col-6 fw-bold">RRR:</div>
                                            <div class="col-6">{{ $pending->payment->rrr }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 fw-bold">Invoice:</div>
                                            <div class="col-6">{{ $pending->payment->invoice_number }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 fw-bold">Amount:</div>
                                            <div class="col-6">
                                                &#8358;{{ number_format($pending->payment->amount, 2) }}</div>
                                        </div>
                                        <div>
                                            <form onsubmit="makePayment()" id="payment-form">
                                                <input type="hidden" class="form-control" id="js-rrr" name="rrr"
                                                    value="{{ $pending->payment->rrr }}" placeholder="Enter RRR" />
                                                <button type="button" onclick="makePayment()"
                                                    class="btn btn-primary btn-lg mt-2"><em
                                                        class="icon ni ni-send me-2"></em> Click to pay online
                                                    now!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- .card-preview -->
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Processing Status</th>
                            <th>Download Certificate</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>&#8358;{{ number_format($certificate->payment_fee, 2) }}</td>
                                <td><span
                                        class="tb-status text-{{ $certificate->payment_status == 0 ? 'warning' : 'success' }}">{{ $certificate->payment_status == 0 ? 'NOT PAID' : 'PAID' }}</span>
                                </td>
                                <td><span
                                        class="tb-status text-{{ $certificate->processing_status == 0 ? 'warning' : 'success' }}">{{ $certificate->processing_status == 0 ? 'PENDING' : 'DONE' }}</span>
                                </td>
                                <td> @if ($certificate->processing_status == 1)
                                    <a href="{{ route('certificate.details', ['certificateId' => $certificate->id]) }}">View Certificate Details</a> 
                                @endif
                                    
                                </td>
                                <td>
                                    <a href=""><span class="nk-menu-icon text-info"><em
                                                class="icon ni ni-eye"></em></span></a>
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
                        value: 2
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
