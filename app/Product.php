<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'internalCode', 'image', 'buyPrice', 'sellPrice', 'discount', 'quantity', 'expire', 'post', 'slug', 'provider_id', 'shop_id'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function Sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function Provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
