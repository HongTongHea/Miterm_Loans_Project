<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {

        $employee = new Employee();

        if ($this->saveOrUpdate($request, $employee)) {
            return to_route('employees.index');
        } else {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
    }

    public function edit(int $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }
    public function update(Request $request, $id)
    {


        $employee =  Employee::findOrFail($id);

        if ($this->saveOrUpdate($request, $employee)) {
            return to_route('employees.index');
        } else {
            return redirect()->back()->withErrors($request->errors())->withInput();
        }
    }

    private function saveOrUpdate(Request $request, employee  $employee)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => "required|max:50",
            'gender' => "required"

        ]);

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->gender = $request->input('gender');
        $employee->phone = $request->input('phone');
        $employee->email = $request->input('email');
        $employee->address = $request->input('address');
        $employee->active = $request->filled('active');

        return $employee->save();
    }
    public function details($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.details', compact('employee'));
    }

    public function delete($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.delete', compact('employee'));
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
