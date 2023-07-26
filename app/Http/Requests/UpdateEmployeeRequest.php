<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'email' => 'required|email',
            'employment_date' => 'required|date',
            'address' =>  'required|string',
            'state_of_origin' =>  'required|string',
            'local_govt_area' =>  'required|string',
            'phone_number' =>  'required|string',
            'means_of_identification' =>  'required|string',
            'identity_number' =>  'required|string',
            'identity_issue_date' => 'required|date',
            'identity_expiry_date' => 'date',
            'next_of_kin' => 'required|string',
            'next_of_kin_phone' => 'requried|string',
            'monthly_remuneration' => 'required|numeric',
            'dependants_number' => 'required|numeric',
            'job_title' => 'required|string',
            'staff_id' => 'required|string',
            'alternate_phone' => 'required|string',
        ];
    }
}
