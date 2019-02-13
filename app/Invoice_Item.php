<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_Item extends Model
{
    //How to relate specific table to model
    protected $table = 'invoice_items';

    //How to set primary key as something other than id
    protected $primaryKey = 'InvoiceLineId';

    //How to set created_at and public_at to not needed
    public $timestamps = false;

    public function invoice()
    {
        return $this->belongsTo('App\Invoice','InvoiceId');
    }
}
