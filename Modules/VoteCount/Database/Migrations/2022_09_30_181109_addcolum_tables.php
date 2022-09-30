<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddcolumTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vote_tables', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id')->nullable();
            $table->foreign('person_id', 'person_id_vote_tables')->references('id')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vote_tables', function (Blueprint $table) {
            $table->dropForeign('person_id_vote_tables');
            $table->dropColumn('person_id');
        });
    }
}
