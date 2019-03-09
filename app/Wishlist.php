<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlists';
    protected $fillable = ['user_id', 'product_id', 'name', 'price'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
