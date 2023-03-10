<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'invoice', 'quantity', 'date', 'status', 'mount', 'discount', 'client_id', 'stock_id', 'shop_id'
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
