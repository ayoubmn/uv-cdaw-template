<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnementPlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnement_playlist', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->bigInteger('id_playlist')->unsigned()->nullable();
            $table->foreign('id_playlist')->references('id_playlist')->on('playlists');
            $table->timestamps();
            $table->primary(array('id_user', 'id_playlist'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonnement_playlist');
    }
}
