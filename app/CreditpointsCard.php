<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditpointsCard extends Model
{
    protected $table = 'creditpoints_cards';
    protected $fillable = ['user_id', 'purchased_at', 'pin', 'value', 'useable', 'expired_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
