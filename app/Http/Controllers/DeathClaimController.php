<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeathClaimRequest;
use App\Http\Requests\UpdateDeathClaimRequest;
use App\Models\DeathClaim;

class DeathClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $claims = auth()->user()->death_claims;
        return view('death_claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = auth()->user()->employees;
        return view('death_claims.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeathClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');
        $validated['branch_id'] = auth()->user()->branch->id;

        auth()->user()->death_claims()->create($validated);

        return redirect()->route('death.index')->with('success', 'Death claim created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DeathClaim $deathClaim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeathClaim $deathClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeathClaimRequest $request, DeathClaim $deathClaim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeathClaim $deathClaim)
    {
        //
    }
}
