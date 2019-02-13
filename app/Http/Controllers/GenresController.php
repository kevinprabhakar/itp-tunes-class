<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
    public function genres()
    {
        $genres = DB::table('genres')->get();

        return view('genres', [
            'genres' => $genres
        ]);


    }

    public function showGenreEdit($genreId = null)
    {
            return view('genreEdit');
    }

    public function editGenre(Request $request, $genreId=null)
    {
        if ($request){
            $input = $request->all();

            $validation = Validator::make($input, [
                'name' => 'required|min:3|unique:genres,Name',
            ]);

            if ($validation->fails())
            {
                return redirect("/genres"."/".$genreId."/edit")
                    ->withInput()
                    ->withErrors($validation);
            }
            DB::table('genres')->where('GenreId','=',$genreId)->update(["Name" => $request->input('name')]);

            $genres = DB::table('genres')->get();

            return view('genres', [
                'genres' => $genres
            ]);

        }
    }
}
