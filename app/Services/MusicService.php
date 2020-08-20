<?php

namespace App\Services;

use App\Models\Artist;
use App\Models\Music;
use App\Models\Playlist;
use App\Services\Api\MusicServiceInterface;
use getID3;

const FILE_PATH = 'audio';

class MusicService implements MusicServiceInterface
{
    /**
     * @return Music[]|array|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllMusic()
    {
        $data = Music::all();
        $this->addAttributes($data);
        return $data;
    }

    /**
     * @param $name
     *
     * @return Music
     */
    public function getMusicByName($name)
    {
        $data = Music::where('name', 'like', '%' . $name . '%')->get();
        $this->addAttributes($data);
        return $data;
    }

    /**
     * @param $id
     *
     * @return Music
     */
    public function getMusicById($id)
    {
        $data = Music::find($id);
        $this->addAttributes($data);
        return $data;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getMusicByArtistId($id)
    {
        $data = Music::where('artist_id', $id)->get();
        $this->addAttributes($data);
        return $data;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getMusicByPlaylistId($id)
    {
        $playlist = Playlist::find($id);
        $data = $playlist->music()->get();
        $this->addAttributes($data);
        return $data;
    }

    /**
     * @param $data
     */
    private function addAttributes(&$data)
    {
        foreach ($data as $track) {
            $track['artist'] = $track->artist;
        }
    }

    /**
     * @param Music $music
     *
     * @return mixed|void
     */
    public function saveMusic(Music $music)
    {
        $music->save();
    }

    /**
     * @param $attributes
     */
    public function createMusic($attributes)
    {
        $music = new Music();

        if ($attributes['title'] == null) {
            $music->name = $attributes['originalName'];
        } else {
            $music->name = $attributes['title'][0];
        }
        $music->path = $attributes['originalName'];

        if ($attributes['artist'] == null) {
            $artist = 'Unknown';
        } else {
            $artist = $attributes['artist'][0];
        }
        $artist = Artist::where('name', $artist)->first();
        $music->artist_id = $artist->id;
        $music->save();

    }

    /**
     * @param $file
     */
    public function saveFile($file)
    {
        $filename = $file->getClientOriginalName();
        $attributes = $this->getMusicFileAttributes($file);
        $attributes['path'] = FILE_PATH . $filename;
        $attributes['originalName'] = $filename;
        $file->move(FILE_PATH, $filename);
        $this->createMusic($attributes);

    }

    /**
     * @param $file
     *
     * @return null[]
     */
    public function getMusicFileAttributes($file)
    {
        $id3 = new getID3();
        $id3->analyze($file);
        $attributes = [
            'title' => null,
            'artist' => null,
            'album' => null,
            'year' => null
        ];
        if (isset($id3->info['tags']['id3v2'])) {
            $tags = $id3->info['tags']['id3v2'];
            if (isset($tags['title'])) $attributes['title'] = $tags['title'];
            if (isset($tags['artist'])) $attributes['artist'] = $tags['artist'];
            if (isset($tags['album'])) $attributes['album'] = $tags['album'];
            if (isset($tags['year'])) $attributes['year'] = $tags['year'];
        }
        return $attributes;
    }


}
