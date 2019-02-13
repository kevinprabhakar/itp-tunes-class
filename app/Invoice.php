<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //How to set primary key as something other than id
    protected $primaryKey = 'InvoiceId';

    //How to set created_at and public_at to not needed
    public $timestamps = false;

    public function invoice_items()
    {
        return $this->hasMany('App\Invoice_Item','InvoiceLineId');
    }
}
