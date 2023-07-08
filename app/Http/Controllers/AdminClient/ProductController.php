<?php

namespace App\Http\Controllers\AdminClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\AddStockRequest;
use App\Order;
use App\Product;
use App\Provider;
use App\Sale;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    public function listProduct()
    {
        $products = Product::with(['provider'])
            ->where('shop_id', shopConnect()->id)
            ->get();

        return view('web.adminUser.products.listProduct', compact('products'));
    }

    public function editProduct($id)
    {
        $product = Product::find($id);

        $this->authorize('view', $product);

        $providers = Provider::where('shop_id', shopConnect()->id)
            ->get();

        $provider = Provider::find($product->provider);

        return view('web.adminUser.products.editProduct', compact('product', 'providers', 'provider'));
    }

    public function updateProduct(AddProductRequest $request, $id)
    {
        $product = Product::find($id);

        $this->authorize('update', $product);

        if ($request->post) {
            $post = 'Si';
        } else {
            $post = 'No';
        }

        $product->name = $request['name'];
        $product->provider_id = $request['provider_id'];
        $product->description = $request['description'];
        $product->buyPrice = $request['buyPrice'];
        $product->sellPrice = $request['sellPrice'];
        $product->discount = $request['discount'];
        // $product->internalCode = $request['internalCode'];
        $product->quantity = $request['quantity'];
        $product->expire = $request['expire'];
        $product->post = $post;

        $pathSub = 'shop/' . $product->shop_id . '/products';

        if ($request->image) {
            $image = $request->file('image');

            $input['image500'] = '500-' . $product->shop_id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());


            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($pathSub . '/' . $input['image500']);

            $product->image = Str::after($input['image500'], '-');
        }

        $product->save();

        return back();
    }

    public function showProduct($id)
    {
        $product = Product::find($id);

        $this->authorize('view', $product);

        return view('web.adminUser.products.showProduct', compact('product'));
    }

    public function addProduct()
    {
        $providers = selectProvider();


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

        $internalCodeCheckTemp = shopConnect()->id .'-'. $request['internalCode'];
        $internalCodeCheck = Product::where('internalCode', $internalCodeCheckTemp)
            ->first();

        if ($internalCodeCheck){
            return back()->withErrors(['msg' => 'El código interno ya se encuentra registrado para otro producto'])->withInput();
        }


            $product = Product::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'internalCode' => $internalCodeCheckTemp,
                'buyPrice' => $request['buyPrice'],
                'sellPrice' => $request['sellPrice'],
                'discount' => $request['discount'],
                'quantity' => $request['quantity'],
                'expire' => $request['expire'],
                'post' => $post,
                'slug' => Str::slug($request['name']),
                'provider_id' => $request['provider_id'],
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

        if ($request['orderId']) {
            $updateOder = Order::where('id', $request['orderId'])
                ->first();
            $updateOder->status = '2';
            $updateOder->save();


            toast('Producto ' . $request['name'] . ' agregado correctamente', 'success');
            return redirect()->action('AdminClient\OrderController@listOrder');
        }

        toast('Producto ' . $request['name'] . ' agregado correctamente', 'success');
        return back();
    }

    public function postProduct($id)
    {
        $product = Product::find($id);

        $this->authorize('update', $product);

        $product->post = 'Si';
        $product->save();

        toast('Producto ' . $product->name . ' publicado correctamente', 'success');
        return back();
    }

    public function unpostProduct($id)
    {
        $product = Product::find($id);

        $this->authorize('update', $product);

        $product->post = 'No';
        $product->save();

        toast('Producto ' . $product->name . ' despublicado correctamente', 'success');
        return back();
    }

    public function addStockProduct(AddStockRequest $request, $id)
    {
        $product = Product::find($id);

        $this->authorize('update', $product);

        $product->quantity = $request['quantity'];
        $product->save();

        toast('Se agregó stock al producto ' . $product->name . ' correctamente', 'success');
        return back();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        $this->authorize('delete', $product);

        $product->delete();

        toast('Producto ' . $product->name . ' eliminado correctamente', 'success');
        return redirect()->action('AdminClient\ProductController@listProduct');
    }
}
