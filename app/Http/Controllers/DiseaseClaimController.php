<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiseaseClaimRequest;
use App\Http\Requests\UpdateDiseaseClaimRequest;
use App\Models\DiseaseClaim;

class DiseaseClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $claims = auth()->user()->disease_claims;
        return view('disease_claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = auth()->user()->employees;
        return view('disease_claims.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiseaseClaimRequest $request)
    {
        $validated = $request->validated();
        $validated['document'] = request()->file('document')->store('claims_documents', 'public');

        auth()->user()->disease_claims()->create($validated);

        return redirect()->route('death.index')->with('success', 'Disease claim created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DiseaseClaim $diseaseClaim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiseaseClaim $diseaseClaim)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiseaseClaimRequest $request, DiseaseClaim $diseaseClaim)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiseaseClaim $diseaseClaim)
    {
        //
    }
}
