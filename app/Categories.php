<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "categories"; //connect to table in database
    //connect to tables
    //connect to tale: menu

    //connect to table: products
    public function products(){
        return $this->hasMany('App\Products', 'cat_id', 'id');
    }
}
