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
            'web.adminUser.cash.dashboardCash',
            'web.adminUser.parts._addClientDashboard'
        ], function ($view) {

            $employeeIsOnline = Employee::where('shop_id', shopConnect()->id)
                ->where('isOnline', 1)
                ->first();

            $view->with('employeeIsOnline', $employeeIsOnline);
        });

        view::composer('layouts.mainAdminSite', function ($view) {

            $client = new \GuzzleHttp\Client();

            $response = $client->request('GET', 'https://weatherapi-com.p.rapidapi.com/forecast.json?q=auto:ip&days=1&lang=es', [
                'headers' => [
                    'X-RapidAPI-Host' => 'weatherapi-com.p.rapidapi.com',
                    'X-RapidAPI-Key' => '81004d67b2msh3b2ae134dc18a89p10a252jsn9c542b738f03',
                ],
            ]);


            $temp = json_decode($response->getBody());
            $view->with('temp', $temp);
        });
    }
}
