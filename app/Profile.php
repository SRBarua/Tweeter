<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
    public function followers()
    {
        return $this->belongsToMany('App\User');
    }
    public function tweets()
    {
        return $this->hasMany('App\tweet');
    }
}
