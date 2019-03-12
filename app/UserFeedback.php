<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    protected $table = 'user_feedbacks';
    protected $fillable = ['subject', 'description', 'user_name', 'read'];

}
