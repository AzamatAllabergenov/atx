<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoservices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias');
            $table->string('title_ru');
            $table->string('title_uz')->nullable();
            $table->text('text_ru');
            $table->text('text_uz')->nullable();
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
        Schema::dropIfExists('autoservices');
    }
}
