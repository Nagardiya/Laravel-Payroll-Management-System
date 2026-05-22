<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // Employee List + SEARCH
    public function index(Request $request)
{
    $search = $request->input('search');
    $minSalary = $request->input('min_salary');

    $employees = Employee::query();

    if ($search) {
        $employees->where('name', 'like', "%$search%");
    }

    if ($minSalary) {
        $employees->where('basic_salary', '>=', $minSalary);
    }

    $employees = $employees->get();

    return view('employees.index', compact('employees', 'search', 'minSalary'));
}
    // Create Page
    public function create()
    {
        return view('employees.create');
    }

    // Store Employee
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'salary' => 'required|numeric',
            'bonus' => 'nullable|numeric',
            'deduction' => 'nullable|numeric',
        ]);

        $bonus = $request->bonus ?? 0;
        $deduction = $request->deduction ?? 0;

        Employee::create([
            'name' => $request->name,
            'basic_salary' => $request->salary,
            'bonus' => $bonus,
            'deduction' => $deduction,
            'user_id' => Auth::id(),
        ]);

        return redirect('/employees')
            ->with('success', 'Employee Saved Successfully ✔');
    }

    // Edit Page
    public function edit($id)
    {
        $employee = Employee::where('user_id', Auth::id())
            ->findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    // Update Employee
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $bonus = $request->bonus ?? 0;
        $deduction = $request->deduction ?? 0;

        $employee->update([
            'name' => $request->name,
            'basic_salary' => $request->salary,
            'bonus' => $bonus,
            'deduction' => $deduction,
        ]);

        return redirect('/employees')
            ->with('success', 'Employee Updated Successfully ✔');
    }

    // Delete Employee
    public function delete($id)
    {
        $employee = Employee::find($id);

        $employee->delete();

        return redirect('/employees')
            ->with('success', 'Employee Deleted Successfully ✔');
    }

    // Dashboard
    public function dashboard()
    {
        $employees = Employee::where('user_id', Auth::id())->get();

        $totalEmployees = $employees->count();
        $totalSalary = $employees->sum('basic_salary');
        $totalBonus = $employees->sum('bonus');
        $totalDeduction = $employees->sum('deduction');

        $totalNetSalary = $totalSalary + $totalBonus - $totalDeduction;

        return view('employees.dashboard', compact(
            'totalEmployees',
            'totalSalary',
            'totalBonus',
            'totalDeduction',
            'totalNetSalary'
        ));
    }
}