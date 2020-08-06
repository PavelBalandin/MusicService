<?php

namespace App\Http\Controllers;

use App\Artist;

class ArtistController extends Controller
{
    public function getAll(){
        $artist = new Artist();
        return view('artists', ['data' => $artist->all()]);
    }

    public function getArtistMusic(){
        $artist = new Artist();
        return view('artists', ['data' => $artist->all()]);
    }
}
