<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    //How to set primary key as something other than id
    protected $primaryKey = 'TrackId';

    //How to set created_at and public_at to not needed
    public $timestamps = false;

    //X to many
    //Track belongs to many playlists
    //playlist_track is the generated relationary table that needs the primary keys of both objects specified
    public function playlists()
    {
        return $this->belongsToMany('App\Playlist', 'playlist_track', 'TrackId','PlaylistId');
    }
    //how to relate many to one
    public function genre()
    {
        return $this->belongsTo('App\Genre','GenreId');
    }
}
