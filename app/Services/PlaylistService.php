<?php


namespace App\Services;


use App\Models\Playlist;
use App\Services\Api\PlaylistServiceInterface;

class PlaylistService implements PlaylistServiceInterface
{
    /**
     * @return Playlist[]|array|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllPlaylists()
    {
        return Playlist::all();
    }

    /**
     * @param $name
     *
     * @return Playlist
     */
    public function getPlaylistsByName($name)
    {
        return Playlist::where('name', $name)->get();
    }

    /**
     * @param $id
     *
     * @return Playlist
     */
    public function getPlaylistsById($id)
    {
        return Playlist::find($id);
    }

    /**
     * @param Playlist $playlist
     *
     * @return mixed|void
     */
    public function savePlaylists(Playlist $playlist)
    {
        $playlist->save();
    }
}
