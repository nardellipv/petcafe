<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'quantity', 'sellPrice', 'status', 'payment', 'comment', 'sellMount', 'invoice', 'client_id', 'shop_id', 'product_id'
    ];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

}
