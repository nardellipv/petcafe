<?php

namespace App\Http\Controllers\AdminClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProviderRequest;
use App\Product;
use App\Provider;

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

        toast('Proveedor editado correctamente', 'success');
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

        toast('Proveedor agregado correctamente', 'success');
        return back();
    }

    public function deleteProvider($id)
    {
        $provider = Provider::find($id);

        $this->authorize('delete', $provider);

        // corroboro que no tenga productos asociados
        $invoiceCliente = Product::where('shop_id', shopConnect()->id)
            ->where('provider_id', $id)
            ->first();

        if ($invoiceCliente) {
            toast('El proveedor tiene productos asociados. No se puede eliminar este el proveedor', 'warning');
            return back();
        }

        $provider->delete();

        toast('Proveedor eliminado correctamente', 'success');
        return back();
    }
}
