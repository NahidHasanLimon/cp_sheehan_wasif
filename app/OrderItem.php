<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = [
        'order_id', 'product_id','quantity',
    ];
    public $timestamps = false;
    
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
