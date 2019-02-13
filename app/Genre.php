<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //How to set primary key as something other than id
    protected $primaryKey = 'GenreId';

    //How to set created_at and public_at to not needed
    public $timestamps = false;

    //How to set up one to many relationship
    public function tracks()
    {
        return $this->hasMany('App\Track','GenreId');
    }
}
