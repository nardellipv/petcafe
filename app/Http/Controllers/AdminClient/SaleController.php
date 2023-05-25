<?php

namespace App\Http\Controllers\AdminClient;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSaleRequest;
use App\Product;
use App\Sale;

class SaleController extends Controller
{
    public function addSale()
    {
        $sale = Sale::where('shop_id', shopConnect()->id)
            ->first();

        if ($sale) {
            $this->authorize('view', $sale);
        }

        $clients = Client::where('shop_id', shopConnect()->id)
            ->get();

        // invoiceHelper querys sum and total product            
        $productTemp = quantityAndSumProducts();
        $sumProductTemp = quantityAndSumProducts();
        $sumTotalTemp = quantityAndSumProducts();

        $products = $productTemp[0];
        $sumProduct = $sumProductTemp[1];
        $sumTotal = $sumTotalTemp[2];

        // invoiceHelper medios de pagos elegidos por el pet
        $payments = paymentShop();

        // invoiceHelper selecciono los productos agregados
        $productsAdded = productAdded();

        return view('web.adminUser.sales.addSale', compact('products', 'productsAdded', 'sumProduct', 'sumTotal', 'clients', 'payments'));
    }

    public function productChooseSale($id)
    {
        $sale = Sale::where('shop_id', shopConnect()->id)
            ->first();

        if ($sale) {
            $this->authorize('view', $sale);
        }

        $productChoose = Product::find($id);

        $clients = Client::where('shop_id', shopConnect()->id)
            ->get();

        // invoiceHelper medios de pagos elegidos por el pet
        $payments = paymentShop();

        // invoiceHelper querys sum and total product            
        $productTemp = quantityAndSumProducts();
        $sumProductTemp = quantityAndSumProducts();
        $sumTotalTemp = quantityAndSumProducts();

        $products = $productTemp[0];
        $sumProduct = $sumProductTemp[1];
        $sumTotal = $sumTotalTemp[2];

        // invoiceHelper selecciono los productos agregados
        $productsAdded = productAdded();

        return view('web.adminUser.sales.addSale', compact(
            'products',
            'productChoose',
            'productsAdded',
            'sumProduct',
            'sumTotal',
            'clients',
            'payments'
        ));
    }

    public function productAddSale(AddSaleRequest $request)
    {
        $sale = Sale::where('shop_id', shopConnect()->id)
            ->first();

        if ($sale) {
            $this->authorize('update', $sale);
        }

        // invoiceHelper medios de pagos elegidos por el pet
        $payments = paymentShop();

        Sale::create([
            'quantity' => $request['quantity'],
            'sellPrice' => $request['quantity'] * $request['sellPrice'],
            'status' => '0',
            'comment' => $request['comment'],
            'invoice' => invoiceNumberTemp(),
            'shop_id' => shopConnect()->id,
            'product_id' => $request['product_id'],
        ]);

        $clients = Client::where('shop_id', shopConnect()->id)
            ->get();


        // invoiceHelper querys sum and total product            
        $productTemp = quantityAndSumProducts();
        $sumProductTemp = quantityAndSumProducts();
        $sumTotalTemp = quantityAndSumProducts();

        $products = $productTemp[0];
        $sumProduct = $sumProductTemp[1];
        $sumTotal = $sumTotalTemp[2];

        // invoiceHelper selecciono los productos agregados
        $productsAdded = productAdded();

        toast('Producto agregado correctamente', 'success');
        return view('web.adminUser.sales.addSale', compact('productsAdded', 'products', 'sumProduct', 'sumTotal', 'clients', 'payments'));
    }

    public function productDeleteSale($id)
    {
        $product = Sale::find($id);

        if ($product) {
            $this->authorize('delete', $product);
        }

        $product->delete();

        toast('Producto eliminado correctamente', 'success');
        return redirect()->action('AdminClient\SaleController@addSale');
    }
}
