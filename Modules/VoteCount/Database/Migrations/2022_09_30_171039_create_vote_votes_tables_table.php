<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteVotesTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_votes_tables', function (Blueprint $table) {
            $table->id();
            $table->string('type', 1)->nullable()->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('class_room_id')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('vote_schools');
            $table->foreign('class_room_id')->references('id')->on('vote_class_rooms');
            $table->foreign('table_id')->references('id')->on('vote_tables');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_votes_tables');
    }
}
