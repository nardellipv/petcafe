<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function Shop()
    {
        return $this->hasMany(Shop::class);
    }

    public function Province()
    {
        return $this->belongsTo(Province::class);
    }

}
