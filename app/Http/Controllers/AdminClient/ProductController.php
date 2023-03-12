<?php

namespace App\Http\Controllers\AdminClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Product;
use App\Provider;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    public function listProduct()
    {
        $products = Product::where('shop_id', shopConnect()->id)
            ->get();

        return view('web.adminUser.products.listProduct', compact('products'));
    }

    public function addProduct()
    {
        $providers = Provider::where('shop_id', shopConnect()->id)
            ->get();

        return view('web.adminUser.products.addProduct', compact('providers'));
    }

    public function upgradeProduct(AddProductRequest $request)
    {
        $shopId = shopConnect()->id;

        if ($request->post) {
            $post = 'Si';
        } else {
            $post = 'No';
        }

        if ($request->internalCode) {
            $internalCode = $shopId . $request['internalCode'];
        } else {
            $internalCode = NULL;
        }

        $product = Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'provider' => $request['provider_id'],
            'internalCode' => $internalCode,
            'buyPrice' => $request['buyPrice'],
            'sellPrice' => $request['sellPrice'],
            'discount' => $request['discount'],
            'quantity' => $request['quantity'],
            'expire' => $request['expire'],
            'post' => $post,
            'slug' => Str::slug($request['name']),
            'shop_id' => $shopId,
        ]);


        $pathSub = 'shop/' . $shopId . '/products';

        if ($request->image) {
            $image = $request->file('image');

            $input['image500'] = '500-' . $shopId . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());


            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($pathSub . '/' . $input['image500']);

            $product->image = Str::after($input['image500'], '-');
        }

        $product->save();

        toast('Producto ' . $request['name'] . ' agregado correctamente', 'success');
        return back();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        toast('Producto ' . $product->name . ' eliminado correctamente', 'success');
        return back();
    }
}
