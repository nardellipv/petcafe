<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;

    public function Shop()
    {
        return $this->hasMany(Shop::class);
    }
}
