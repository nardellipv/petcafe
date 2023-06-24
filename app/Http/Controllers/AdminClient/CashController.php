<?php

namespace App\Http\Controllers\AdminClient;

use App\Cash;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoveMountRequest;
use Illuminate\Http\Request;

class CashController extends Controller
{
    public function cashDashboard()
    {
        $cashesDiary = Cash::with(['employee', 'payment'])
            ->where('shop_id', shopConnect()->id)
            ->whereDate('created_at', now())
            ->get();

        $cashesDiaryChart = Cash::with(['employee', 'payment'])
            ->where('shop_id', shopConnect()->id)
            ->whereDate('created_at', now())
            ->groupBy('payment_id', 'type')
            ->get();

        // invoiceHelper get only cash or MP
        $paymentShopTemp = paymentShop();
        $paymentShop = $paymentShopTemp[1];

        $totalIn = Cash::where('shop_id', shopConnect()->id)
            ->where('type', '1')
            ->whereDate('created_at', now())
            ->sum('mount');

        $totalOut = Cash::where('shop_id', shopConnect()->id)
            ->where('type', '0')
            ->whereDate('created_at', now())
            ->sum('mount');

        return view('web.adminUser.cash.dashboardCash', compact('cashesDiary', 'totalIn', 'totalOut', 'paymentShop', 'cashesDiaryChart'));
    }

    public function moveMoneyHistorical()
    {

        $cashesHistorical = Cash::with(['employee','payment'])
            ->where('shop_id', shopConnect()->id)
            ->get();

        $cashesDiaryChart = Cash::with(['employee', 'payment'])
            ->where('shop_id', shopConnect()->id)
            ->groupBy('payment_id', 'type')
            ->get();

        $totalIn = Cash::where('shop_id', shopConnect()->id)
            ->where('type', '1')
            ->sum('mount');

        $totalOut = Cash::where('shop_id', shopConnect()->id)
            ->where('type', '0')
            ->sum('mount');


        return view('web.adminUser.cash.historicalMoveCash', compact('cashesHistorical', 'cashesDiaryChart', 'totalIn', 'totalOut'));
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
            'payment_id' => $request['payment_id'],
            'employee_id' => $employeeId->id,
            'shop_id' => $employeeId->shop_id
        ]);

        toast('Monto agregado correctamente', 'success');
        return back();
    }

    public function moveMoneyEdit($id)
    {
        $cash = Cash::find($id);

        // invoiceHelper get only cash or MP
        $paymentShopTemp = paymentShop();
        $paymentShop = $paymentShopTemp[1];

        $employees = Employee::where('shop_id', shopConnect()->id)
            ->get();

        return view('web.adminUser.cash._editCashMove', compact('cash', 'employees', 'paymentShop'));
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

    public function filterMoneyHistorical(Request $request)
    {
        $from = $request['from'];
        $to = $request['to'];

        $filterMoveHistorical = Cash::with(['employee','payment'])
            ->where('shop_id', shopConnect()->id)
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->get();

        $totalIn = Cash::where('shop_id', shopConnect()->id)
            ->where('type', '1')
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->sum('mount');

        $totalOut = Cash::where('shop_id', shopConnect()->id)
            ->where('type', '0')
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->sum('mount');



        return view('web.adminUser.cash.filterMoveCash', compact('filterMoveHistorical', 'from', 'to','totalIn', 'totalOut'));
    }

    public function moveMoneyDelete($id)
    {
        $cash = Cash::find($id);
        $cash->delete();

        toast('Movimiento eliminado correctamente', 'success');
        return back();
    }
}
