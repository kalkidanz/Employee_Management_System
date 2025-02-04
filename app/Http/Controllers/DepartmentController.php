<?php
namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }

    public function create(Department $department)
    {
        return view('admin.departments.create', compact('department'));
    }
    public function store(Request $request)
{
   
    $request->validate([
        'name' => 'required|string|max:255|unique:departments,name', 
        'description' => 'nullable|string|max:500',           
    ]);

    Department::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

   
    return redirect()->route('admin.departments.index')->with('success', 'Department created successfully!');
}


    public function edit(Department $department)
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $department->update(['name' => $request->name]);
        $department->update(['description' => $request->description]);
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('admin.departments.index')->with('success', 'Employee deleted successfully.');
    }
}