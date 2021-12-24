<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ru');
            $table->string('name_uz')->nullable();
            $table->string('alias');
            $table->string('transmission');
            $table->string('fuel_consumption');
            $table->string('cargo_space');
            $table->boolean('abs')->default(false);
            $table->text('interior_ru')->nullable();
            $table->text('interior_uz')->nullable();
            $table->text('exterior_ru')->nullable();
            $table->text('exterior_uz')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
