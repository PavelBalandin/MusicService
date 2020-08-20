<?php


namespace App\Services\Api;

use App\Models\Music;

interface MusicServiceInterface
{
    /**
     * @return array
     */
    public function getAllMusic();

    /**
     * @param $name
     *
     * @return Music
     */
    public function getMusicByName($name);

    /**
     * @param $id
     *
     * @return Music
     */
    public function getMusicById($id);

    /**
     * @param Music $music
     *
     * @return mixed
     */
    public function saveMusic(Music $music);
}
