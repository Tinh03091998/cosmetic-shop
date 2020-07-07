<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";

    protected $fillable = [
        'pro_id',
        'customer_id',
        'content',
    ];

    public function products(){
        return $this->belongsToMany('App\Products', 'pro_id', 'id');
    }

    public function customers(){
        return $this->belongsTo('App\Customers', 'customer_id', 'id');
    }
}
