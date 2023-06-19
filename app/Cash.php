<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [
        'income', 'expenses', 'user_id', 'city_id','phone', 'shop_id'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
