<?php


namespace App\Services\Api;

use App\Models\Playlist;

interface PlaylistServiceInterface
{
    /**
     * @return array
     */
    public function getAllPlaylists();

    /**
     * @param $name
     *
     * @return Playlist
     */
    public function getPlaylistsByName($name);

    /**
     * @param $id
     *
     * @return Playlist
     */
    public function getPlaylistsById($id);

    /**
     * @param Playlist $playlist
     *
     * @return mixed
     */
    public function savePlaylists(Playlist $playlist);
}
