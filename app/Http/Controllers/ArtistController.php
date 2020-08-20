<?php

namespace App\Http\Controllers;

use App\Services\ArtistService;

class ArtistController extends Controller
{
    /**
     * @var ArtistService
     */
    private $artistService;

    /**
     * ArtistController constructor.
     *
     * @param ArtistService $artistService
     */
    public function __construct(ArtistService $artistService)
    {
        $this->artistService = $artistService;
    }

    public function getAll()
    {
        $artists = $this->artistService->getAllArtists();
        return view('artists', compact('artists'));
    }

}
