<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
class EmployeeController extends Controller
{
    public function index(){$employee = Employee::all();
        return view('employees.index', ['employees' => $employee]);
    }
    public function create()
    {
        return view('employees.create');
    }
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ]);
        Employee::create($validateData);
        return redirect()->route('employees.index');
    }
    public function show(string $index){$employee = Employee::findOrFail($index);
        return view('employees.show', ['employees' => $employee, "id" => $index]);
    }
    public function edit(Employee $employee)
    {
        return view('employees.edit',['employee' => $employee]);
    }


    public function update(Request $request, Employee $employee){
        $validateData= $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$employee->id,
        ]);
        $employee->update($validateData);
        return redirect()->route('employees.index');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
