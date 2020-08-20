<?php

namespace App\Http\Controllers;

use App\Services\MusicService;
use Illuminate\Http\Request;


class MusicController extends Controller
{
    /**
     * @var MusicService
     */
    private $musicService;

    /**
     * MusicController constructor.
     * @param MusicService $musicService
     */
    public function __construct(MusicService $musicService)
    {
        $this->musicService = $musicService;
    }

    public function getAll()
    {
        $data = $this->musicService->getAllMusic();
        return view('home', compact('data'));
    }

    public function getByName(Request $request)
    {
        $data = $this->musicService->getMusicByName($request->input('name'));
        return view('home', compact('data'));
    }

    public function getByArtistId($id)
    {
        $data = $this->musicService->getMusicByArtistId($id);
        return view('artistMusic', compact('data'));
    }

    public function getByPlaylistId($id)
    {
        $data = $this->musicService->getMusicByPlaylistId($id);
        return view('artistMusic', compact('data'));
    }

    public function upload(Request $request)
    {
        $this->musicService->saveFile($request->file('music'));
        return view('musicLoad', ['massage' => 'Music has been added']);
    }

}
