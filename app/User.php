<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const CUSTOMER_TYPE = 0;
    const ADMIN_TYPE = 1;
    protected $fillable = [
        'name', 'email', 'password', 'tel', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function user_activations(){
        return $this->hasMany('App\User_Activation');
    }
}
