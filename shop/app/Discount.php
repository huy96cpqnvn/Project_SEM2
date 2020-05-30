<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public function productDetail() {
        return $this->hasMany('App\ProductDetail');
    }
}
