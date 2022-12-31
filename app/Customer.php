<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'city_id','phone', 'shop_id'
    ];

    public function Shop()
    {
        return $this->hasOne(Shop::class);
    }

    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class);
    }
}
