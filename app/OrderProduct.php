<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = "order_products";
    public $primaryKey = 'orderpro_id';
    public $timestamps = true;

    public function orders()
    {
        return $this->hasOne(Order::class, 'order_id','order_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'product_id','product_id');
    }
}
