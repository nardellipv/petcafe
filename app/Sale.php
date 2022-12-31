<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'invoice', 'quantity', 'date', 'status', 'mount', 'discount', 'customer_id', 'stock_id', 'shop_id'
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
}
