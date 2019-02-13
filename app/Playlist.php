<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    //How to set primary key as something other than id
    protected $primaryKey = 'PlaylistId';

    //How to set created_at and public_at to not needed
    public $timestamps = false;

    public function tracks()
    {
        return $this->belongsToMany('App\Track','playlist_track','PlaylistId','TrackId');
    }
}
