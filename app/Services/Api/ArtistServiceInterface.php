<?php


namespace App\Services\Api;

use App\Models\Artist;

interface ArtistServiceInterface
{
    /**
     * @return array
     */
    public function getAllArtists();

    /**
     * @param $name
     *
     * @return Artist
     */
    public function getArtistByName($name);

    /**
     * @param $id
     *
     * @return Artist
     */
    public function getArtistById($id);

    /**
     * @param Artist $artist
     *
     * @return mixed
     */
    public function saveArtist(Artist $artist);
}
