<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_actor', function (Blueprint $table) {
            $table->bigInteger('actor_id')->unsigned()->nullable();
            $table->foreign('actor_id')->references('id')->on('actor');
            $table->bigInteger('media_id')->unsigned()->nullable();
            $table->foreign('media_id')->references('id')->on('media');
            $table->timestamps();
            $table->primary(array('actor_id', 'media_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_actor');
    }
}