<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }
    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
