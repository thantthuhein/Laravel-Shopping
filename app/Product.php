<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $table = "products";
    protected $fillable = [
        'name', 'description', 'price', 'quantity', 'imagePath', 'colors', 'processor',
        'ghz', 'graphics', 'memory', 'storage', 'display', 'ports'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

}
