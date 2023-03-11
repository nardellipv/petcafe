<?php

namespace App\Http\Controllers\AdminClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Product;
use Illuminate\Http\Request;

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
        return view('web.adminUser.products.addProduct');
    }

    public function upgradeProduct(AddProductRequest $request)
    {
        dd($request);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();

        toast('Producto ' . $product->name . ' eliminado correctamente', 'success');
        return back();
    }
}
