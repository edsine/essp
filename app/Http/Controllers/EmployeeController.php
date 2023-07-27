<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Imports\EmployeesImport;
use App\Models\Employee;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = auth()->user()->employees;

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $states = State::all();
        return view('employees.create', compact(['states']));
    }

    public function createbulk(Request $request)
    {
        return view('employees.create-bulk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = 1;
        $employee = auth()->user()->employees()->create($validated);
        return redirect()->route('employee.index')->with('success', 'Employee added successfully!');
    }

    public function storebulk(Request $request)
    {

        return redirect()->route('employee.index')->with('success', 'Bulk Employees added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $states = State::all();
        return view('employees.edit', compact(['employee', 'states']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();
        $employee->update($validated);
        return redirect()->route('employee.index')->with('success', 'Employee udpated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->delete())
            return redirect()->back()->with('success', 'Employee deleted successfully!');
        return redirect()->back()->with('error', 'Employee could not be deleted!');
    }

    public function uploadbulk(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'excel' => 'required|file|mimes:xlsx,xls|max:10240',
        ]);

        if ($validator->fails()) {
            return redirect()->route('employee.createbulk')->withErrors($validator)
                ->withInput()
                //->with('error', 'File upload error')//$validator->errors()[0])
            ;
        }

        Excel::import(new EmployeesImport, request()->file('excel'));

        return redirect()->route('employee.index')->with('success', 'Bulk Employees uploaded successfully!');
    }
}
