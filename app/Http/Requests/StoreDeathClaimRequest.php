<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDeathClaimRequest extends FormRequest
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
            'employee_id' => 'required|exists:employees,id',
            'last_salary' => 'required|numeric',
            'monthly_contribution' => 'required|numeric',
            'incident_description' => 'required|string',
            'incident_date' => 'required|date',
            'incident_time' => 'required',//|date_format:H:i A',
            'employer_account_name' => 'required|string',
            'employer_account_number' => 'required|string',
            'employer_bank_name' => 'required|string',
            'employer_sort_code' => 'required|string',
            'employee_account_name' => 'required|string',
            'employee_account_number' => 'required|string',
            'employee_bank_name' => 'required|string',
            'employee_sort_code' => 'required|string',
            'document' => 'file|mimes:pdf|max:10240',
        ];
    }
}
