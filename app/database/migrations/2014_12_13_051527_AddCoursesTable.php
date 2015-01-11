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
		    
		    $table->string('name')->unique();
		    $table->string('designation')->unique();
		    $table->string('description');

		    $table->boolean('active')->default(1);

		    $table->date('start_date');
		    $table->date('end_date');
		    $table->date('demo_date')->nullable();

		    $table->integer('duration');
		    $table->integer('current_students');
		    $table->integer('max_students');
		    $table->integer('cost');
		    
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
		Schema::dropIfExists('courses');
	}

}
