<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaCategorieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_categories', function (Blueprint $table) {
            $table->bigInteger('id_media')->unsigned()->nullable();
            $table->foreign('id_media')->references('id')->on('media');
            $table->string('nom_cat')->nullable();
            $table->foreign('nom_cat')->references('name')->on('categories');
            $table->timestamps();
            $table->primary(array('id_media', 'nom_cat'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_categories');
    }
}
