<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturePosition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_position', function (Blueprint $table) {
            $table->integer('feature_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->string('value_ru')->nullable();
            $table->string('value_uz')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feature_position');
    }
}
