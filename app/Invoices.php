<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';

    public function customers(){
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }

    public function invoice_details(){
        return $this->hasMany(Invoice_details::class, 'invoice_id', 'id');
    }
}
