<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable=['user_id', 'orderdate', 'tel', 'address', 'total'];

    public function order_details(){
    	return $this->hasMany('App\Order_Detail');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
