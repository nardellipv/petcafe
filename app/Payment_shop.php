<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_shop extends Model
{
    protected $fillable = [
        'shop_id', 'payment_id'
    ];

    public $timestamps = false;

    public function Payment()
    {
        return $this->belongsTo(Payment::class);
    }


    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
