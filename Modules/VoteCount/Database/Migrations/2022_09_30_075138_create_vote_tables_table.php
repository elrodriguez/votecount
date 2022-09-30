<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_tables', function (Blueprint $table) {
            $table->id();
            $table->string('number_table');
            $table->string('number_order');
            $table->string('pavilion');
            $table->string('flat');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('class_room_id');
            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('vote_schools');
            $table->foreign('class_room_id')->references('id')->on('vote_class_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_tables');
    }
}
