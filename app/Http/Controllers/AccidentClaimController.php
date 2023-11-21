<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccidentClaimRequest;
use App\Http\Requests\UpdateAccidentClaimRequest;
use App\Models\AccidentClaim;

class AccidentClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $claims = auth()->user()->accident_claims;
        return view('accident_claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = auth()->user()->employees;
        return view('accident_claims.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccidentClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');
        $validated['branch_id'] = auth()->user()->branch->id;

        auth()->user()->accident_claims()->create($validated);
        

        return redirect()->route('accident.index')->with('success', 'Accident claim created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccidentClaim $accidentClaim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccidentClaim $accidentClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccidentClaimRequest $request, AccidentClaim $accidentClaim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccidentClaim $accidentClaim)
    {
        //
    }
}
