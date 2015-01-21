<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function($table)
		{
		    $table->increments('id');		    
		    $table->string('designation')->unique();

		    $table->string('status')->default('active');

		    $table->date('start_date');
		    $table->date('end_date');
		    $table->date('demo_date')->nullable();

		    $table->integer('current_students');
		    $table->integer('max_students');
		    $table->integer('cost');
		    
		    $table->timestamps();

		    $table->integer('course_type_id')->unsigned();
		    $table->foreign('course_type_id')->references('id')->on('course_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('courses');
	}

}
