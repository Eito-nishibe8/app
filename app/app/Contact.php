<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['user_id', 'team_id', 'message', 'email', 'tel'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
