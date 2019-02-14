<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $table = "products";
    protected $fillable = [
        'name', 'description', 'price', 'quantity'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
