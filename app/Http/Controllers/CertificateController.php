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

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = auth()->user()->certificates;

        if ($certificates->count() > 0)
            $pending = auth()->user()->certificates()->get()->last();
        else $pending =  null;

        $amount = 50000;
        return view('certificates.index', compact('certificates', 'amount', 'pending'));
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
        ->whereYear('invoice_generated_at','=', $currentYear)
        ->value('invoice_duration');

    $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

    // Generate a QR code for the data 'NSITF'
    //$qrCode = QrCode::generate('http://ebsnsitf.com.ng/');
    $qrCode = QrCode::generate('http://ebsnsitf.com.ng/');


    return view('certificates.details', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode'));

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
        ->whereYear('invoice_generated_at','=', $currentYear)
        ->value('invoice_duration');

    $currentYearExpiration = Carbon::createFromFormat('Y-m-d', $currentYearExpiration1)->format('F d, Y');

    // Generate a QR code for the data 'NSITF'
    $qrCode = QrCode::generate('http://ebsnsitf.com.ng/');


    return view('certificates.detailspage', compact('certificate', 'totalEmployees', 'paymentsAmount', 'currentYearExpiration', 'lastThreeYears', 'qrCode'));

}

public function verification(){

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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
}
