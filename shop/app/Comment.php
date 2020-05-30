<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function productDetail() {
        return $this->belongsTo('App\ProductDetail');
    }
}
