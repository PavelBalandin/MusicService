<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MusicController@getAll')->name('homepage');
Route::post('/find', 'MusicController@getByName')->name('findByName');


Route::get('/artists', 'ArtistController@getAll')->name('artists');
Route::get('/artists/{id}', 'MusicController@getByArtistId')->name('artistMusic');

Route::get('/playlists', 'PlaylistController@getAllPlaylists')->name('playlists');
Route::get('/playlist/{id}', 'MusicController@getByPlaylistId')->name('playlist');

Route::get('/upload', function () {
    return view('musicLoad');
})->name('upload');
Route::post('/upload', 'MusicController@upload')->name('music.upload');
