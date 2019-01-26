<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TracksController extends Controller
{
    public function tracks(Request $request){
        $genresQuery = DB::table('genres');
        if ($request->query("genre"))
        {
            $genresQuery->where('Name','=',$request->query("genre"));
            $selectedGenre = $genresQuery->first();

            $tracksQuery = DB::table('tracks')
                ->join('albums','tracks.AlbumId','=','albums.AlbumId')
                ->join('artists','albums.ArtistId','=','artists.ArtistId')
                ->select('tracks.Name','albums.Title as AlbumTitle',"artists.Name as ArtistName","tracks.UnitPrice")
                ->where('tracks.GenreId','=',$selectedGenre->GenreId);

            $tracks = $tracksQuery->get();

            return view('tracks', [
                'tracks' => $tracks,
            ]);




        }

    }
}
