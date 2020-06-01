<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function author() {
        return $this->belongsTo('App\Author');
    }

    public function language() {
        return $this->belongsTo('App\Language');
    }

    public function priceFilter() {
        return $this->belongsTo('App\PriceFilter');
    }

    public function publisher() {
        return $this->belongsTo('App\Publisher');
    }

    public function discount() {
        return $this->belongsTo('App\Discount');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
