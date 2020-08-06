<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;

class MusicController extends Controller
{
    public function getAll(){
        $music = new Music();
        $data  = $music->all();
        self::addAttributes($data);
        return view('home', compact('data'));
    }

    public function findByName(Request $request){
        $music = new Music();
        $data  = $music->where('name', 'like', '%'.$request->input('name').'%')->get();
        self::addAttributes($data);
        return view('home', compact('data'));
    }

    public function findById($id){
        $music = new Music();
        $data  = $music->where('artist_id', '=', $id)->get();
        self::addAttributes($data);
        return view('artistMusic', compact('data'));
    }

    private function addAttributes(&$data){
        foreach ($data as $track){
            $track['artist'] = $track->artist;
        }
    }
}
