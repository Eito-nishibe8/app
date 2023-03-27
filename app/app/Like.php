<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function like_exist($user_id, $team_id)
    {
        return Like::where('user_id', $user_id)->where('team_id', $team_id)->exists();
    }

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
