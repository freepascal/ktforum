<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
