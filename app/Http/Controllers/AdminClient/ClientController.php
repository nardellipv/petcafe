<?php

namespace App\Http\Controllers\AdminClient;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddClientRequest;

class ClientController extends Controller
{
    public function addClient(AddClientRequest $request)
    {
        Client::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'shop_id' => shopConnect()->id,
            'city_id' => $request['city_id'],
        ]);

        toast('Cliente agregado correctamente','success');
        return back();
    }
}
