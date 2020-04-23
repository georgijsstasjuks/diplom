<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','city','mail_index','street'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(){
        return $this->is_admin===1;
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function feedback(){
        return $this->hasMany(Feedback::class);
    }

    public function hasCompletedOrders(){
        if(Auth::check())
       $orders=$this->orders;
        foreach ($orders as $order){
            if($order->status=='Отправлен')
                return true;
        }
            return false;
    }

}
