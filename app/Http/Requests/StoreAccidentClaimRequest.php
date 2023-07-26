<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAccidentClaimRequest extends FormRequest
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
            'accident_date' => 'required|date',
            'accident_time' => 'required',
            'accident_town' => 'required|string',
            'state' => 'required|string',
            'lga' => 'required|string',
            'accident_report_date' => 'required|date',
            'accident_report_time' => 'required',
            'employee_earning' => 'required|numeric',
            'employee_task' => 'required|string',
            'nature_of_injury' => 'required|string',
            'course_of_work' => 'required',
            'first_aid_given' => 'required',
            'medical_last_name' => 'required|string',
            'medical_first_name' => 'required|string',
            'medical_practice_number' => 'required|string',
            'document' => 'file|mimes:pdf|max:10240',
        ];
    }
}
