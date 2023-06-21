<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'phone', 'shop_id'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function Cash()
    {
        return $this->belongsTo(Cash::class);
    }

}
