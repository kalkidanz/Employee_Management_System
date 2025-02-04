<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;

class ReportController extends Controller
{
   
    public function index()
    {
        $employees = Employee::with('department','payrolls')->get();
        return view('admin.reports.index', compact('employees'));
    }

  
    public function exportPDF()
    {
        $employees = Employee::with('department','payrolls')->get();
        $pdf = Pdf::loadView('admin.reports.pdf', compact('employees'));

        return $pdf->download('employee_report.pdf');
    }

  
   
}
