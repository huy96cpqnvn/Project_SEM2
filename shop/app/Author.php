<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function productDetail() {
        return $this->hasMany('App\ProductDetail');
    }
}
