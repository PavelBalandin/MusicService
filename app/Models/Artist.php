<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    /**
     * @return HasMany
     */
    public function musics()
    {
        return $this->hasMany(Music::class);
    }
}
