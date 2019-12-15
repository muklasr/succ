<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSucculentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('succulents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('origin');
            $table->string('description');
            $table->integer('id_family');
            $table->integer('id_type');
            $table->string('mature_size');
            $table->string('hardiness_zone');
            $table->string('light');
            $table->string('water');
            $table->string('temperature');
            $table->string('soil');
            $table->string('soil_ph');
            $table->string('flower_color');
            $table->string('special_features');
            $table->string('image');
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
        Schema::dropIfExists('succulents');
    }
}
