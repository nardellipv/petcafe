<?php

namespace App\Http\Controllers\AdminClient;

use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShopProfileRequest;
use App\Payment;
use App\Payment_shop;
use App\Shop;
use Illuminate\Support\Str;
use Image;

class ShopController extends Controller
{
    public function editShop()
    {
        $shopProfile = Shop::where('user_id', userConnect()->id)
            ->first();

        $region = City::where('province_id', userConnect()->province_id)
            ->get();

        $paymentShop = Payment_shop::with('payment')
            ->where('shop_id', shopConnect()->id)
            ->get();

        $payments = Payment::all();

        return view('web.adminUser.shop.shopProfile', compact('shopProfile', 'region', 'paymentShop', 'payments'));
    }

    public function updateShop(ShopProfileRequest $request, $id)
    {
        $shop = Shop::find($id);

        $this->authorize('shopProfile', $shop);

        if ($request->phoneWsp) {
            $phoneWsp = 'Y';
        } else {
            $phoneWsp = 'N';
        }

        $shop->name = $request['name'];
        $shop->address = $request['address'];
        $shop->phone = $request['phone'];
        $shop->phoneWsp = $phoneWsp;
        $shop->about = $request['about'];
        $shop->web = $request['web'];
        $shop->instagram = $request['instagram'];
        $shop->facebook = $request['facebook'];
        $shop->slug = Str::slug($request['name']);
        $shop->city_id = $request['city_id'];

        $path = 'shop/' . $shop->id;
        $pathSub = 'shop/' . $shop->id . '/images';
        $pathSub = 'shop/' . $shop->id . '/products';

        if (!is_dir($path)) {
            mkdir('shop/' . $shop->id);
        }
        if (!is_dir($pathSub)) {
            mkdir('shop/' . $shop->id . '/images');
            mkdir('shop/' . $shop->id . '/products');
        }

        if ($request->logo) {
            $image = $request->file('logo');

            $input['logo120'] = '120x120-' . $shop->id . '-' . $image->getClientOriginalName();

            $img = Image::make($image->getRealPath());
            $img->fit(120, 120)->save($path . '/images/' . $input['logo120']);

            $shop->logo = Str::after($input['logo120'], '-');
        }

        $shop->save();

        $paymentDelete = Payment_shop::where('shop_id', $shop->id)
            ->delete();

        foreach ($request->payment_id as $payment) {
            Payment_shop::create([
                'shop_id' => $shop->id,
                'payment_id' => $payment
            ]);
        }

        toast('Perfíl de la tienda actualizado correctamente', 'success');
        return back();
    }
}
