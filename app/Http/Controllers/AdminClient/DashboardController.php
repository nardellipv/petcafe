<?php

namespace App\Http\Controllers\AdminClient;

use App\City;
use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $cityClient = City::where("province_id", userConnect()->province_id)
            ->get();

        $clients = Client::with(['city'])
        ->where('shop_id', shopConnect()->id)
            ->get();

        $clientsCount = Client::where('shop_id', shopConnect()->id)
            ->count();

        $stocks = Product::where('shop_id', shopConnect()->id)
            ->orderBy('quantity', 'ASC')
            ->take(10)
            ->get();

        $sales = Sale::with('product')
            ->where('shop_id', shopConnect()->id)
            ->whereMonth('date', date('m'))
            ->get();

        $salesSum = Sale::with('product')
            ->where('shop_id', shopConnect()->id)
            ->whereMonth('date', date('m'))
            ->sum('mount');

        return view('web.adminUser.index', compact(
            'cityClient',
            'clients',
            'stocks',
            'sales',
            'clientsCount',
            'salesSum'
        ));
    }
}
