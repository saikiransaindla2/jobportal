<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantAvailableJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_available_job', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('applicant_id');
            $table->integer('job_id');
            $table->string('status')->default('Unseen');
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
        Schema::drop('applicant_available_job');
    }
}
