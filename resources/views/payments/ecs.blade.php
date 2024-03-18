<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">ECS Registration</h3>
            <div class="nk-block-des text-soft">
                <p>Make payment to complete your registration and unlock Employer Dashboard.</p>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->

<div class="nk-block nk-block-lg">
    <div class="row g-gs">
        <div class="col-xxl-6 col-sm-12">
            <div class="card">
                <div class="nk-ecwg nk-ecwg6">
                    <div class="card-inner">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title"> Welcome to NSITF Employer Self Service Dashboard </h6>
                            </div>
                        </div>
                        <div class="data">
                            <div class="data-group">
                                <div class="form-group">
                                    <label for="">Complete &#8358;20,000 registration fee payment</label>
                                    @php
                                        //Check if there is a registration payment
                                        $pending = auth()
                                            ->user()
                                            ->payments()
                                            ->first();
                                    @endphp

                                    @if ($pending && $pending->payment_status == 0)
                                        {{-- IF NO RRR IS GENERATED --}}
                                        <div class="form-group mt-2">
                                            <div class="row">
                                                <div class="col-6 fw-bold">RRR:</div>
                                                <div class="col-6">{{ $pending->rrr }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 fw-bold">Invoice:</div>
                                                <div class="col-6">{{ $pending->invoice_number }}</div>
                                            </div>
                                            <div>
                                                <form onsubmit="makePayment()" id="payment-form">
                                                    <input type="hidden" class="form-control" id="js-rrr"
                                                        name="rrr" value="{{ $pending->rrr }}"
                                                        placeholder="Enter RRR" />
                                                    <button type="button" onclick="makePayment()"
                                                        class="btn btn-primary btn-lg mt-2"><em
                                                            class="icon ni ni-send me-2"></em> Click to pay online
                                                        now!</button>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        {{-- WHEN RRR HAS BEEN GENERATED --}}
                                        <div class="form-group">
                                            <form method="POST" action="{{ route('payment.remita') }}">
                                                @csrf
                                                <input type="hidden" name="payment_type" id="payment_type"
                                                    value="1">
                                                <input type="hidden" name="amount" id="amount" value="20000">
                                                <button type="submit" class="btn btn-secondary btn-lg mt-2"><em
                                                        class="icon ni ni-save me-2"></em> Generate Invoice (Remita
                                                    RR)</button>
                                            </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .card-inner -->
        </div><!-- .nk-ecwg -->
    </div><!-- .card -->
</div><!-- .col -->
</div><!-- .row -->

@php
    $payments = auth()
        ->user()
        ->payments()
        ->get();
@endphp

@include('partials.payments-table')

</div> <!-- nk-block -->

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
                    value: 1
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
