<?php

namespace App\Http\Controllers\AdminClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Product;
use App\Sale;

class InvoiceController extends Controller
{
    public function registerSaleInvoice(UpdateInvoiceRequest $request)
    {

        $salePending = Sale::with(['product'])
            ->where('shop_id', shopConnect()->id)
            ->where('status', '0')
            ->get();

        $total = Sale::where('shop_id', shopConnect()->id)
            ->where('status', '0')
            ->sum('sellPrice');

        // reducir stock en productos
        foreach ($salePending as $sale) {
            $stockReduce = Product::where('id', $sale->product_id)
                ->first();

            $stockReduce->quantity = $stockReduce->quantity - $sale->quantity;
            $stockReduce->save();
        }

        // cambio de status en tabla sale
        foreach ($salePending as $sale) {
            $statusChange = Sale::where('shop_id', shopConnect()->id)
                ->where('status', '0')
                ->first();

            // tomo el id del invoice
            $invoiceId = $statusChange->invoice;

            $statusChange->status = '1';
            $statusChange->payment = $request['payment'];
            $statusChange->client_id = $request['client_id'];
            $statusChange->save();
        }

        $invoiceInfo = Sale::where('invoice', $invoiceId)
            ->get();

        return view('web.adminUser.sales.invoice', compact('salePending', 'total', 'invoiceInfo', 'statusChange'));
    }

    public function monthListInvoice()
    {

        $sales = Sale::with(['product', 'client'])
            ->where('shop_id', shopConnect()->id)
            ->where('status', '1')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->groupBy('invoice')
            ->selectRaw('*, sum(sellPrice) as total')
            ->get();

        return view('web.adminUser.sales.listMonthInvoice', compact('sales'));
    }

    public function historyShowInvoice($invoice)
    {
        $invoiceProducts = Sale::with(['product'])
            ->where('invoice', $invoice)
            ->get();

        $invoiceTotal = Sale::where('invoice', $invoice)
            ->sum('sellPrice');

        $invoiceInfo = Sale::where('invoice', $invoice)
            ->first();

        return view('web.adminUser.sales.showInvoice', compact('invoiceProducts', 'invoiceInfo', 'invoiceTotal'));
    }

    public function historicalShowInvoice()
    {
        $sales = Sale::with(['product', 'client'])
        ->where('shop_id', shopConnect()->id)
        ->where('status', '1')        
        ->groupBy('invoice')
        ->selectRaw('*, sum(sellPrice) as total')
        ->get();

        return view('web.adminUser.sales.listHistoricalSales', compact('sales'));
    }
}
