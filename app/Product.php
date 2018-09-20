<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name', 'category_id', 'price', 'quantity', 'screen', 'os', 'camera', 'frontcamera', 'cpu', 'ram', 'memory', 'sim', 'pin', 'warranty'];
	
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function order_details(){
    	return $this->hasMany('App\Order_Detail');
    }

    public function reviews(){
    	return $this->hasMany('App\Review');
    }

    public function images(){
    	return $this->hasMany('App\Image');
    }
}
