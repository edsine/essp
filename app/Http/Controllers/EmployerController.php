<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use App\Models\Employer;
use App\Models\LGA;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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

            return response()->json([
                'status' => 'success',
                'message' => 'Employer details found and populated!',
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

    public function lgas(Request $request){
        return response()->json([
            'data' => LGA::where('state_id', $request->state)->get() ?? [],
        ]);
    }

    public function profile(){
        return view('employers.profile');
    }
}
