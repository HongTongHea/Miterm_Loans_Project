<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $employee = new Employee();

        $this->saveOrUpdate($request, $employee);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully');
    }

    public function edit(int $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, int $id)
    {
        $employee = Employee::findOrFail($id);

        $this->saveOrUpdate($request, $employee);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    public function details(int $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.details', compact('employee'));
    }

    public function delete(int $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.delete', compact('employee'));
    }

    public function destroy(int $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }

    private function saveOrUpdate(Request $request, Employee $employee): void
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'gender'     => 'required|string',
            'phone'      => 'nullable|string|max:30',
            'email'      => 'nullable|email|max:100',
            'address'    => 'nullable|string|max:255',
        ]);

        $employee->first_name = $validated['first_name'];
        $employee->last_name  = $validated['last_name'];
        $employee->gender     = $validated['gender'];
        $employee->phone      = $validated['phone'] ?? null;
        $employee->email      = $validated['email'] ?? null;
        $employee->address    = $validated['address'] ?? null;
        $employee->active     = $request->boolean('active');

        $employee->save();
    }
}
