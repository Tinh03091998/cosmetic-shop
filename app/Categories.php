<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "Categories"; //connect to table in database
    //connect to tables
    //connect to tale: menu
    public function menu(){
        return $this->hasMany('App\Menu', 'cat_id', 'id');
    }

    //connect to table: products
    public function products(){
        return $this->hasMany('App\Products', 'cat_id', 'id');
    }
}
