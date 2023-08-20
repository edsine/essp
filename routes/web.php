<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('auth.login'); //Redirect on load to login or home
});

//LARAVEL DEFAULT
Auth::routes();

/**
 * UNAUTHENTICATED ROUTES
 */
Route::post('employer/otp', [App\Http\Controllers\EmployerController::class, 'verifyotp'])->name('employer.otp');
Route::get('employer/ecs', [App\Http\Controllers\EmployerController::class, 'ecs'])->name('employer.ecs');
Route::get('employer/lgas', [App\Http\Controllers\EmployerController::class, 'lgas'])->name('employer.lgas');

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /**
     * EMPLOYERS
     */
    Route::get('employer/profile', [App\Http\Controllers\EmployerController::class, 'profile'])->name('employer.profile');
    Route::resource('employer', App\Http\Controllers\EmployerController::class);


    /**
     * EMPLOYEES
     */
    Route::get('employee/createbulk', [App\Http\Controllers\EmployeeController::class, 'createbulk'])->name('employee.createbulk');
    Route::post('employee/uploadbulk', [App\Http\Controllers\EmployeeController::class, 'uploadbulk'])->name('employee.uploadbulk');
    Route::post('employee/storebulk', [App\Http\Controllers\EmployeeController::class, 'storebulk'])->name('employee.storebulk');
    Route::resource('employee', App\Http\Controllers\EmployeeController::class);


    /**
     * PAYMENTS
     */
    Route::get('payment/invoice/download/{payment}', [App\Http\Controllers\PaymentController::class, 'download'])->name('payment.invoice.download');
    Route::get('payment/invoice/{payment}', [App\Http\Controllers\PaymentController::class, 'invoice'])->name('payment.invoice');
    Route::get('payment/remita', [App\Http\Controllers\PaymentController::class, 'callbackRemita'])->name('payment.callback');
    Route::post('payment/remita', [App\Http\Controllers\PaymentController::class, 'generateRemita'])->name('payment.remita');
    Route::resource('payment', App\Http\Controllers\PaymentController::class);


    /**
     * CERTIFICATES
     */
    Route::resource('certificate', App\Http\Controllers\CertificateController::class);


    /**
     * CLAIMS
     */
    Route::resource('claim/accident', App\Http\Controllers\AccidentClaimController::class);
    Route::resource('claim/death', App\Http\Controllers\DeathClaimController::class);
    Route::resource('claim/disease', App\Http\Controllers\DiseaseClaimController::class);
});

Route::get('/notification', function () {
    $employer = App\Models\Employer::find(26083);
    /* $payment = App\Models\Payment::get()->last();
    $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans', ])
        ->loadView('payments.invoice', ['pid' => $payment->id])
        ->setPaper('a4', 'portrait');//email */

    $password = "password";

    //use from inside code
    //return (new App\Mail\EmployerRegisteredMail($employer))->render();

    //send for testing
    Illuminate\Support\Facades\Mail::to('realbenten@gmail.com')->send(new App\Mail\EmployerRegisteredMail($employer, $password));
    /* $content = $pdf->download()->getOriginalContent();
    Illuminate\Support\Facades\Storage::put('public/invoices/invoice_' . $payment->id . '.pdf',$content);
    Illuminate\Support\Facades\Mail::to('realbenten@gmail.com')->send(new App\Mail\PaymentStatusMail($payment));
    Illuminate\Support\Facades\Storage::delete('public/invoices/invoice_' . $payment->id . '.pdf'); */

    //use for browser render outside codeblock
    return new App\Mail\EmployerRegisteredMail($employer, $password);
    ///return new App\Mail\PaymentStatusMail($payment);

    //notification
    /* return (new App\Notifications\EmployerRegistrationNotification
    ($employer))->toMail($employer); */
    //$employer->notify(new EmployerRegistrationNotification($employer));
});

Route::get('/pdf', function () {
    $payment = App\Models\Payment::get()->last();

    $pdf = PDF::setOptions(['dpi' => 150, 'defaultFont' => 'DejaVu Sans', ])
        ->loadView('payments.invoice', ['pid' => $payment->id])
        ->setPaper('a4', 'portrait')
        //->set_option('isHtml5ParserEnabled', true)
        //->set_option('isRemoteEnabled', true)
        //->setWarnings(false)
    ;

    /* $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed' => TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
            ]
        ])
    ); */

    //download pdf
    //return $pdf->download('invoice.pdf');

    //save to storage
    //$content = $pdf->download()->getOriginalContent();
    //Illuminate\Support\Facades\Storage::put('public/invoices/invoice_' . $payment->id . '.pdf',$content);

    //display pdf in browser without downlod
    $pdf->render();
    return $pdf->stream('invoice.pdf');
});
