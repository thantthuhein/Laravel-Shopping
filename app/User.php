<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_Admin' ,'email', 'password', 'phone', 'banned_at', 'credit_points'
    ];
    protected $date = [
        'banned_at'
    ];


    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function creditpointscards()
    {
        return $this->hasMany('App\CreditpointsCard');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Wishlist');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
