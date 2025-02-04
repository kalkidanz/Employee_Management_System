<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('employee')->get();
        return view('admin.payrolls.index', compact('payrolls'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('admin.payrolls.create', compact('employees'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'employee_id'  => 'required|exists:employees,id',
            'basic_salary' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ]);

        
        $existingPayroll = Payroll::where('employee_id', $request->employee_id)
            ->where('payment_date', $request->payment_date)
            ->exists();

        if ($existingPayroll) {
            return redirect()->back()->withErrors([
                'error' => 'A payroll record for this employee on the selected date already exists.'
            ])->withInput();
        }
        $basic_salary = (float) $request->basic_salary;

        $bonus_percentage = 10; // 10% bonus
        $deductions_percentage = 5; // 5% deductions

        // Calculate bonus and deductions based on the basic salary
        $bonus = ($bonus_percentage / 100) * $basic_salary;
        $deductions = ($deductions_percentage / 100) * $basic_salary;

       
        $tax = $this->calculateTax($basic_salary);

        
        $net_salary = max(0, $basic_salary + $bonus - $deductions - $tax);

        
        Payroll::create([
            'employee_id'  => $request->employee_id,
            'basic_salary' => $basic_salary,
            'bonus'        => $bonus,
            'deductions'   => $deductions,
            'tax'          => $tax,
            'net_salary'   => $net_salary,
            'payment_date' => $request->payment_date,
        ]);

        return redirect()->route('payrolls.index')->with('success', 'Payroll record created successfully.');
    }

    public function show(Payroll $payroll)
    {
        return view('admin.payrolls.show', compact('payroll'));
    }

    /**
     * 
     *
     * @param  float  $basic_salary
     * @return float
     */
    private function calculateTax(float $basic_salary)
    {
        $tax = 0;
        
       
        if ($basic_salary <= 5000) {
            $tax = 0; 
        } elseif ($basic_salary <= 10000) {
            $tax = ($basic_salary - 5000) * 0.05;
        } else {
            $tax = ($basic_salary - 10000) * 0.1 + 250; 
        }
        
        return $tax;
    }
}
