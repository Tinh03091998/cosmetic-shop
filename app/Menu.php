<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menus";

    //connect to table: categories
    public function categories(){
        return $this->belongsTo('App\Categoris', 'cat_id', 'id');
    }
}
