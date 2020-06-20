<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function category() {
        return $this->belongsTo('App\NewsCategory');
    }

    public function tag() {
        return $this->hasMany('App\Tag');
    }

    public function comment() {
      return $this->hasMany('App\NewsComment');
    }
}
