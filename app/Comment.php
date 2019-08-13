<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    // Carbon instance fields
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    // fields can be filled
    protected $fillable = ['body', 'tweet_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
    public function replies()
    {
        return $this->hasMany('App\Reply', 'parent_id');
    }

}
