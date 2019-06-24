<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'value',
        'quantity',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
