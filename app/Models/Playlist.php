<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playlist extends Model
{
    /**
     * @return BelongsToMany
     */
    public function music()
    {
        return $this->belongsToMany(Music::class);
    }
}
