<?php

// Route::get('/', function () {
//     return view('invoices');
// });

// Route -> Controller -> Load View

//Controller is
//ClassName@MethodName

//Controllers are located at /app/Http/Controllers
Route::get('/', 'GenresController@genres');
Route::get('/tracks','TracksController@tracks');
