<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreDiseaseClaimRequest extends FormRequest
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
            'nature_of_work' => 'required|string',
            'nature_of_disease' => 'required|string',
            'date_disease_diagnosed' => 'required|date',
            'nature_of_injury' => 'required|string',
            'exposure_years' => 'required|numeric',
            'exposure_months' => 'required|numeric',
            'exposure_days' => 'required|numeric',
            'accident_report_date' => 'required|date',
            'course_of_work' => 'required',
            'employment_years' => 'required|numeric',
            'employment_months' => 'required|numeric',
            'former_employers' => 'required|string',
            'medical_last_name' => 'required|string',
            'medical_first_name' => 'required|string',
            'medical_practice_number' => 'required|string',
            'document' => 'file|mimes:pdf|max:10240',
        ];
    }
}
