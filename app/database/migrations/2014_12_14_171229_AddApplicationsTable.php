<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function($table)
		{
		    $table->increments('id');
		    $table->string('application_status')->default('pending');
		    $table->string('employment_status');
		    $table->string('resume_path');
		    $table->string('financing_status');
		    $table->string('referred_by');
		    $table->text('bg_info');
		    $table->text('questions');

		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

		    $table->integer('course_id')->unsigned();
		    $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

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
		Schema::dropIfExists('applications');
	}

}
