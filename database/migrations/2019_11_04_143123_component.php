<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Component extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->bigIncrements('id');
            //video
            $table->string('video')->nullable();
            //imagen
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('format')->nullable();
            $table->string('size')->nullable();
            //text
            $table->string('text')->nullable();
            //shared
            $table->string('name');
            $table->string('width');
            $table->string('height');
            $table->integer('location_x');
            $table->integer('location_y');
            $table->integer('location_z');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('type_components_id');
            $table->foreign('type_components_id')->references('id')->on('type_components');
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
        Schema::dropIfExists('components');
    }
}
