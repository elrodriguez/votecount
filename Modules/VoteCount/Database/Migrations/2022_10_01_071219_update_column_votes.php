<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vote_votes_tables_po_pas', function (Blueprint $table) {
            $table->integer('vote_reg')->nullable();
            $table->integer('vote_pro')->nullable();
            $table->integer('vote_dis')->nullable();
        });
        Schema::table('vote_votes_tables', function (Blueprint $table) {
            $table->integer('votes_total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vote_votes_tables', function (Blueprint $table) {
            $table->dropColumn('votes_total');
        });
        Schema::table('vote_votes_tables_po_pas', function (Blueprint $table) {
            $table->dropColumn('vote_dis');
            $table->dropColumn('vote_pro');
            $table->dropColumn('vote_reg');
        });
    }
}
