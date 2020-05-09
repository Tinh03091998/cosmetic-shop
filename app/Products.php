<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "Products";

    public function categories(){
        return $this->belongsTo('App\Categories', 'cat_id', 'id');
    }

    public function comments(){
        return $this->hasMany('App\Comments', 'product_id', 'id');
    }
}
