<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //How to set primary key as something other than id
    protected $primaryKey = 'CustomerId';

    //How to set created_at and public_at to not needed
    public $timestamps = false;
}
