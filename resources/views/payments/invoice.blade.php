<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="PGL - Ben Onabe">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nigerian Social Insurance Trust Fund (NSITF), Employer Self Service Portal (ESSP).">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./assets/images/NSITF-logo.png">
    <!-- Page Title  -->
    <title>Invoice | {{ env('APP_NAME') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.1.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.1.3">
</head>

<body class="bg-white" onload="printPromot()">
    <div class="nk-block">
        <div class="invoice invoice-print">
            <div class="invoice-wrap">
                <div class="invoice-brand text-center">
                    <img style="width: 125px !important;height: 125px !important;max-height: 125px !important;"
                        src="./assets/images/NSITF-logo.png" srcset="./assets/images/NSITF-logo.png 2x" alt="">
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
                <div class="invoice-head mx-3">
                    <div class="invoice-contact">
                        <span class="overline-title">{{$text}} To</span>
                        <div class="invoice-contact-info">
                            <h4 class="title">{{ auth()->user()->company_name }}</h4>
                            <ul class="list-plain">
                                <li><em class="icon ni ni-map-pin-fill fs-18px"></em><span>{{ auth()->user()->company_address }}<br>{{ auth()->user()->lga->name }},
                                        {{ auth()->user()->state->name }}</span></li>
                                <li><em
                                        class="icon ni ni-call-fill fs-14px"></em><span>{{ auth()->user()->company_phone }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="invoice-desc">
                        <h3 class="title">{{$text}}</h3>
                        <ul class="list-plain">
                            <li class="invoice-id"><span>{{$text}} ID</span>:<span>{{ $payment->invoice_number }}</span>
                            </li>
                            <li class="invoice-date">
                                <span>Date</span>:<span>{{ date('d M, Y', strtotime($payment->invoice_generated_at)) }}</span>
                            </li>
                            <li class="invoice-date">
                                <span>RRR</span>:<span>{{ $payment->rrr }}</span>
                            </li>
                            <li class="invoice-date">
                                <span>Status</span>:<span>{{ $payment->payment_status == 1 ? 'PAID' : 'UNPAID' }}</span>
                            </li>
                        </ul>
                    </div>
                </div><!-- .invoice-head -->
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
                                    <td>&#8358;{{ number_format($payment->amount, 2) }}</td>
                                    <td>1</td>
                                    <td>&#8358;{{ number_format($payment->amount, 2) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Grand Total</td>
                                    <td>&#8358;{{ number_format($payment->amount, 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div><!-- .invoice-bills -->
            </div><!-- .invoice-wrap -->
        </div><!-- .invoice -->
    </div><!-- .nk-block -->
    <div class="nk-block-content text-center" style="position: fixed; bottom: 0;left:0;right:0;">
        <p class="text-soft">&copy; 2023 {{env('APP_NAME')}}. All Rights Reserved.</p>
    </div>
    <script>
        function printPromot() {
            window.print();
        }
    </script>
</body>

</html>
