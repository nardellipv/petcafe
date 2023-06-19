<?php

namespace App\Http\Controllers\AdminClient;

use App\City;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
        $cityEmployees = City::where("province_id", userConnect()->province_id)
            ->get();

        return view('web.adminUser.employee.addEmployee', compact('cityEmployees'));
    }

    public function selectEmployee($id)
    {
        $employee = Employee::find($id);

        // vuelvo todos a offline
        Employee::where('shop_id', shopConnect()->id)
            ->update(['isOnline' => '0']);

        $employee->isOnline = '1';
        $employee->save();

        toast('Se seleccionó el usuario actual del sistema correctamente', 'success');
        return back();
    }

    public function upgradeEmployee(Request $request)
    {
        Employee::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'shop_id' => shopConnect()->id,
        ]);

        toast('Se agregó el usuario correctamente', 'success');
        return back();
    }
}
