<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [
        'mount', 'comment', 'type', 'payment_id', 'employee_id', 'shop_id'
    ];

    public function Shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function Payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
