<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, SkipsEmptyRows, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Employee([
            'employer_id' => auth()->user()->id,
            'last_name'     => $row['employee_surname'],
            'first_name'    => $row['employee_firstname'],
            'middle_name'    => $row['employee_middlename'],
            'address'    => $row['employee_address'],
            'date_of_birth'    => $row['dob'],
            'gender'    => $row['gender'],
            'marital_status'    => $row['marital_status'],
            'staff_id'    => $row['work_id'],
            'employment_date'    => $row['employment_date'],
            'email'    => $row['employee_email'],
            'job_title'    => $row['job_title'],
            'state_of_origin'    => $row['state_origin'],
            'local_govt_area'    => $row['lga'],
            'phone_number'    => $row['contact_phone'],
            'alternate_phone'    => $row['alternate_phone'],
            'means_of_identification'    => $row['identity_means'],
            'identity_number'    => $row['identity_number'],
            'identity_issue_date'    => $row['issue_date'],
            'next_of_kin'    => $row['next_kin'],
            'next_of_kin_phone'    => $row['next_kin_number'],
            'dependants_number'    => $row['dependants_number'],
            'monthly_remuneration'    => $row['monthly_remuneration'],
            //'job_title'    => $row[],
            //'password' => Hash::make($row[2]),
            'status' => 1,
        ]);
    }

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
