<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTherapistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('therapists', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('slug');
            $table->text('img');
            $table->string('title')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country')->nullable();
            $table->double('price')->nullable();
            $table->double('rate')->nullable();
            $table->tinyInteger('active')->nullable()->default(1);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `therapists` ADD FULLTEXT INDEX therapist_name_index (name)');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('therapists');
    }
}
