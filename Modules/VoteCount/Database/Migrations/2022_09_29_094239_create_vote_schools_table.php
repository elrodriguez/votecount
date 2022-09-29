<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_schools', function (Blueprint $table) {
            $table->id();
            $table->string('external_id', 10)->nullable();
            $table->integer('quantity_tables')->default(0);
            $table->integer('quamtity_electors')->default(0);
            $table->string('full_name', 300)->nullable();
            $table->string('address')->nullable();
            $table->char('department_id', 2)->default('02')->nullable();
            $table->char('province_id', 4)->nullable();
            $table->char('district_id', 6)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('vote_schools');
    }
}
