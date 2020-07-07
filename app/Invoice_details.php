<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    protected $table = 'invoice_details';

    public function invoices(){
        return $this->belongsTo(Invoices::class, 'invoice_id', 'id');
    }
    public function products(){
        return $this->belongsTo(Products::class,'pro_id', 'id');
    }
}
