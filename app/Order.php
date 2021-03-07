<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    public $primaryKey = 'order_id';
    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id','product_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id','user_id');
    }
    public function orderProducts()
    {
        return $this->belongsTo(OrderProduct::class, 'orderpro_id','orderpro_id');
    }
}
