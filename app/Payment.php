<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function Cash()
    {
        return $this->belongsTo(Cash::class);
    }
}
