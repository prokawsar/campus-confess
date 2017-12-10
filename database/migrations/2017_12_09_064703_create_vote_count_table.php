<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_count', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote_id')->unsigned();;
            $table->integer('opt_id')->unsigned();;
            $table->integer('user_id')->unsigned();;
            
            $table->foreign('vote_id')->references('id')->on('vote');
            $table->foreign('opt_id')->references('id')->on('vote_option');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('vote_count');
    }
}
