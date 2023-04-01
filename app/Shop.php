<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'phoneWsp', 'web', 'instagram', 'facebook', 'logo', 'slug', 'about', 'votes_positive', 
        'user_id', 'province_id', 'city_id', 'visit', 'type'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class);
    }

    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function Provider()
    {
        return $this->hasMany(Provider::class);
    }
}
