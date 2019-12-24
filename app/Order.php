<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'location_id', 'total_amount',
    ];
    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function product()
    {
        return $this->hasOne('App\Product');
    }
    public function location()
    {
        return $this->hasOne('App\Location');
    }
}
