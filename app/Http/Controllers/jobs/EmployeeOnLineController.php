<?php

namespace App\Http\Controllers\Jobs;

use App\Employee;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;

class EmployeeOnLineController extends Controller
{
    public function isOnline()
    {
        $idShopOnline = Cookie::get('idShopOnline');
        $timeEmployeeOnline = Cookie::get('timeEmployeeOnline');

        $timeNow = Carbon::now();

        $isOnline = $timeNow->diffInMinutes($timeEmployeeOnline);

        if ($isOnline >= '1') {
            $employeeOnline = Employee::where('shop_id', $idShopOnline)
                ->where('isOnline', 1)
                ->first();

            $employeeOnline->isOnline = '0';
            $employeeOnline->save();
        }
    }
}
