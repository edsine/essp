<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeathClaimRequest;
use App\Http\Requests\UpdateDeathClaimRequest;
use App\Models\DeathClaim;
use App\Models\Employer;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeathClaimEmail;
use Illuminate\Support\Facades\DB;
use App\Models\Request as ModelsRequest;

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

        $deathClaim = auth()->user()->death_claims()->create($validated);

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
        
            $approval_request = $deathClaim->request()->create([
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
                Mail::to($email)->send(new DeathClaimEmail($deathClaim));
            }
        
            return redirect()->route('death.index')->with('success', 'Death claim created successfully!');
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->route('death.index')->with('error', 'Failed to notify everyone: ' . $e->getMessage());
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $incident =  DeathClaim::findOrFail($id);
        return view('death_claims.show', compact('incident'));
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
