<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

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
        }else{
            $tracks = DB::table('tracks')
            ->join('albums','tracks.AlbumId','=','albums.AlbumId')
            ->join('artists','albums.ArtistId','=','artists.ArtistId')
            ->select('tracks.Name','albums.Title as AlbumTitle',"artists.Name as ArtistName","tracks.UnitPrice")
            ->get();
            return view('tracks',[
                'tracks' => $tracks,
            ]);
        }

    }
    public function showTracks(Request $request){
        return view('showTracks', [

        ]);
    }

    public function showTrackAdd(){
        $albums = DB::table('albums')->get();
        $genres = DB::table('genres')->get();
        $media_types = DB::table('media_types')->get();
        return view('addTrack', [
            'albums' => $albums,
            'genres' => $genres,
            'media_types' => $media_types
        ]);
    }

    public function addTrack(Request $request){
        $input = $request->all();
        $validation = Validator::make($input, [
            'name' => 'required',
            'albumSelect' => 'required',
            'mediaTypeSelect' => 'required',
            'genreSelect' => 'required',
            'milliseconds' =>'required|numeric',
            'bytes'=>'required|numeric',
            'unitPrice'=>'required|numeric',
            'composer'=>'required',
        ]);

        if ($validation->fails())
        {
            return redirect('/tracks/new')
                ->withInput()
                ->withErrors($validation);
        }

        $album = DB::table('albums')->where('Title','=',$request->albumSelect)->get()->first();
        $media_type = DB::table('media_types')->where('Name','=',$request->mediaTypeSelect)->get()->first();
        $genre = DB::table('genres')->where('Name','=',$request->genreSelect)->get()->first();

        DB::table('tracks')->insert([
            'Name' => $request->name,
            'AlbumId'=>$album->AlbumId,
            'MediaTypeId'=>$media_type->MediaTypeId,
            'GenreId'=>$genre->GenreId,
            "Composer"=>$request->composer,
            "Milliseconds"=>$request->milliseconds,
            'Bytes'=>$request->bytes,
            'UnitPrice'=>$request->unitPrice,
        ]);

        return redirect('/tracks');
    }
}
