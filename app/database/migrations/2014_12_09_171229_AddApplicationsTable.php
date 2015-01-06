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
		    // applying for which course_id
		    $table->string('employment_status');
		    $table->string('resume_path');
		    $table->string('financing');
		    $table->string('referred_by');
		    $table->text('backstory');
		    $table->text('questions');
		    

		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
