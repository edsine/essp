<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Satisfy&family=Tilt+Prism&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("mycss.css") }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.1.7/JsBarcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.4/dist/JsBarcode.all.min.js"></script>
    {{-- <script>
        window.onload = function() {
            window.print();
        };
        </script> --}}
</head>
<body>
    <!-- header::start -->
    
    <div class="main">
        <div class="header">
            <img src="{{ asset('NSITF-logo.png') }}" alt="NSITF Logo">
            <h1>NIGERIA SOCIAL INSURANCE TRUST FUND</h1>
            <h1>ECS CLEARANCE CERTIFICATE</h1>
        </div>
        <div class="certificate">            
            <div class="form-container">      
                
                <!-- Content -->
                <div class="content"> 
                    <!-- Watermark -->
                    <img class="watermark"src="{{ asset('NSITF.png') }}" alt="">
                    <div class="original">
                        <p>Employer Registration NO <strong>{{ $certificate->employer->ecs_number }}</strong></p>
                        <h4 style="color: red; font-weight: bolder; font-family: 'cursive'">ORIGINAL</h4>
                    </div>
                    <div class="atp">
                        <h1 style="color: red; font-family: 'cursive'; font-style: oblique; font-size: 2rem;">This is to certify that</h1>
                        <div class="container">
                            <div class="first">
                                {{ $certificate->employer->company_name }}
                                <hr>
                            </div>
                            <div class="second">
                                {{ $certificate->employer->company_rcnumber }}
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="table-container">
                        <!-- Table and other content goes here -->
                        <p>Has complied with the provisions of the Employees Compensation ACT 2010 (ECA 2010)</p>
                        <p>The details of compliance are as follows</p>
                        <table>
                            
                            <tr>
                                <td>Description</td>
                                @foreach ($lastThreeYears as $year)
                                <td>{{ $year }}</td>
                                @endforeach
                            </tr>
                           
                            <tr>
                               
                                <td>Number of Employees</td>
                                @foreach ($lastThreeYears as $year)
                                <td><strong>{{ $totalEmployees[$year] }}</strong></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>ECS Contribution Level</td>
                                @foreach ($lastThreeYears as $year)
                                <td><strong>{{ $paymentsAmount[$year] }}</strong></td>
                                @endforeach
                            </tr>
                           
                        </table>
                        <p><strong>This Certificate expires on</strong> {{ $currentYearExpiration }}</p>
                    </div>
                    <!-- the barcode area -->
                {{-- <svg id="barcode"></svg> --}}
                <div class="nav1">
                    <div class="nav2">
                     {!! $qrCode !!}
                    </div>
                    @if (isset($signature))
                     <div class="nav2 navv">
                        <img src="{{ $signature->signature_data }}" style="width: 200px;height: auto;"/>
                        <p style="margin-top: 0px;padding-top:0px;">
                            <b>
                                @if(!empty($signature->user))
                            {{ $signature->user->first_name .' '.$signature->user->middle_name.' '.$signature->user->last_name }}
                        @endif</b></p>
                    </div>
                         
                     @endif
                     </div>
                </div>
            </div>
        </div> <div style="text-align: center;margin:auto;">
    </div>
    </div>
    <style>
        .nav1 {
  text-align: left; 
  padding: 0;
  margin: 0;
}

.nav1 .navv{
  text-align: right; 
}

.nav1 .nav2 {
  display: inline-block;
  font-size: 20px;
  padding: 20px;
}
    </style>
    {{-- <script>
        
        JsBarcode('#barcode', 'NSITF');
    </script> --}}
</body>
</html>
