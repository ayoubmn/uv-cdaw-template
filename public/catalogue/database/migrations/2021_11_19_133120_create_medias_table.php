<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');

            $table->foreignId('category_id')->constrained('categories');
            $table->string('url');
            $table->string('avatar');
            $table->string('duree')->nullable();
            $table->string('nbr_saison')->nullable();
            $table->string('realisateur');
            $table->string('date');
            $table->float('rating');
            $table->Text('description');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
