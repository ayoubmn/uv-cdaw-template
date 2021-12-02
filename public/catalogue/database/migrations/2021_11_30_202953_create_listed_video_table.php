<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListedVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listed_video', function (Blueprint $table) {
            $table->bigInteger('id_media')->unsigned()->nullable();
            $table->foreign('id_media')->references('id')->on('media');
            $table->bigInteger('id_playlist')->unsigned()->nullable();
            $table->foreign('id_playlist')->references('id_playlist')->on('playlists');
            $table->timestamps();
            $table->primary(array('id_media', 'id_playlist'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listed_video');
    }
}
