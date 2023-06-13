<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\Provider;
use App\Sale;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function invoiceClienteMail($idInvoice, $idClient, $total)
    {

        $dataInvoice = Sale::where('invoice', $idInvoice)
            ->first();

        $dataSale = Sale::with(['product'])
            ->where('invoice', $idInvoice)
            ->get();

        $dataClient = Client::find($idClient);

        Mail::send('mail.client.InvoiceMail', ['dataSale' => $dataSale, 'dataInvoice' => $dataInvoice, 'dataClient' => $dataClient, 'total' => $total], function ($msj) use ($dataClient) {
            $msj->from(shopConnect()->user->email, shopConnect()->name);
            $msj->subject('Recibo de Compra');
            $msj->to($dataClient->email);
        });
    }

    public function sendingOrderEmail($provider_id)
    {

        $orders = Order::where('shop_id', shopConnect()->id)
            ->where('status', '0')
            ->get();
        
            foreach ($orders as $order) {
            $order->status = '1';
            $order->save();
        }

        $provider = Provider::find($provider_id);


        Mail::send('mail.client.orderMail', ['orders' => $orders], function ($msj) use ($provider) {
            $msj->from(shopConnect()->user->email, shopConnect()->name);
            $msj->subject('Pedido de Compra');
            $msj->to($provider->email);
        });
    }
}
