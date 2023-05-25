<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceClientMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function invoiceClienteMail(Request $request)
    {
        $data = [
            'name' => $request['name'],
        ];

        Mail::to('info@avisosmendoza.com.ar')->send(new InvoiceClientMail($data));
    }
}
