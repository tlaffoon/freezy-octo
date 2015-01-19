<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notes', function($table)
		{
		    $table->increments('id');
		    $table->text('note');

		    // Add User Foreign Key
		    $table->integer('user_id')->unsigned();
		    $table->foreign('user_id')
		    	->references('id')
		    	->on('users')
		    	->onDelete('cascade');
		    
		    // Add Application Foreign Key
		    $table->integer('application_id')->unsigned();
		    $table->foreign('application_id')
		    	->references('id')
		    	->on('applications')
		    	->onDelete('cascade');

		    // Add Courses Foreign Key
		    $table->integer('course_id')->unsigned();
		    $table->foreign('course_id')
		    	->references('id')
		    	->on('courses')
		    	->onDelete('cascade');

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
		Schema::drop('notes');
	}

}
