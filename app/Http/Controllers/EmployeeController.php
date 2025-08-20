<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\View\View;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class EmployeeController extends Controller
{
    use AuthorizesRequests;
   
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $summaryStatus = DB::select('
            SELECT STATUS, COUNT(*) AS TOTAL 
            FROM employees 
            GROUP BY STATUS 
            UNION ALL 
            SELECT "Grand Total" AS STATUS, COUNT(*) AS TOTAL 
            FROM employees
        ');

        $statusEmployeePerDepartment = DB::select("
            SELECT 
                departments.NAME AS DEPARTMENT, 
                SUM(CASE WHEN employees.STATUS = 'cont' THEN 1 ELSE 0 END) AS Contract,
                SUM(CASE WHEN employees.STATUS = 'emp' THEN 1 ELSE 0 END) AS Employee,
                SUM(CASE WHEN employees.STATUS = 'no_act' THEN 1 ELSE 0 END) AS NotActive,
                COUNT(*) AS Total
            FROM employees 
            JOIN departments ON employees.DEPT_ID = departments.ID 
            GROUP BY departments.NAME 
            UNION
            SELECT 
                'Grand Total' AS DEPARTMENT, 
                SUM(CASE WHEN employees.STATUS = 'cont' THEN 1 ELSE 0 END) AS Contract,
                SUM(CASE WHEN employees.STATUS = 'emp' THEN 1 ELSE 0 END) AS Employee,
                SUM(CASE WHEN employees.STATUS = 'no_act' THEN 1 ELSE 0 END) AS NotActive,
                COUNT(*) AS Total
            FROM employees");

        $employees = Employee::with('department')->get();
        return view('employees.index', compact('employees', 'summaryStatus', 'statusEmployeePerDepartment'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('create', Employee::class);

        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', Employee::class);
        $request->validate([
            'FIRSTNAME' => 'required',
            'GENDER' => 'required',
            'ADDRESS' => 'required',
            'DOB' => 'required',
            'DEPT_ID' => 'required',
            'STATUS' => 'required',
        ]);

        $input = $request->all();
        Employee::create($input);
        return redirect('employee')->with('flash_message', 'Employee Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $employee = Employee::find($id);
        return view('employees.show') ->with('employees', $employee);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $this->authorize('update', Employee::class);
        $employee = Employee::with('department')->find($id);
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments')); ;   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $this->authorize('update', Employee::class);
        $request->validate([
            'FIRSTNAME' => 'required',
            'GENDER' => 'required',
            'ADDRESS' => 'required',
            'DOB' => 'required',
            'DEPT_ID' => 'required',
            'STATUS' => 'required',
        ]);

        $employee = Employee::find($id);
        $input = $request->all();
        $employee->update($input);
        return redirect('employee')->with('flash_message', 'Employee Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->authorize('delete', Employee::class);
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'Employee Deleted!');
    }
}
