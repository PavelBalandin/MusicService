<?php

namespace App\Http\Controllers;

use App\Services\PlaylistService;

class PlaylistController extends Controller
{
    /**
     * @var PlaylistService
     */
    private $playlistService;

    /**
     * PlaylistController constructor.
     *
     * @param PlaylistService $playlistService
     */
    public function __construct(PlaylistService $playlistService)
    {
        $this->playlistService = $playlistService;
    }

    public function getAllPlaylists()
    {
        $playlists = $this->playlistService->getAllPlaylists();
        return view('playlists', compact('playlists'));
    }

}
