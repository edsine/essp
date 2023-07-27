<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="PGL - Ben Onabe">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Nigerian Social Insurance Trust Fund (NSITF), Employer Self Service Portal (ESSP).">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('assets/images/NSITF-logo.png') }}">
    <!-- Page Title  -->
    <title>Invoice | {{ env('APP_NAME') }}</title>
    <!-- StyleSheets  -->
    @if ($pid ?? '')
        @include('payments.style1')
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.3') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.3') }}">
    @endif
</head>


@if ($pid ?? '')
    @php
        $payment = App\Models\Payment::find($pid);
    @endphp

    <body class="bg-white" onload="printPromot()">
    @else

        <body class="bg-white" onload="printPromot()">
@endif


<div class="nk-block">
    <div class="invoice invoice-print">
        <div class="invoice-wrap">
            <hr>
            <div class="invoice-brand text-center">
                @if ($pid ?? '')
                    <img style="width: 125px !important;height: 125px !important;max-height: 125px !important;"
                        src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/NSITF-logo.png'))) }}"
                        srcset="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/images/NSITF-logo.png'))) }} 2x"
                        alt="">
                @else
                    <img style="width: 125px !important;height: 125px !important;max-height: 125px !important;"
                        src="{{ asset('assets/images/NSITF-logo.png') }}"
                        srcset="{{ asset('assets/images/NSITF-logo.png 2x') }}" alt="">
                @endif
            </div>
            <div class="nk-block-head mb-3">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title text-center">Nigeria Social Insurance Trust Fund<br />Employer Self
                        Service Portal</h4>
                </div>
            </div>
            @php
                $text = $payment->payment_status == 1 ? 'Receipt' : 'Invoice';
            @endphp
            <hr>
            <table width="100%">
                <tr class="invoice-head mx-3">
                    <td class="invoice-contact">
                        <span class="overline-title">{{ $text }} To</span>
                        <div class="invoice-contact-info">
                            <h4 class="title">{{ $payment->employer->company_name }}</h4>
                            <ul class="list-plain">
                                <li><em class="icon ni ni-map-pin-fill fs-18px"></em><span>{{ $payment->employer->company_address }}<br>{{ $payment->employer->lga->name }},
                                        {{ $payment->employer->state->name }}</span></li>
                                <li><em
                                        class="icon ni ni-call-fill fs-14px"></em><span>{{ $payment->employer->company_phone }}</span>
                                </li>
                            </ul>
                        </div>
                    </td>
                    <td class="invoice-desc" align="right">
                        <h3 class="title">{{ $text }}</h3>
                        <table class="list-plain" align="right">
                            <tr class="invoice-id">
                                <td width="100px">{{ $text }}
                                    ID:</td>
                                <td width="150px" align="right">{{ $payment->invoice_number }}</td>
                            </tr>
                            <tr class="invoice-date">
                                <td>Date:</td>
                                <td align="right">{{ date('d M, Y', strtotime($payment->invoice_generated_at)) }}</td>
                            </tr>
                            <tr class="invoice-date">
                                <td>RRR:</td>
                                <td align="right">{{ $payment->rrr }}</td>
                            </tr>
                            <tr class="invoice-date">
                                <td>Status:</td>
                                <td align="right">{{ $payment->payment_status == 1 ? 'PAID' : 'UNPAID' }}</td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- .invoice-head -->
            </table>
            <br />
            <hr>
            <br />
            <br />
            <div class="invoice-bills">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="w-150px">Item ID</th>
                                <th class="w-60">Description</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $payment->payment_type == 1 ? 'ECS Registration Fee' : ($payment->payment_type == 2 ? 'Certificate Request' : 'ECS Payment') }}
                                <td>₦{{ number_format($payment->amount, 2) }}</td>
                                <td>1</td>
                                <td>₦{{ number_format($payment->amount, 2) }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr style="font-weight: bold;">
                                <td colspan="2"></td>
                                <td colspan="2">Grand Total</td>
                                <td>&#8358;{{ number_format($payment->amount, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div><!-- .invoice-bills -->
            <hr>
        </div><!-- .invoice-wrap -->
    </div><!-- .invoice -->
</div><!-- .nk-block -->
<div class="nk-block-content text-center" style="position: fixed; bottom: 0;left:0;right:0;">
    <p class="text-soft">&copy; 2023 {{ env('APP_NAME') }}. All Rights Reserved.</p>
</div>
<script>
    function printPromot() {
        window.print();
    }
</script>
</body>

</html>
