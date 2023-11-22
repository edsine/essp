<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\Signature;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
/*         $initial_year = 2023;
        $start_year = date('Y', strtotime(auth()->user()->created_at)) > $initial_year ? date('Y', strtotime(auth()->user()->created_at)) : $initial_year;

        $certificate_years = [];
        --$start_year;
        //check if employer has ECS payments since registration or start of system
        do {
            ++$start_year;
            $payment = auth()->user()->payments()
                ->where('payment_type', 4)
                ->where('payment_status', 1)
                ->whereRaw('contribution_year = ' . $start_year)
                ->selectRaw("SUM(contribution_months) AS contribution_months, contribution_period")
                ->groupBy(['contribution_year', 'contribution_period'])
                ->whereNotExists(function ($query) use ($start_year) {
                    $query->select(DB::raw(1))
                        ->from('certificates')
                        ->whereRaw('application_year = ' . $start_year);
                })
                ->first();

            //Employer can only generate certificates for years with completed payments
            //and where certificate has not already been generated
            if (
                ($payment && $payment->contribution_period == 'Annually') ||
                ($payment && $payment->contribution_period == 'Monthly' && $payment->contribution_months == 12)
            ) {
                $certificate_years[] = $start_year;
            }
        } while ($start_year < date('Y'));


        $certificates = auth()->user()->certificates;

        if ($certificates->count() > 0)
            $pending = auth()->user()->certificates()->get()->last();
        else $pending =  null;

        $amount = 50000;
        return view('certificates.index', compact('certificates', 'amount', 'pending', 'certificate_years'));
 */
        //if there is/are no completed ECS payments yearly payments
        //then employer cannot generate certificate
        $initial_year = 2023;
        $start_year = date('Y', strtotime(auth()->user()->created_at)) > $initial_year ? date('Y', strtotime(auth()->user()->created_at)) : $initial_year;
        
        $certificate_years = [];
        --$start_year;

        do {
            ++$start_year;
            $payment = DB::table('payments')
    ->select(DB::raw('SUM(contribution_months) AS contribution_months, contribution_period, contribution_year'))
    ->where('payment_type', 4)
    ->where('payment_status', 1)
    ->where('employer_id', auth()->user()->id)
    ->where('contribution_year', $start_year)
    ->groupBy(['contribution_year', 'contribution_period'])/* 
    ->whereNotExists(function ($query) use ($start_year) {
        $query->select(DB::raw(1))
            ->from('certificates')
            ->whereRaw('application_year = ' . $start_year);
    }) */
    ->first();

    $certificate = DB::table('certificates')->where('employer_id', auth()->user()->id)
    ->whereRaw('application_year = ' . $start_year)->latest()->first();

    if(!$certificate){
if (
    ($payment && $payment->contribution_period == 'Annually') ||
    ($payment && $payment->contribution_period == 'Monthly' && $payment->contribution_months == 12)
) {
    $certificate_years[] = $start_year;
}
    }
            //$certificate_years[] = $start_year;

        } while ($start_year < date('Y'));

        

        $certificates = auth()->user()->certificates;

        if ($certificates->count() > 0)
            $pending = auth()->user()->certificates()->get()->last();
        else $pending =  null;

        $latestPayment = auth()->user()->payments()->latest()->first();

        $amount = 50000;
        return view('certificates.index', compact('certificates', 'amount', 'pending', 'certificate_years', 'latestPayment'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $initial_year = 2023;
        $start_year = date('Y', strtotime(auth()->user()->created_at)) > $initial_year ? date('Y', strtotime(auth()->user()->created_at)) : $initial_year;
        
        $certificate_years = [];
        --$start_year;
        
        do {
            ++$start_year;
        
            $payment = auth()->user()->payments()
    ->where('payment_type', 4)
    ->where('payment_status', 1)
    ->where('contribution_year', $start_year)
    ->selectRaw("SUM(contribution_months) AS contribution_months, contribution_period, contribution_year")
    ->groupBy(['contribution_year', 'contribution_period'])
    ->first();

    $certificate = DB::table('certificates')->where('employer_id', auth()->user()->id)
    ->whereRaw('application_year = ' . $start_year)->latest()->first();

    if(!$certificate){
if (
    ($payment && $payment->contribution_period == 'Annually') ||
    ($payment && $payment->contribution_period == 'Monthly' && $payment->contribution_months == 12)
) {
    $certificate_years[] = $start_year;
}
    }
            
            //$certificate_years[] = $start_year;

        } while ($start_year < date('Y'));


       // dd($payment->contribution_period);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificateRequest $request)
    {
        $validated = $request->validated();
        $validated['application_letter'] = request()->file('application_letter')->store('application_letters', 'public');

        $certificate = auth()->user()->certificates()->create($validated);

        return redirect()->back()->with('success', 'Certificate request submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        //
    }


    public function displayCertificateDetails($certificateId)
    {
        $certificate = Certificate::with(['employer', 'employer.employees', 'employer.payments'])->find($certificateId);

        // Get the last recent 3 years
        $currentYear = now()->year;
        $lastThreeYears = [$currentYear - 2, $currentYear - 1, $currentYear];

        $totalEmployees = [];
        $paymentsAmount = [];

        foreach ($lastThreeYears as $year) {
            $totalEmployees[$year] = DB::table('employees')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('created_at', '=', $year) // Update the whereYear condition
                ->count();

            $paymentsAmount[$year] = DB::table('payments')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('invoice_generated_at', '=', $year) // Update the whereYear condition
                ->sum('amount');
        }

        $currentYearExpiration1 = Payment::where('employer_id', $certificate->employer->id)
            ->whereYear('invoice_generated_at', '=', $currentYear)
            ->value('invoice_duration');

        $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

        // Generate a QR code for the data 'NSITF'
        //$qrCode = QrCode::generate('http://ebsnsitf.com.ng/');
        $qrCode = QrCode::generate('http://ebsnsitf.com.ng/');
        $signature = DB::table('signatures')
    ->select('signatures.*', 'users.first_name', 'users.middle_name', 'users.last_name')
    ->join('users', 'signatures.user_id', '=', 'users.id')
    ->where('signatures.id', 1)
    ->first();


        return view('certificates.details', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode', 'signature'));
    }

    public function displayCertificateDetailsPage($certificateId)
    {
        $certificate = Certificate::with(['employer', 'employer.employees', 'employer.payments'])->find($certificateId);

        // Get the last recent 3 years
        $currentYear = now()->year;
        $lastThreeYears = [$currentYear - 2, $currentYear - 1, $currentYear];

        $totalEmployees = [];
        $paymentsAmount = [];

        foreach ($lastThreeYears as $year) {
            $totalEmployees[$year] = DB::table('employees')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('created_at', '=', $year) // Update the whereYear condition
                ->count();

            $paymentsAmount[$year] = DB::table('payments')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('invoice_generated_at', '=', $year) // Update the whereYear condition
                ->sum('amount');
        }

        $currentYearExpiration1 = Payment::where('employer_id', $certificate->employer->id)
            ->whereYear('invoice_generated_at', '=', $currentYear)
            ->value('invoice_duration');

        $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

        // Generate a QR code for the data 'NSITF'
        $qrCode = QrCode::generate('http://ebs.nsitf.com.ng/');

        $signature = DB::table('signatures')
    ->select('signatures.*', 'users.first_name', 'users.middle_name', 'users.last_name')
    ->join('users', 'signatures.user_id', '=', 'users.id')
    ->where('signatures.id', 1)
    ->first();


        return view('certificates.detailspage', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode', 'signature'));
    }

    public function verification()
    {

        return view('certificates.verification');
    }
    public function verifyCertificate(Request $request)
    {
        $ecsNumber = $request->input('ecs_number');
        $employer = Employer::where('ecs_number', $ecsNumber)->first();

        if ($employer) {
            // Redirect to the certificate details using the employer's first certificate (assuming there's a relationship between employer and certificate)
            return redirect()->route('certificate.detailspage', ['certificateId' => $employer->certificates->first()->id]);
        } else {
            return back()->with('error', 'ECS number not found.');
        }
    }

    public function downloadCertificateDetails($certificateId)
    {
        $certificate = Certificate::with(['employer', 'employer.employees', 'employer.payments'])->find($certificateId);

        $currentYear = now()->year;
        $lastThreeYears = [$currentYear - 2, $currentYear - 1, $currentYear];

        $totalEmployees = [];
        $paymentsAmount = [];

        foreach ($lastThreeYears as $year) {
            $totalEmployees[$year] = DB::table('employees')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('created_at', '=', $year)
                ->count();

            $paymentsAmount[$year] = DB::table('payments')
                ->where('employer_id', $certificate->employer->id)
                ->whereYear('invoice_generated_at', '=', $year)
                ->sum('amount');
        }

        $currentYearExpiration1 = Payment::where('employer_id', $certificate->employer->id)
            ->whereYear('invoice_generated_at', '=', $currentYear)
            ->value('invoice_duration');

        $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

        // Generate a QR code for the data 'NSITF'
        $qrCode = QrCode::generate('http://ebsnsitf.com.ng/');

        $pdf = PDF::loadView('certificates.details', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode'));

        return $pdf->download('certificate_details.pdf');
    }
}
