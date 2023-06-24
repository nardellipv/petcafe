<?php

namespace App\Http\Controllers\AdminClient;

use App\City;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function listEmployee()
    {
        $employees = Employee::where('shop_id', shopConnect()->id)
            ->get();

        return view('web.adminUser.employee.listEmployee', compact('employees'));
    }

    public function addEmployee()
    {
        return view('web.adminUser.employee.addEmployee');
    }

    public function selectEmployee($id)
    {
        $employee = Employee::find($id);

        $this->authorize('update', $employee);

        // vuelvo todos a offline
        Employee::where('shop_id', shopConnect()->id)
            ->update(['isOnline' => '0']);

        $employee->isOnline = '1';
        $employee->save();

        toast('Se seleccionó el usuario actual del sistema correctamente', 'success');
        return back();
    }

    public function upgradeEmployee(AddEmployeeRequest $request)
    {
        Employee::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'type' => $request['type'],
            'token' => $request['token'],
            'shop_id' => shopConnect()->id,
        ]);

        toast('Se agregó el usuario correctamente', 'success');
        return back();
    }

    public function editEmployee($id)
    {
        $employee = Employee::find($id);

        $this->authorize('update', $employee);

        $cityEmployee = City::where("province_id", userConnect()->province_id)
            ->get();

        return view('web.adminUser.employee.editEmployee', compact('employee', 'cityEmployee'));
    }

    public function updateEmployee(AddEmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);

        $this->authorize('update', $employee);

        $employee->name = $request['name'];
        $employee->phone = $request['phone'];
        $employee->token = $request['token'];
        $employee->type = $request['type'];
        $employee->email = $request['email'];
        $employee->address = $request['address'];
        $employee->save();

        toast('Se edito el vendedor correctamente', 'success');
        return back();
    }

    public function tokenEmployee(Request $request, $id)
    {
        $employeeToken = Employee::find($id);

                
        if ($employeeToken->token == $request['token']) {
            return redirect()->action('AdminClient\EmployeeController@selectEmployee', compact('id'));
        } else {
            toast('El PIN ingresado es incorrecto', 'error');
        return back();
        }
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);

        $this->authorize('delete', $employee);

        $employee->delete();

        toast('Se elimino el vendedor correctamente', 'success');
        return back();
    }
}
