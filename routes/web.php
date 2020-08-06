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

Route::post('/find', 'MusicController@findByName')->name('findByName');

Route::get('/artists', 'ArtistController@getAll')->name('artists');

Route::get('/artists/{id}', 'MusicController@findById')->name('artistMusic');
