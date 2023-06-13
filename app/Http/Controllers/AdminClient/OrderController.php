<?php

namespace App\Http\Controllers\AdminClient;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewPendingOrderRequest;
use App\Order;
use App\Product;

class OrderController extends Controller
{
    public function listOrder()
    {
        $orders = Order::with(['provider'])
            ->where('shop_id', shopConnect()->id)
            ->where('status', '!=', '2')
            ->get();

        return view('web.adminUser.providers.order', compact('orders'));
    }

    public function newOrder()
    {
        $providers = selectProvider();

        $products = Product::where('shop_id', shopConnect()->id)
            ->get();

        $orderPending = Order::with(['provider'])
            ->where('shop_id', shopConnect()->id)
            ->where('status', '0')
            ->get();

        $providerChoose = Order::select('provider_id')
            ->where('shop_id', shopConnect()->id)
            ->where('status', '0')
            ->first();

        return view('web.adminUser.providers.addNewOrder', compact('providers', 'products', 'orderPending', 'providerChoose'));
    }

    public function newPendingOrder(NewPendingOrderRequest $request)
    {
        if ($request['idProduct']) {
            $productData = Product::where('shop_id', shopConnect()->id)
                ->where('id', $request['idProduct'])
                ->first();

            $product = $productData->name;
            $internalCode = $productData->internalCode;
        }
        if ($request['name']) {
            $product = $request['name'];
            $internalCode = "";
        }

        if (!$request['name'] and !$request['idProduct']) {
            toast('Debe completar el campo Producto', 'warning');
            return back();
        }

        Order::create([
            'name' => $product,
            'quantity' => $request['quantity'],
            'note' => $request['note'],
            'provider_id' => $request['provider_id'],
            'status' => '0',
            'shop_id' => shopConnect()->id,
            'internalCode' => $internalCode,
        ]);

        toast('Producto agregado correctamente', 'success');
        return back();
    }

    public function addingStockPendingOrder($order, $stock)
    {

        $addingStock = Product::where('shop_id', shopConnect()->id)
            ->where('internalCode', $order)
            ->first();

        $addingStock->quantity = $stock;
        $addingStock->save();


        $orderReceived = Order::where('shop_id', shopConnect()->id)
            ->where('internalCode', $order)
            ->first();

        $orderReceived->status = '2';
        $orderReceived->save();

        toast('Stock agregado al producto correctamente', 'success');
        return back();
    }

    public function addingAddProductOrder($id)
    {
        $productOrder = Order::find($id);

        return view('web.adminUser.products.addProductOrder', compact('productOrder'));
    }

    public function historicalOrder()
    {
        $ordersHistorical = Order::with(['provider'])
            ->where('shop_id', shopConnect()->id)
            ->where('status', '2')
            ->get();

        return view('web.adminUser.providers.historicalOrders', compact('ordersHistorical'));
    }

    public function deletePendingOrder($id)
    {
        $order = Order::find($id);
        $order->delete();

        toast('Pedido eliminado correctamente', 'success');
        return back();
    }

    public function step1ConfirmOrder()
    {
        $orders = Order::where('shop_id', shopConnect()->id)
            ->where('status', '0')
            ->get();

        foreach ($orders as $order) {
            $order->status = '1';
            $order->save();
        }

        $showOrders = Order::with(['provider'])
            ->where('shop_id', shopConnect()->id)
            ->where('status', '1')
            ->get();

        $providerChoose = Order::select('provider_id')
            ->where('shop_id', shopConnect()->id)
            ->where('status', '1')
            ->first();

        $orderPending = Order::with(['provider'])
            ->where('shop_id', shopConnect()->id)
            ->where('status', '1')
            ->get();


        return view('web.adminUser.providers.orderConfirmStep1', compact('showOrders', 'providerChoose', 'orderPending'));
    }
}
