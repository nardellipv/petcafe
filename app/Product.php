<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'provider', 'internalCode', 'buyPrice', 'quantity', 'expire', 'slug', 'shop_id'
      ];
  
      public function Shop()
      {
          return $this->belongsTo(Shop::class);
      }

      public function Sale()
      {
          return $this->hasOne(Sale::class);
      }
}
