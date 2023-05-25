<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'phoneWsp', 'about', 'votes', 'visit', 'web', 'instagram', 'facebook', 'logo', 'slug', 'status',
        'user_id', 'city_id', 'type'
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

    public function Payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function Provider()
    {
        return $this->hasMany(Provider::class);
    }
}
