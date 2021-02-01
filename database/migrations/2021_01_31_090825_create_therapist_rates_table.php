<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTherapistRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapist_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->double('rate');
            $table->integer("user_id");
            // $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
          
            $table->integer("therapist_id");
            // $table->foreign('therapist_id')->references('id')->on('therapists')->onDelete('cascade');
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
        Schema::dropIfExists('therapist_rates');
    }
}
