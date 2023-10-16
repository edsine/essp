<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Employer;
use App\Models\LGA;
use App\Notifications\OTPNotification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreEmployerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employer $employer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employer $employer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employer $employer)
    {
        //
    }

    /**
     * Get Employer with ECS Number
     */
    public function ecs(Request $request)
    {
        if ($request->ecs == null) {
            return response()->json([
                'status' => 'error',
                'message' => 'Provide ECS Number!'
            ]);
        }

        try {
            $employer = Employer::where('ecs_number', $request->ecs)->firstOrFail();

            //generate otp
            $pin = rand(100000, 999999);
            $currentTimestamp = time();

            // Add 15 minutes in seconds (15 minutes * 60 seconds)
            $fifteenMinTimestamp = $currentTimestamp + (15 * 60);
            //save to db
            DB::table('otps')->updateOrInsert([
                'pinnable_type' => 'App\\Models\\Employer',
                'pinnable_id' => $employer->id,
                'expires_at'=>date('Y-m-d H:i:s', $fifteenMinTimestamp)
            ], [
                'otp' => $pin,
            ]);

            //send notification
            $employer->notify(new OTPNotification($employer, $pin));

            return response()->json([
                'status' => 'success',
                'message' => 'Employer details found and populated! <br/>An OTP has been sent to email [<b>' . (substr($employer->company_email, 0, 1)) . '***' . (substr(explode('@', $employer->company_email)[0], -1, 1)) . substr($employer->company_email, strpos($employer->company_email, "@")) . '</b>]. <br/>Search again to <b>resend</b> OTP.',
                'employer' => $employer,
                'ecs' => $request->ecs,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Not found!'
            ]);
        }
    }

    public function verifyotp(Request $request){
        $employer = Employer::where('ecs_number', $request->ecs)->first();

        $rows = DB::table('otps')
            ->where('pinnable_id', $employer->id)
            ->where('pinnable_type', 'App\\Models\\Employer')
            ->where('otp', $request->otp)
            ->whereRaw("expires_at >= DATE_SUB(NOW(), INTERVAL 5 MINUTE)")
            ->count();

        if ($rows < 1) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid OTP!',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'OTP verification successful!',
        ]);
    }

    public function lgas(Request $request)
    {
        return response()->json([
            'data' => LGA::where('state_id', $request->state)->get() ?? [],
        ]);
    }

    public function profile()
    {
        return view('employers.profile');
    }
}
