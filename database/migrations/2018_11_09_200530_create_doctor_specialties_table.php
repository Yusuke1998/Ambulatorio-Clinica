<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_specialties', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('doctor_id')->unsigned();
            $table->integer('specialty_id')->unsigned();

            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->foreign('specialty_id')->references('id')->on('specialties');

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
        Schema::dropIfExists('doctor_specialties');
    }
}
