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
    }
}
