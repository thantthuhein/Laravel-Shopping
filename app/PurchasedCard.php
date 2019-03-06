<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasedCard extends Model
{
    protected $table = 'purchased_cards';

    protected $fillable = ['user_id', 'card_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
