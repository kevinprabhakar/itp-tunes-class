<?php

// Route::get('/', function () {
//     return view('invoices');
// });

// Route -> Controller -> Load View

//Controller is
//ClassName@MethodName

//Controllers are located at /app/Http/Controllers
Route::get('/','InvoicesController@index');
Route::get('/playlists','PlaylistController@index');
Route::get('/playlists/new','PlaylistController@create');
Route::get('/playlists/{id}','PlaylistController@index');
Route::post('/playlists','PlaylistController@store');
Route::get('/tracks/new','TracksController@showTrackAdd');
Route::post('/tracks/new','TracksController@addTrack');

Route::get('/genres', 'GenresController@genres');
Route::get('/genres/{genreId}/edit', 'GenresController@showGenreEdit');
Route::post('/genres/{genreId}/edit','GenresController@editGenre');
Route::get('/tracks','TracksController@tracks');
