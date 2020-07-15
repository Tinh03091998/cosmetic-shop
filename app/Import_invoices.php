<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import_invoices extends Model
{
    //
    protected $table = "import_invoices"; //connect to table in database

    public function product(){
        return $this->belongsTo(Products::class, 'pro_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
