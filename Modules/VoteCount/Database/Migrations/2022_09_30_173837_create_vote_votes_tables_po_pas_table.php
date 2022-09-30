<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteVotesTablesPoPasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_votes_tables_po_pas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('votes_table_id')->nullable();
            $table->unsignedBigInteger('political_party_id')->nullable();
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->foreign('political_party_id')->references('id')->on('vote_political_parties');
            $table->foreign('votes_table_id')->references('id')->on('vote_votes_tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_votes_tables_po_pas');
    }
}
