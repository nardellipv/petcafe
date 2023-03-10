<?php

namespace App\Http\Middleware;

use App\Shop;
use Closure;

class ProfileOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $shop = Shop::where('user_id', userConnect()->id)
            ->first();

        if($shop->name != NULL) {
            return $next($request);
        }else{
            return redirect('/perfil-tienda');
        }
    }
}
