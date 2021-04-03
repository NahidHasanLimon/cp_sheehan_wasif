<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'status', 'area_id','address','identification_number','date'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function area()
    {
        return $this->belongsTo('App\Area');
    }
    public function order_items()
    {
        return $this->hasMany('App\OrderItem');
    }
}
