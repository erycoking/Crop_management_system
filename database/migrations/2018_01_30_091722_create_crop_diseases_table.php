<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCropDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_disease', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('crop_id')->unsigned();
            $table->foreign('crop_id')->references('id')->on('crops');
            $table->integer('disease_id')->unsigned();
            $table->foreign('disease_id')->references('id')->on('diseases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crop_disease');
    }
}
