<?php

namespace App\Providers;

use App\Employee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('layouts.mainAdminSite', function () {

            Cookie::queue('idShopOnline', shopConnect()->id);
            Cookie::queue('timeEmployeeOnline', Carbon::now());
        });

        view::composer([
            'web.adminUser.parts._menu', 
            'web.adminUser.parts._chooseEmploye',
            'web.adminUser.employee.listEmployee',
            'web.adminUser.cash.dashboardCash'
        ], function ($view) {

            $employeeIsOnline = Employee::where('shop_id', shopConnect()->id)
                ->where('isOnline', 1)
                ->first();

            $view->with('employeeIsOnline', $employeeIsOnline);
        });
    }
}
