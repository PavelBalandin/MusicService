<?php


namespace App\Services;


use App\Models\Artist;
use App\Services\Api\ArtistServiceInterface;

class ArtistService implements ArtistServiceInterface
{
    /**
     * @return Artist[]|array|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllArtists()
    {
        return Artist::all();
    }

    /**
     * @param $name
     *
     * @return Artist
     */
    public function getArtistByName($name)
    {
        return Artist::where('name', $name)->get();
    }

    /**
     * @param $id
     *
     * @return Artist
     */
    public function getArtistById($id)
    {
        return Artist::find($id);
    }

    /**
     * @param Artist $artist
     *
     * @return mixed|void
     */
    public function saveArtist(Artist $artist)
    {
        $artist->save();
    }
}
