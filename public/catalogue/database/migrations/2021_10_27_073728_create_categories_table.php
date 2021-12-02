<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->string('name')->primary();
            $table->string('color')->nullable();

            $table->timestamps();
        });
        // Insert some stuff
        DB::table('categories')->insert(
            array(
                'name' => 'Comedy',
                'color' => '#FCB700',

            )
        );
        DB::table('categories')->insert(
            array(
                'name' => 'Drama',
                'color' => '#C000FC',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}