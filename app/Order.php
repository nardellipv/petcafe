<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'quantity', 'note', 'provider_id', 'shop_id', 'status', 'internalCode'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function Provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
