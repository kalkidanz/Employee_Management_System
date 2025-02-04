<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all(); 
        return view('admin.employees.create', compact('departments'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'position' => 'required',
        ]);

        Employee::create($request->all());

        return redirect()->route('admin.employees.index')->with('success', 'Employee created successfully.');
    }

   

    public function edit(Employee $employee)
    { 
        $departments = Department::all();
        return view('admin.employees.edit', compact('employee','departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'position' => 'required',
            'department_id' => 'required|exists:departments,id',
           
        ]);

        $employee->update($request->all());
       

        return redirect()->route('admin.employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employees.index')->with('success', 'Employee deleted successfully.');
    }
}
