<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCertificateRequest extends FormRequest
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
            'payment_fee' => 'required|numeric',
            'branch_id' => 'required|exists:branches,id',
            'application_letter' => 'required|file|mimes:pdf,jpg,png,jpeg|max:5120',
            'application_year' => 'required',
        ];
    }
}
