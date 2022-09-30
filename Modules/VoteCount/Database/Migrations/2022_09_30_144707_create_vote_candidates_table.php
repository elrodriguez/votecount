<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_political_parties', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('vote_candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('political_party_id')->nullable();
            $table->string('name');
            $table->char('department_id', 2)->default('02')->nullable();
            $table->char('province_id', 4)->nullable();
            $table->char('district_id', 6)->nullable();
            $table->timestamps();
            $table->foreign('political_party_id')->references('id')->on('vote_political_parties');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vote_candidates');
        Schema::dropIfExists('vote_political_parties');
    }
}
