<?php

namespace App\Http\Controllers\AdminClient;

use App\City;
use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddClientRequest;

class ClientController extends Controller
{
    public function listClient()
    {
        $clients = Client::with(['city'])
            ->where('shop_id', shopConnect()->id)
            ->get();

        return view('web.adminUser.clients.listClient', compact('clients'));
    }

    public function addNewClient()
    {
        $cityClients = City::where("province_id", userConnect()->province_id)
            ->get();

        return view('web.adminUser.clients.addClient', compact('cityClients'));
    }

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

        toast('Cliente agregado correctamente', 'success');
        return back();
    }

    public function editClient($id)
    {
        $client = Client::find($id);

        $this->authorize('update', $client);

        $cityClients = City::where("province_id", userConnect()->province_id)
            ->get();

        return view('web.adminUser.clients.editClient', compact('client','cityClients'));
    }

    public function upgradeClient(AddClientRequest $request, $id)
    {
        $client = Client::find($id);
        
        $client->name = $request['name'];
        $client->phone = $request['phone'];
        $client->email = $request['email'];
        $client->address = $request['address'];
        $client->city_id = $request['city_id'];
        $client->save();

        toast('Cliente modificado correctamente', 'success');
        return back();
    }

    public function deleteClient($id)
    {
        $client = Client::find($id);

        $this->authorize('delete', $client);
        
        $client->delete();

        toast('Cliente eliminado correctamente', 'success');
        return back();
    }
}
