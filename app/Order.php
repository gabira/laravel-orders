<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'quantity',
        'value',
        'customer',
        'cep',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'employee',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
