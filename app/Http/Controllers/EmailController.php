<?php

namespace App\Http\Controllers;

use App\Client;
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
}
