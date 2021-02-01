<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtyTherapistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialty_therapist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("specialty_id");
            // $table->foreign('specialty_id')->references('id')->on('specialties')->onDelete('cascade');
          
            $table->integer("therapist_id");
            // $table->foreign('therapist_id')->references('id')->on('therapists')->onDelete('cascade');

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialty_therapist');
    }
}
