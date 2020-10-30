<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_type_id');
            $table->unsignedBigInteger('movie_status_id');
            $table->string('name');
            $table->integer('length');
            $table->year('year');
            $table->year('start_year');
            $table->year('end_year');
            $table->float('float');
            $table->integer('votes_nr');
            $table->integer('metascore');
            $table->unsignedBigInteger('certification_id');
            $table->unsignedBigInteger('budget');
            $table->string('budget_currency');
            $table->string('color_code');
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
        Schema::dropIfExists('movies');
    }
}
