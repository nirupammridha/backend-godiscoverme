<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('job_type');
            $table->string('category');
            $table->string('description');
            $table->string('compensation_from');
            $table->string('compensation_to');
            $table->string('currency');
            $table->string('frequency');
            $table->string('compensation_show');
            $table->string('additional_info');
            $table->string('company_name')->nullable();
            $table->string('company_url')->nullable();
            $table->string('upload_file')->nullable();
            $table->string('contact_email')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
