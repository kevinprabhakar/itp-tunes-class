<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class PlaylistController extends Controller
{
    public function index($playlistId = null)
    {
        $playlists = DB::table('playlists')->get();
        if ($playlistId){
            $tracks = DB::table('tracks')
                ->join('playlist_track','tracks.TrackId','=','playlist_track.TrackId')
                ->where('PlaylistId','=',$playlistId)
                ->get();
        }else{
            $tracks = [];
        }
        return view('playlist.index',[
            'playlists' => $playlists,
            'tracks' => $tracks
        ]);
    }
    public function create()
    {
        return view('playlist.create');
    }
    public function store(Request $request)
    {
        //Validate namespace
        //if validation fails, redirect back to form with errors
        //otherwise insert the playlist into the db
        //redirect back to /playlists
        $input = $request->all();
        $validation = Validator::make($input, [
            'name' => 'required|min:5|unique:playlists,Name',
        ]);

        if ($validation->fails())
        {
            return redirect('/playlists/new')
                ->withInput()
                ->withErrors($validation);

        }

        DB::table('playlists')->insert([
            'Name' => $request->name
        ]);
        return redirect('/playlists');
    }
}
