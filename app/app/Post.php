<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['team_name', 'email', 'area', 'level', 'time','user_id','team_icon', 'profile'];
    
}
