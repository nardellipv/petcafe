<?php

namespace App\Http\Controllers\AdminClient;

use App\City;
use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use App\Sale;
use Illuminate\Support\Facades\DB;

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
            ->whereBetween('quantity', [0, 100])
            ->take(10)
            ->get();

        $sales = Sale::with('product')
            ->where('shop_id', shopConnect()->id)
            ->whereMonth('created_at', date('m'))
            ->get();

        // chart chart-container-0
        $chartSales = Sale::with('product')
            ->where('shop_id', shopConnect()->id)
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        // chart chart-container-1
        $chartsalesProducCount = Sale::with('product')
            ->where('shop_id', shopConnect()->id)
            ->whereMonth('created_at', date('m'))
            ->sum('quantity');

            // chart mejores clientes 
            $topBestClient = Sale::with(['client'])
            ->with('product')
            ->where('shop_id', shopConnect()->id)
            ->whereNotIn('client_id', [0])
            ->groupBy('client_id')            
            ->orderBy('sellPrice','DESC')
            ->take(10)
            ->get();
            
        $salesSum = Sale::with('product')
            ->where('shop_id', shopConnect()->id)
            ->whereMonth('created_at', date('m'))
            ->sum('sellPrice');

        return view('web.adminUser.index', compact(
            'cityClient',
            'clients',
            'stocks',
            'sales',
            'clientsCount',
            'salesSum',
            'chartSales',
            'chartsalesProducCount',
            'topBestClient'
        ));
    }
}
