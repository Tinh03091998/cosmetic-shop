<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table="contacts";

    public function customers(){
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }
}
