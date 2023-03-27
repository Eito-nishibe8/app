<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['team_name', 'email', 'area', 'level', 'time', 'user_id', 'team_icon', 'profile'];

    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id', 'user_id');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
}
