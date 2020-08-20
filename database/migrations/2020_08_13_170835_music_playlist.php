<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MusicPlaylist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_playlist', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('music_id');
            $table->bigInteger('playlist_id');
            $table->foreign('music_id')
                ->references('id')
                ->on('music');
            $table->foreign('playlist_id')
                ->references('id')
                ->on('playlist');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
