<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiseaseClaimRequest;
use App\Http\Requests\UpdateDiseaseClaimRequest;
use App\Models\Employer;
use App\Models\DiseaseClaim;
use Illuminate\Support\Facades\Mail;
use App\Mail\DiseaseClaimEmail;
use Illuminate\Support\Facades\DB;
use App\Models\Request as ModelsRequest;

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
        $validated['branch_id'] = auth()->user()->branch->id;

        $diseaseClaim = auth()->user()->disease_claims()->create($validated);
        try {
            // Send message to notify specific users based on roles
            $user = auth()->user();
            $userBranchId = $user->branch->id;
        
            // Fetch all the email addresses with the same branch_id
            $employerEmailAddresses = Employer::where('branch_id', $userBranchId)
                ->pluck('company_email');
        
            // Fetch user roles and email from the database using Spatie Roles
            $userDetails = DB::table('model_has_roles')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->join('users', 'model_has_roles.model_id', '=', 'users.id')
                ->where('model_has_roles.model_type', 'App\Models\User') // Adjust the model type if necessary
                //->where('users.id', $user->id)
                ->select('users.email', 'roles.name as role')
                ->first();
        
            // Define the roles you want to notify
            $targetRoles = ['super-admin', 'MD', 'HOD', 'Regional Manager', 'CERTIFICATE/COMPLIANCE', 'MER', 'ED FINANCE & ACCOUNT', 'AUDIT', 'GM'];
        
            // Filter email addresses based on user roles
            $filteredEmailAddresses = [];
        
            if (!empty(array_intersect([$userDetails->role], $targetRoles))) {
                // If the user has any of the target roles, include their email
                $filteredEmailAddresses[] = $userDetails->email;
            }
        
            // Include employer email addresses
            $filteredEmailAddresses = array_merge($filteredEmailAddresses, $employerEmailAddresses->toArray());
        
            // Remove duplicates
            $filteredEmailAddresses = array_unique($filteredEmailAddresses);
        
            $approval_request = $diseaseClaim->request()->create([
                'staff_id' => auth()->user()->id,
                'type_id' => 6,//for dta requests
                'order' => 1,//order/step of the flow
                'next_step' => 1,
                'action_id' => 1,//action taken id 1= create
            ]);
            ModelsRequest::where('id', $approval_request->id)->update([
                'next_step' => 1,
                // Add other columns and their values as needed
            ]);
            // Send thank you email to each filtered email address
            foreach ($filteredEmailAddresses as $email) {
                Mail::to($email)->send(new DiseaseClaimEmail($diseaseClaim));
            }
        
            return redirect()->route('disease.index')->with('success', 'Disease claim created successfully!');
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->route('disease.index')->with('error', 'Failed to notify everyone: ' . $e->getMessage());
        }

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
