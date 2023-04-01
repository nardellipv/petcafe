<?php

namespace App\Http\Controllers\AdminClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProviderRequest;
use App\Provider;
use App\Shop;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function listProvider()
    {
        $providers = Provider::where('shop_id', shopConnect()->id)
            ->get();

        return view('web.adminUser.providers.listProvider', compact('providers'));
    }

    public function editProvider($id)
    {
        $provider = Provider::find($id);

        $this->authorize('view', $provider);
        
        return view('web.adminUser.providers.editProvider', compact('provider'));
    }

    public function updateProvider(AddProviderRequest $request, $id)
    {
        $provider = Provider::find($id);

        $this->authorize('update', $provider);

        $provider->name = $request['name'];
        $provider->email = $request['email'];
        $provider->phone = $request['phone'];
        $provider->phone2 = $request['phone2'];
        $provider->address = $request['address'];
        $provider->comment = $request['comment'];
        $provider->save();

        toast('Proveedor editado correctamente','success');
        return back();
    }

    public function upgradeProvider(AddProviderRequest $request)
    {

        Provider::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'phone2' => $request['phone2'],
            'comment' => $request['comment'],
            'email' => $request['email'],
            'shop_id' => shopConnect()->id,
        ]);

        toast('Proveedor agregado correctamente','success');
        return back();
    }

    public function deleteProvider($id)
    {
        $provider = Provider::find($id);

        $this->authorize('delete', $provider);

        $provider->delete();

        toast('Proveedor eliminado correctamente','success');
        return back();
    }
}
