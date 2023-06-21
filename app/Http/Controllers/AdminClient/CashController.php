<?php

namespace App\Http\Controllers\AdminClient;

use App\Cash;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoveMountRequest;

class CashController extends Controller
{
    public function cashDashboard()
    {
        $cashesDiary = Cash::with(['employee'])
            ->where('shop_id', shopConnect()->id)
            ->whereDate('created_at', now())
            ->get();

        $totalIn = Cash::where('shop_id', shopConnect()->id)
            ->where('type', '1')
            ->whereDate('created_at', now())
            ->sum('mount');

        $totalOut = Cash::where('shop_id', shopConnect()->id)
            ->where('type', '0')
            ->whereDate('created_at', now())
            ->sum('mount');

        return view('web.adminUser.cash.dashboardCash', compact('cashesDiary', 'totalIn', 'totalOut'));
    }

    public function moveMoneyHistorical()
    {

        $cashesHistorical = Cash::with(['employee'])
            ->where('shop_id', shopConnect()->id)
            ->get();


        return view('web.adminUser.cash.historicalMoveCash', compact('cashesHistorical'));
    }

    public function moveMoney(MoveMountRequest $request)
    {
        $employeeId = Employee::where('shop_id', shopConnect()->id)
            ->where('isOnline', 1)
            ->first();

        Cash::create([
            'mount' => $request['mount'],
            'comment' => $request['comment'],
            'type' => $request['type'],
            'employee_id' => $employeeId->id,
            'shop_id' => $employeeId->shop_id
        ]);

        toast('Monto agregado correctamente', 'success');
        return back();
    }

    public function moveMoneyEdit($id)
    {
        $cash = Cash::find($id);

        $employees = Employee::where('shop_id', shopConnect()->id)
            ->get();

        return view('web.adminUser.cash._editCashMove', compact('cash', 'employees'));
    }

    public function upgradeMoney(MoveMountRequest $request, $id)
    {
        $cash = Cash::find($id);

        $cash->mount = $request['mount'];
        $cash->comment = $request['comment'];
        $cash->type = $request['type'];
        $cash->employee_id = $request['employee_id'];
        $cash->save();

        toast('Movimiento actualizado correctamente', 'success');
        return redirect()->action('AdminClient\CashController@cashDashboard');
    }

    public function moveMoneyDelete($id)
    {
        $cash = Cash::find($id);
        $cash->delete();

        toast('Movimiento eliminado correctamente', 'success');
        return back();
    }
}
