<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_option', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opt_name');
            $table->integer('total')->default(0);
            $table->integer('vote_id')->unsigned();
            $table->foreign('vote_id')->references('id')->on('vote');
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
        Schema::dropIfExists('vote_option');
    }
}
