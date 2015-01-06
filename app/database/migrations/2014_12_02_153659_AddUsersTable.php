<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
		    $table->increments('id');

		    $table->string('firstname');
		    $table->string('lastname');
		    $table->string('fullname');
		    
		    $table->string('username')->unique();
		    $table->string('email')->unique();
		    $table->string('password');

		    $table->string('role');
		    
		    $table->string('phone');
		    $table->string('gender');
		    $table->date('dob');
		    $table->integer('age');

		    $table->boolean('financing');

		    $table->string('img_path');

		    $table->boolean('confirmed')->default(0);
		    $table->string('confirmation_code')->nullable();
		    
		    $table->string('remember_token', 64);
		   
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
		Schema::dropIfExists('users');
	}

}
