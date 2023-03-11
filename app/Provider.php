<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'phone2', 'email', 'comment', 'shop_id'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
